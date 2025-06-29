<?php

namespace App\Http\Controllers\BotMan;

use App\Http\Controllers\Controller;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use App\Models\BotQuestion;
use App\Models\BotConversation;
use Illuminate\Support\Facades\Auth;

class BotManController extends Controller
{
    public function __construct()
    {
        DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);
    }

    public function handle()
    {
        $config = [
            'web' => [
                'matchingData' => [
                    'driver' => 'web',
                ],
            ]
        ];

        $botman = BotManFactory::create($config);

        $botman->hears('start|mulai|halo|hai|hello', function (BotMan $bot) {
            $this->showWelcomeMessage($bot);
        });

        $botman->hears('kategori {category}', function (BotMan $bot, $category) {
            $this->showCategoryQuestions($bot, $category);
        });

        $botman->hears('pertanyaan {questionId}', function (BotMan $bot, $questionId) {
            $this->showQuestionAnswer($bot, $questionId);
        });

        $botman->fallback(function (BotMan $bot) {
            $message = $bot->getMessage()->getText();
            $response = $this->getAutoResponse(strtolower($message));
            $bot->reply($response);
            $this->showMainMenu($bot);
        });

        $botman->listen();
    }

    private function showWelcomeMessage(BotMan $bot)
    {
        $welcomeText = "🏥 Selamat datang di HappyCare! ✨\n\n";
        $welcomeText .= "Saya siap membantu Anda dengan informasi health tourism di Yogyakarta.\n\n";
        $welcomeText .= "Silakan pilih kategori yang ingin Anda ketahui:";

        $question = Question::create($welcomeText)
            ->fallback('Silakan pilih kategori yang tersedia')
            ->callbackId('select_category');

        $categories = BotQuestion::select('category')->distinct()->get();

        foreach ($categories as $category) {
            $categoryLabel = $this->getCategoryLabel($category->category);
            $categoryIcon = $this->getCategoryIcon($category->category);

            $question->addButton(
                Button::create("{$categoryIcon} {$categoryLabel}")
                    ->value("kategori {$category->category}")
            );
        }

        $question->addButton(
            Button::create("🆘 Darurat")
                ->value("emergency")
        );

        $bot->ask($question, function (Answer $answer) use ($bot) {
            if ($answer->isInteractiveMessageReply()) {
                $value = $answer->getValue();

                if ($value === 'emergency') {
                    $this->showEmergencyInfo($bot);
                } elseif (strpos($value, 'kategori') === 0) {
                    $category = str_replace('kategori ', '', $value);
                    $this->showCategoryQuestions($bot, $category);
                }
            }
        });
    }

    private function showCategoryQuestions(BotMan $bot, $category)
    {
        $questions = BotQuestion::where('category', $category)->get();

        if ($questions->isEmpty()) {
            $bot->reply("Maaf, tidak ada pertanyaan untuk kategori {$category}.");
            $this->showMainMenu($bot);
            return;
        }

        $categoryLabel = $this->getCategoryLabel($category);
        $categoryIcon = $this->getCategoryIcon($category);

        $questionText = "{$categoryIcon} *Pertanyaan {$categoryLabel}:*\n\nSilakan pilih pertanyaan yang ingin Anda ketahui:";

        $question = Question::create($questionText)
            ->fallback('Silakan pilih pertanyaan yang tersedia')
            ->callbackId('select_question');

        foreach ($questions as $q) {
            $question->addButton(
                Button::create($this->truncateText($q->question, 40))
                    ->value("pertanyaan {$q->id}")
            );
        }

        $question->addButton(
            Button::create("🔙 Kembali ke Menu")
                ->value("start")
        );

        $bot->ask($question, function (Answer $answer) use ($bot) {
            if ($answer->isInteractiveMessageReply()) {
                $value = $answer->getValue();

                if ($value === 'start') {
                    $this->showWelcomeMessage($bot);
                } elseif (strpos($value, 'pertanyaan') === 0) {
                    $questionId = str_replace('pertanyaan ', '', $value);
                    $this->showQuestionAnswer($bot, $questionId);
                }
            }
        });
    }

    private function showQuestionAnswer(BotMan $bot, $questionId)
    {
        $question = BotQuestion::find($questionId);

        if (!$question) {
            $bot->reply('Maaf, pertanyaan tidak ditemukan.');
            $this->showMainMenu($bot);
            return;
        }

        $bot->reply("❓ {$question->question}");
        $bot->reply("💡 {$question->answer}");

        if (Auth::check()) {
            BotConversation::create([
                'user_id' => Auth::id(),
                'question_id' => $questionId,
                'message' => $question->question,
                'response' => $question->answer
            ]);
        }

        $this->showAfterAnswerOptions($bot, $question->category);
    }

    private function showAfterAnswerOptions(BotMan $bot, $category)
    {
        $question = Question::create('Apakah ada yang ingin Anda tanyakan lagi?')
            ->fallback('Silakan pilih opsi yang tersedia')
            ->callbackId('after_answer');

        $question->addButtons([
            Button::create("🔄 Pertanyaan Lain")->value("start"),
            Button::create("📂 Kategori Sama")->value("kategori {$category}"),
            Button::create("✅ Selesai")->value("finish"),
        ]);

        $bot->ask($question, function (Answer $answer) use ($bot, $category) {
            if ($answer->isInteractiveMessageReply()) {
                $value = $answer->getValue();

                if ($value === 'start') {
                    $this->showWelcomeMessage($bot);
                } elseif ($value === 'finish') {
                    $bot->reply("Terima kasih telah menggunakan HappyCare! 🙏\n\nSemoga informasi yang diberikan bermanfaat. Jaga kesehatan Anda! 💪");
                } elseif (strpos($value, 'kategori') === 0) {
                    $this->showCategoryQuestions($bot, $category);
                }
            }
        });
    }

    private function showEmergencyInfo(BotMan $bot)
    {
        $emergencyText = "🚨 *INFORMASI DARURAT* 🚨\n\n";
        $emergencyText .= "📞 *Nomor Darurat:*\n";
        $emergencyText .= "• 118 / 119 (Ambulans)\n";
        $emergencyText .= "• 112 (Darurat Nasional)\n\n";
        $emergencyText .= "🏥 *IGD 24 Jam:*\n";
        $emergencyText .= "• IGD RS Bethesda\n";
        $emergencyText .= "• IGD RS Panti Rapih\n";
        $emergencyText .= "• IGD RSUD Sleman\n";
        $emergencyText .= "• IGD RSUP Dr. Sardjito\n\n";
        $emergencyText .= "⚠ Untuk keadaan darurat, segera hubungi nomor di atas!";

        $bot->reply($emergencyText);
        $this->showMainMenu($bot);
    }

    private function showMainMenu(BotMan $bot)
    {
        $question = Question::create('Pilih menu:')
            ->fallback('Silakan pilih menu yang tersedia')
            ->callbackId('main_menu');

        $question->addButtons([
            Button::create("🏠 Menu Utama")->value("start"),
            Button::create("🆘 Darurat")->value("emergency"),
        ]);

        $bot->ask($question, function (Answer $answer) use ($bot) {
            if ($answer->isInteractiveMessageReply()) {
                $value = $answer->getValue();

                if ($value === 'start') {
                    $this->showWelcomeMessage($bot);
                } elseif ($value === 'emergency') {
                    $this->showEmergencyInfo($bot);
                }
            }
        });
    }

    private function getAutoResponse($message)
    {
        $responses = [
            'halo' => 'Halo! 👋 Selamat datang di HappyCare.',
            'hai' => 'Hai! 👋 Ada yang bisa saya bantu?',
            'terima kasih' => 'Sama-sama! 😊 Senang bisa membantu.',
            'thanks' => 'You\'re welcome! 😊',
            'rumah sakit' => 'Untuk informasi rumah sakit, silakan pilih kategori "Kesehatan" di menu utama.',
            'wisata' => 'Untuk informasi wisata, silakan pilih kategori "Wisata" di menu utama.',
            'emergency' => 'Untuk informasi darurat, silakan klik tombol "Darurat" di menu.',
        ];

        foreach ($responses as $keyword => $response) {
            if (strpos($message, $keyword) !== false) {
                return $response;
            }
        }

        return 'Maaf, saya tidak mengerti. Silakan gunakan menu yang tersedia atau ketik "start" untuk memulai.';
    }

    private function getCategoryLabel($category)
    {
        $labels = [
            'umum' => 'Umum',
            'layanan kesehatan' => 'Kesehatan',
            'wisata' => 'Wisata'
        ];
        return $labels[$category] ?? ucfirst($category);
    }

    private function getCategoryIcon($category)
    {
        $icons = [
            'umum' => '💡',
            'layanan kesehatan' => '🏥',
            'wisata' => '🗺'
        ];
        return $icons[$category] ?? '❓';
    }

    private function truncateText($text, $maxLength)
    {
        if (strlen($text) <= $maxLength) return $text;
        return substr($text, 0, $maxLength) . '...';
    }
}
