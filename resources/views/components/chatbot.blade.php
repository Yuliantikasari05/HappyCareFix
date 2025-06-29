<!-- Simple Chatbot Component - BUBBLE CLICK TO SHOW ROOM -->
<div x-data="simpleChatbot()" x-init="init()" class="chatbot-wrapper">
    <!-- Chat Bubble - ALWAYS VISIBLE -->
    <div class="chatbot-bubble" @click="toggleChat()">
        <!-- Main Bubble -->
        <div class="chatbot-bubble-main">
            <i data-lucide="message-circle" class="w-7 h-7 text-white"></i>
        </div>
        
        <!-- Pulse Ring -->
        <div class="chatbot-pulse-ring"></div>
        
        <!-- Notification Badge -->
        <div x-show="hasNotification" 
             class="chatbot-notification-badge">
            <span class="text-white text-xs font-bold" x-text="notificationCount"></span>
        </div>
        
        <!-- Welcome Tooltip -->
        <div x-show="showWelcomeTooltip && !isOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             class="chatbot-tooltip">
            <div class="text-sm text-gray-700">
                <strong class="text-cyan-600">HappyCare Assistant</strong>
                <p class="mt-1">Butuh bantuan? Klik untuk chat dengan saya! 💬</p>
            </div>
            <div class="chatbot-tooltip-arrow"></div>
        </div>
    </div>

    <!-- Chat Window - ONLY SHOW WHEN BUBBLE CLICKED -->
    <div x-show="isOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform scale-95 translate-y-4"
         x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
         x-transition:leave-end="opacity-0 transform scale-95 translate-y-4"
         style="display: none;"
         class="chatbot-window">
        
        <!-- Header -->
        <div class="chatbot-header">
            <div class="flex items-center justify-between h-full">
                <div class="flex items-center space-x-3 min-w-0 flex-1">
                    <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                        <i data-lucide="bot" class="w-5 h-5 text-white"></i>
                    </div>
                    <div class="min-w-0">
                        <h3 class="text-white font-semibold truncate">HappyCare Assistant</h3>
                        <div class="flex items-center space-x-1">
                            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                            <span class="text-white/90 text-xs">Online</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-2 flex-shrink-0">
                    <!-- History Button (for logged in users) -->
                    <template x-if="isLoggedIn">
                        <button @click="showHistory()" 
                                class="text-white/80 hover:text-white p-1 rounded-full hover:bg-white/10 transition-colors"
                                title="Riwayat Chat">
                            <i data-lucide="history" class="w-4 h-4"></i>
                        </button>
                    </template>
                    <!-- Close Button -->
                    <button @click="closeChat()" 
                            class="text-white/80 hover:text-white p-1 rounded-full hover:bg-white/10 transition-colors">
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Messages Container -->
        <div class="chatbot-messages" x-ref="messagesContainer">
            <!-- Welcome Screen -->
            <div x-show="currentView === 'welcome'" class="chatbot-content text-center flex flex-col justify-center">
                <div class="w-20 h-20 bg-gradient-to-br from-cyan-100 to-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="heart-pulse" class="w-10 h-10 text-cyan-600"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-800 mb-2">Selamat datang di HappyCare!</h4>
                <p class="text-gray-600 mb-6">Saya siap membantu Anda dengan informasi kesehatan dan wisata di Yogyakarta.</p>
                <button @click="loadCategories()" 
                        class="bg-gradient-to-r from-cyan-500 to-emerald-500 text-white px-6 py-3 rounded-full font-medium hover:shadow-lg transition-all duration-300 hover:scale-105">
                    <i data-lucide="play" class="w-4 h-4 inline mr-2"></i>
                    Mulai Chat
                </button>
            </div>

            <!-- Categories View -->
            <div x-show="currentView === 'categories'" class="chatbot-content">
                <div class="mb-4">
                    <h4 class="font-semibold text-gray-800 mb-2">Pilih Kategori:</h4>
                </div>
                <div class="space-y-2">
                    <template x-for="category in categories" :key="category.id">
                        <button @click="selectCategory(category)" 
                                class="w-full p-3 bg-white border border-gray-200 rounded-lg hover:border-cyan-300 hover:bg-cyan-50 transition-all duration-200 text-left group">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-cyan-100 to-emerald-100 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform flex-shrink-0">
                                    <i :data-lucide="category.icon" class="w-4 h-4 text-cyan-600"></i>
                                </div>
                                <span class="font-medium text-gray-700 group-hover:text-cyan-700 truncate" x-text="category.name"></span>
                            </div>
                        </button>
                    </template>
                </div>
            </div>

            <!-- Questions View -->
            <div x-show="currentView === 'questions'" class="chatbot-content">
                <div class="mb-4 flex items-center justify-between">
                    <h4 class="font-semibold text-gray-800 truncate flex-1" x-text="'Pertanyaan ' + selectedCategoryName"></h4>
                    <button @click="backToCategories()" 
                            class="text-cyan-600 hover:text-cyan-700 text-sm font-medium flex-shrink-0 ml-2">
                        <i data-lucide="arrow-left" class="w-4 h-4 inline mr-1"></i>
                        Kembali
                    </button>
                </div>
                <div class="space-y-2">
                    <template x-for="question in questions" :key="question.id">
                        <button @click="selectQuestion(question)" 
                                class="w-full p-3 bg-white border border-gray-200 rounded-lg hover:border-emerald-300 hover:bg-emerald-50 transition-all duration-200 text-left group">
                            <div class="flex items-start space-x-3">
                                <div class="w-6 h-6 bg-emerald-100 rounded-full flex items-center justify-center mt-0.5 group-hover:scale-110 transition-transform flex-shrink-0">
                                    <i data-lucide="help-circle" class="w-3 h-3 text-emerald-600"></i>
                                </div>
                                <span class="text-gray-700 group-hover:text-emerald-700 text-sm leading-relaxed" x-text="question.text"></span>
                            </div>
                        </button>
                    </template>
                </div>
            </div>

            <!-- Smart Response View (NEW - for rumah sakit, wisata, darurat) -->
            <div x-show="currentView === 'smart_response'" class="chatbot-content">
                <div class="mb-4 flex items-center justify-between">
                    <button @click="backToCategories()" 
                            class="text-cyan-600 hover:text-cyan-700 text-sm font-medium">
                        <i data-lucide="arrow-left" class="w-4 h-4 inline mr-1"></i>
                        Kembali
                    </button>
                    <button @click="backToCategories()" 
                            class="text-gray-500 hover:text-gray-700 text-sm">
                        Kategori Lain
                    </button>
                </div>
                
                <!-- User Question -->
                <div class="bg-gradient-to-r from-cyan-500 to-emerald-500 text-white p-4 rounded-2xl rounded-br-md mb-4">
                    <p class="font-medium" x-text="smartResponse.question"></p>
                </div>
                
                <!-- Smart Answer -->
                <div class="bg-white border border-gray-200 p-4 rounded-2xl rounded-bl-md shadow-sm">
                    <div x-html="formatAnswer(smartResponse.answer)" class="text-gray-700 leading-relaxed"></div>
                    
                    <!-- Data Cards for Hospitals/Tours/Emergency -->
                    <template x-if="smartResponse.data && smartResponse.data.length > 0">
                        <div class="mt-4 space-y-3">
                            <template x-for="item in smartResponse.data.slice(0, 3)" :key="item.id">
                                <div class="bg-gray-50 p-3 rounded-lg border">
                                    <h5 class="font-semibold text-gray-800 mb-1" x-text="item.name"></h5>
                                    <p class="text-sm text-gray-600 mb-2" x-text="item.address || item.location || item.description"></p>
                                    <div class="flex items-center justify-between text-xs text-gray-500">
                                        <span x-text="item.phone || item.number || item.category"></span>
                                        <template x-if="item.rating">
                                            <span class="flex items-center">
                                                <i data-lucide="star" class="w-3 h-3 text-yellow-400 mr-1"></i>
                                                <span x-text="item.rating"></span>
                                            </span>
                                        </template>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>
                </div>
                
                <!-- Actions -->
                <div class="mt-4 flex flex-wrap gap-2">
                    <button @click="backToCategories()" 
                            class="bg-cyan-100 text-cyan-700 px-4 py-2 rounded-full text-sm font-medium hover:bg-cyan-200 transition-colors">
                        Pertanyaan Lain
                    </button>
                    <template x-if="isLoggedIn">
                        <button @click="showHistory()" 
                                class="bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-sm font-medium hover:bg-gray-200 transition-colors">
                            Lihat Riwayat
                        </button>
                    </template>
                </div>
            </div>

            <!-- Answer View -->
            <div x-show="currentView === 'answer'" class="chatbot-content">
                <div class="mb-4 flex items-center justify-between">
                    <button @click="backToQuestions()" 
                            class="text-cyan-600 hover:text-cyan-700 text-sm font-medium">
                        <i data-lucide="arrow-left" class="w-4 h-4 inline mr-1"></i>
                        Kembali
                    </button>
                    <button @click="backToCategories()" 
                            class="text-gray-500 hover:text-gray-700 text-sm">
                        Kategori Lain
                    </button>
                </div>
                
                <!-- Question -->
                <div class="bg-gradient-to-r from-cyan-500 to-emerald-500 text-white p-4 rounded-2xl rounded-br-md mb-4">
                    <p class="font-medium" x-text="currentAnswer.question"></p>
                </div>
                
                <!-- Answer -->
                <div class="bg-white border border-gray-200 p-4 rounded-2xl rounded-bl-md shadow-sm">
                    <p class="text-gray-700 leading-relaxed" x-text="currentAnswer.answer"></p>
                </div>
                
                <!-- Actions -->
                <div class="mt-4 flex flex-wrap gap-2">
                    <button @click="backToCategories()" 
                            class="bg-cyan-100 text-cyan-700 px-4 py-2 rounded-full text-sm font-medium hover:bg-cyan-200 transition-colors">
                        Pertanyaan Lain
                    </button>
                    <template x-if="isLoggedIn">
                        <button @click="showHistory()" 
                                class="bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-sm font-medium hover:bg-gray-200 transition-colors">
                            Lihat Riwayat
                        </button>
                    </template>
                </div>
            </div>

            <!-- History View -->
            <div x-show="currentView === 'history'" class="chatbot-content">
                <div class="mb-4 flex items-center justify-between">
                    <h4 class="font-semibold text-gray-800">Riwayat Chat</h4>
                    <button @click="backToCategories()" 
                            class="text-cyan-600 hover:text-cyan-700 text-sm font-medium">
                        <i data-lucide="arrow-left" class="w-4 h-4 inline mr-1"></i>
                        Kembali
                    </button>
                </div>
                
                <div x-show="history.length === 0" class="text-center py-8 text-gray-500">
                    <i data-lucide="clock" class="w-12 h-12 mx-auto mb-2 opacity-50"></i>
                    <p>Belum ada riwayat chat</p>
                </div>
                
                <div class="space-y-3">
                    <template x-for="item in history" :key="item.id">
                        <div class="bg-white border border-gray-200 rounded-lg p-3">
                            <div class="text-sm font-medium text-gray-800 mb-1 truncate" x-text="item.question"></div>
                            <div class="text-xs text-gray-500 mb-2" x-text="item.date"></div>
                            <div class="text-sm text-gray-600 line-clamp-2" x-text="item.answer"></div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Loading State -->
            <div x-show="isLoading" class="chatbot-content text-center flex items-center justify-center">
                <div class="inline-flex items-center space-x-2">
                    <div class="w-4 h-4 bg-cyan-500 rounded-full animate-bounce"></div>
                    <div class="w-4 h-4 bg-emerald-500 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                    <div class="w-4 h-4 bg-teal-500 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                </div>
                <p class="text-gray-600 text-sm mt-2">Memuat...</p>
            </div>
        </div>

        <!-- Search Bar -->
        <div x-show="currentView !== 'welcome'" class="chatbot-search">
            <div class="relative">
                <input x-model="searchQuery" 
                       @input.debounce.300ms="search()"
                       @keydown.enter="search()"
                       type="text" 
                       placeholder="Ketik: rumah sakit, wisata, darurat, atau cari pertanyaan..."
                       class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent">
                <i data-lucide="search" class="w-4 h-4 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"></i>
            </div>
            
            <!-- Search Results -->
            <div x-show="searchResults.length > 0" class="absolute bottom-full left-0 right-0 bg-white border border-gray-200 rounded-t-lg shadow-lg max-h-32 overflow-y-auto mb-1">
                <template x-for="result in searchResults" :key="result.id">
                    <button @click="selectQuestionById(result.id)" 
                            class="w-full text-left p-2 hover:bg-gray-50 text-sm text-gray-700 border-b border-gray-100 last:border-b-0">
                        <span x-text="result.text" class="truncate block"></span>
                        <span class="text-xs text-gray-500 ml-2" x-text="'(' + result.category + ')'"></span>
                    </button>
                </template>
            </div>
        </div>
    </div>
</div>

<script>
function simpleChatbot() {
    return {
        // STATE - CHAT CLOSED BY DEFAULT
        isOpen: false,
        currentView: 'welcome',
        isLoading: false,
        hasNotification: false,
        notificationCount: 0,
        showWelcomeTooltip: false,
        isLoggedIn: {{ Auth::check() ? 'true' : 'false' }},
        
        // Data
        categories: [],
        questions: [],
        history: [],
        searchResults: [],
        
        // Current selections
        selectedCategory: null,
        selectedCategoryName: '',
        currentAnswer: {},
        smartResponse: {}, // NEW - for smart responses
        searchQuery: '',

        init() {
            console.log('Chatbot initialized - Chat is closed');
            
            // Show welcome tooltip after 3 seconds (only if chat is closed)
            setTimeout(() => {
                if (!this.isOpen) {
                    this.showWelcomeTooltip = true;
                    setTimeout(() => {
                        this.showWelcomeTooltip = false;
                    }, 5000);
                }
            }, 3000);

            // Initialize Lucide icons
            this.$nextTick(() => {
                if (typeof lucide !== 'undefined') {
                    lucide.createIcons();
                }
            });
        },

        // TOGGLE CHAT - OPEN/CLOSE
        toggleChat() {
            console.log('Toggle chat clicked, current state:', this.isOpen);
            if (this.isOpen) {
                this.closeChat();
            } else {
                this.openChat();
            }
        },

        // OPEN CHAT
        openChat() {
            console.log('Opening chat room');
            this.isOpen = true;
            this.showWelcomeTooltip = false;
            this.hasNotification = false;
            this.notificationCount = 0;
            this.currentView = 'welcome';
        },

        // CLOSE CHAT
        closeChat() {
            console.log('Closing chat room');
            this.isOpen = false;
            this.currentView = 'welcome';
            this.searchResults = [];
            this.searchQuery = '';
        },

        async loadCategories() {
            console.log('Loading categories');
            this.isLoading = true;
            this.currentView = 'categories';
            
            try {
                const response = await fetch('/api/chatbot/categories');
                const data = await response.json();
                this.categories = data.categories;
            } catch (error) {
                console.error('Error loading categories:', error);
                // Fallback data for testing
                this.categories = [
                    { id: 1, name: 'Kesehatan Umum', icon: 'heart' },
                    { id: 2, name: 'Layanan Medis', icon: 'stethoscope' },
                    { id: 3, name: 'Wisata Kesehatan', icon: 'map' },
                    { id: 4, name: 'Emergency', icon: 'phone' }
                ];
            } finally {
                this.isLoading = false;
                this.$nextTick(() => {
                    if (typeof lucide !== 'undefined') {
                        lucide.createIcons();
                    }
                });
            }
        },

        async selectCategory(category) {
            console.log('Selected category:', category);
            this.selectedCategory = category.id;
            this.selectedCategoryName = category.name;
            this.isLoading = true;
            this.currentView = 'questions';
            
            try {
                const response = await fetch(`/api/chatbot/questions?category=${category.id}`);
                const data = await response.json();
                this.questions = data.questions;
            } catch (error) {
                console.error('Error loading questions:', error);
                // Fallback data for testing
                this.questions = [
                    { id: 1, text: 'Bagaimana cara membuat janji dengan dokter?', category_id: category.id },
                    { id: 2, text: 'Apa saja layanan yang tersedia?', category_id: category.id },
                    { id: 3, text: 'Dimana lokasi rumah sakit terdekat?', category_id: category.id }
                ];
            } finally {
                this.isLoading = false;
                this.$nextTick(() => {
                    if (typeof lucide !== 'undefined') {
                        lucide.createIcons();
                    }
                });
            }
        },

        async selectQuestion(question) {
            console.log('Selected question:', question);
            this.isLoading = true;
            this.currentView = 'answer';
            
            try {
                const response = await fetch(`/api/chatbot/answer?question_id=${question.id}`);
                const data = await response.json();
                this.currentAnswer = data;
            } catch (error) {
                console.error('Error loading answer:', error);
                // Fallback data for testing
                this.currentAnswer = {
                    question: question.text,
                    answer: 'Ini adalah jawaban untuk pertanyaan: ' + question.text + '. Kami akan membantu Anda dengan informasi yang diperlukan.'
                };
            } finally {
                this.isLoading = false;
            }
        },

        async selectQuestionById(questionId) {
            this.searchResults = [];
            this.searchQuery = '';
            const question = this.questions.find(q => q.id === questionId);
            if (question) {
                await this.selectQuestion(question);
            }
        },

        async showHistory() {
            if (!this.isLoggedIn) return;
            
            console.log('Loading history');
            this.isLoading = true;
            this.currentView = 'history';
            
            try {
                const response = await fetch('/api/chatbot/history');
                const data = await response.json();
                this.history = data.conversations;
            } catch (error) {
                console.error('Error loading history:', error);
                // Fallback data for testing
                this.history = [
                    {
                        id: 1,
                        question: 'Bagaimana cara membuat janji?',
                        answer: 'Anda bisa membuat janji melalui website atau telepon.',
                        date: '2024-01-15'
                    }
                ];
            } finally {
                this.isLoading = false;
            }
        },

        // ENHANCED SEARCH - Now handles smart responses
        async search() {
            if (this.searchQuery.length < 2) {
                this.searchResults = [];
                return;
            }
            
            console.log('Searching for:', this.searchQuery);
            
            try {
                const response = await fetch(`/api/chatbot/search?query=${encodeURIComponent(this.searchQuery)}`);
                const data = await response.json();
                
                if (data.type === 'smart' && data.smart_response) {
                    // Handle smart response (rumah sakit, wisata, darurat)
                    this.smartResponse = data.smart_response;
                    this.currentView = 'smart_response';
                    this.searchResults = [];
                    this.searchQuery = '';
                } else {
                    // Handle regular search results
                    this.searchResults = data.results;
                }
            } catch (error) {
                console.error('Error searching:', error);
                // Simple search simulation
                this.searchResults = this.questions.filter(q => 
                    q.text.toLowerCase().includes(this.searchQuery.toLowerCase())
                ).map(q => ({
                    ...q,
                    category: this.categories.find(c => c.id === q.category_id)?.name || 'Unknown'
                }));
            } finally {
                // Re-initialize icons after DOM update
                this.$nextTick(() => {
                    if (typeof lucide !== 'undefined') {
                        lucide.createIcons();
                    }
                });
            }
        },

        // NEW - Format answer with markdown-like formatting
        formatAnswer(text) {
            if (!text) return '';
            
            return text
                .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
                .replace(/\n/g, '<br>')
                .replace(/📍|📞|🏥|⭐|💰|🏷️|🚨|⚠️|🔴|💡|🔹/g, '<span class="inline-block mr-1">$&</span>');
        },

        backToCategories() {
            console.log('Back to categories');
            this.currentView = 'categories';
            this.searchResults = [];
            this.searchQuery = '';
        },

        backToQuestions() {
            console.log('Back to questions');
            this.currentView = 'questions';
            this.searchResults = [];
            this.searchQuery = '';
        }
    }
}
</script>
