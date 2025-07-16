<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\HospitalController;
// use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\Admin\ArticleController;

use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\ArticleCategoryController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\TourController;
use App\Http\Controllers\Admin\TourController as AdminTourController;

use App\Http\Controllers\PageController;
use App\Http\Controllers\BotMan\BotManController;
use App\Http\Controllers\ChatBotController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', function () {
    return view('home');
})->name('home');

// About
Route::get('/about', function () {
    return view('about');
})->name('about');

// Hospital Routes
Route::prefix('hospital')->name('hospital.')->group(function () {
    Route::get('/general', function () {
        return view('hospital.general_hospital');
    })->name('general');
    
    Route::get('/specialist', function () {
        return view('hospital.specialist_clinic');
    })->name('specialist');
    
    Route::get('/emergency', function () {
        return view('hospital.emergency');
    })->name('emergency');
});

// Tour Routes
Route::prefix('tour')->name('tour.')->group(function () {
    Route::get('/nature', function () {
        return view('tour.nature');
    })->name('nature');
    
    Route::get('/culinary', function () {
        return view('tour.culinary');
    })->name('culinary');
    
    Route::get('/family', function () {
        return view('tour.family');
    })->name('family');
});

// Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Add this route after the Contact route
Route::post('/contact', function (Request $request) {
    // Validate the form data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);
    
    // Here you would typically send an email or save to database
    // For now, we'll just redirect with a success message
    
    return redirect()->route('contact')->with('success', 'Thank you for your message. We will get back to you soon!');
})->name('contact.send');

// Authentication Routes
Auth::routes(['verify' => true]);

// Email Verification Routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Route verifikasi email kustom
Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])
    ->name('verification.verify')
    ->middleware(['signed']);

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/')->with('verified', 'Your email has been verified!');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Google Login Routes
Route::get('login/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Google Register Routes
Route::get('register/google', [GoogleController::class, 'redirectToGoogle'])->name('register.google');
Route::get('register/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Profile Routes
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
Route::post('/profile/password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('password.update');

// Language Switcher
Route::get('/language/{locale}', [LanguageController::class, 'switch'])->name('language.switch');

// Testimonial routes
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
Route::middleware(['auth'])->group(function () {
    Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
    Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
});

// Article routes
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/search', [ArticleController::class, 'search'])->name('articles.search');
Route::get('/articles/category/{category:slug}', [ArticleController::class, 'category'])->name('articles.category');
Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// ============================================================================
// ADMIN ROUTES - BERSIH TANPA DUPLIKASI
// ============================================================================
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/data', [DashboardController::class, 'data'])->name('dashboard.data');
    Route::post('/dashboard/trigger-update', [DashboardController::class, 'triggerUpdate'])->name('dashboard.trigger-update');
    
    // Users Management
    Route::resource('users', UserController::class);
    Route::patch('/users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggle-status');
    // Users Management
    Route::resource('users', UserController::class);
    Route::patch('/users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggle-status');
    
    // Articles Management
    Route::resource('articles', AdminArticleController::class);
    Route::patch('/articles/{article}/toggle-published', [AdminArticleController::class, 'togglePublished'])->name('articles.toggle-published');
    Route::patch('/articles/{article}/toggle-featured', [AdminArticleController::class, 'toggleFeatured'])->name('articles.toggle-featured');
    
    // Testimonials Management
    Route::resource('testimonials', AdminTestimonialController::class)->except(['create', 'store']);
    Route::patch('/testimonials/{testimonial}/toggle-approval', [AdminTestimonialController::class, 'toggleApproval'])->name('testimonials.toggle-approval');
    Route::patch('/testimonials/{testimonial}/toggle-featured', [AdminTestimonialController::class, 'toggleFeatured'])->name('testimonials.toggle-featured');
    
    // Hospitals Management
    Route::resource('hospitals', HospitalController::class);
    // Hospitals Management
    Route::resource('hospitals', HospitalController::class);
    Route::patch('/hospitals/{hospital}/toggle-featured', [HospitalController::class, 'toggleFeatured'])->name('hospitals.toggle-featured');
    Route::patch('/hospitals/{hospital}/toggle-active', [HospitalController::class, 'toggleActive'])->name('hospitals.toggle-active');
    
    // Tours Management
    Route::resource('tours', TourController::class);
    // Tours Management
    Route::resource('tours', TourController::class);
    Route::patch('/tours/{tour}/publish', [TourController::class, 'publish'])->name('tours.publish');
    Route::patch('/tours/{tour}/unpublish', [TourController::class, 'unpublish'])->name('tours.unpublish');
    Route::patch('/tours/{tour}/toggle-featured', [TourController::class, 'toggleFeatured'])->name('tours.toggle-featured');

    Route::patch('/tours/{tour}/publish', [AdminTourController::class, 'publish'])->name('tours.publish');
    Route::patch('/tours/{tour}/unpublish', [AdminTourController::class, 'unpublish'])->name('tours.unpublish');
    Route::patch('/tours/{tour}/toggle-featured', [AdminTourController::class, 'toggleFeatured'])->name('tours.toggle-featured');
    
    // Content Management (jika masih digunakan)
    Route::resource('content', ContentController::class);
    
    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
    Route::post('/settings/appearance', [SettingController::class, 'updateAppearance'])->name('settings.appearance');
    Route::post('/settings/email', [SettingController::class, 'updateEmail'])->name('settings.email');
    Route::post('/settings/social', [SettingController::class, 'updateSocial'])->name('settings.social');
    Route::post('/settings/advanced', [SettingController::class, 'updateAdvanced'])->name('settings.advanced');
    
    // Admin Profile
    Route::get('/profile', [SettingController::class, 'profile'])->name('profile');
    Route::post('/profile', [SettingController::class, 'updateProfile'])->name('profile.update');
});

// Admin Profile Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // ... existing admin routes ...
    
    // Profile routes
    Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [App\Http\Controllers\Admin\ProfileController::class, 'updatePassword'])->name('profile.password');
});



// Frontend Routes


// Articles Routes (Frontend)
Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [App\Http\Controllers\ArticleController::class, 'show'])->name('articles.show');

// Testimonials Routes (Frontend)
Route::get('/testimonials', [App\Http\Controllers\TestimonialController::class, 'index'])->name('testimonials.index');
Route::middleware('auth')->group(function () {
    Route::get('/testimonials/create', [App\Http\Controllers\TestimonialController::class, 'create'])->name('testimonials.create');
    Route::post('/testimonials', [App\Http\Controllers\TestimonialController::class, 'store'])->name('testimonials.store');
});

// Auth Routes
Auth::routes();

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    // Articles Management (Admin)
    Route::resource('articles', App\Http\Controllers\Admin\ArticleController::class);
    Route::patch('articles/{article}/toggle-published', [App\Http\Controllers\Admin\ArticleController::class, 'togglePublished'])->name('articles.toggle-published');
    Route::patch('articles/{article}/toggle-featured', [App\Http\Controllers\Admin\ArticleController::class, 'toggleFeatured'])->name('articles.toggle-featured');
    
    // Testimonials Management (Admin)
    Route::resource('testimonials', App\Http\Controllers\Admin\TestimonialController::class);
    Route::patch('testimonials/{testimonial}/toggle-approval', [App\Http\Controllers\Admin\TestimonialController::class, 'toggleApproval'])->name('testimonials.toggle-approval');
    Route::patch('testimonials/{testimonial}/toggle-featured', [App\Http\Controllers\Admin\TestimonialController::class, 'toggleFeatured'])->name('testimonials.toggle-featured');
    
    // Hospitals Management (Admin)
    Route::resource('hospitals', App\Http\Controllers\Admin\HospitalController::class);
    
    // Tours Management (Admin)
    Route::resource('tours', App\Http\Controllers\Admin\TourController::class);
    
    // Profile Management (Admin)
    Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [App\Http\Controllers\Admin\ProfileController::class, 'updatePassword'])->name('profile.password');
});

// Articles Routes (Frontend)
Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/category/{slug}', [App\Http\Controllers\ArticleController::class, 'byCategory'])->name('articles.category');
Route::get('/articles/{slug}', [App\Http\Controllers\ArticleController::class, 'show'])->name('articles.show');



// Articles Routes (Frontend)
Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/category/{slug}', [App\Http\Controllers\ArticleController::class, 'byCategory'])->name('articles.category');
Route::get('/articles/{slug}', [App\Http\Controllers\ArticleController::class, 'show'])->name('articles.show');

// Testimonials Routes (Frontend)
Route::get('/testimonials', [App\Http\Controllers\TestimonialController::class, 'index'])->name('testimonials.index');
Route::middleware('auth')->group(function () {
    Route::get('/testimonials/create', [App\Http\Controllers\TestimonialController::class, 'create'])->name('testimonials.create');
    Route::post('/testimonials', [App\Http\Controllers\TestimonialController::class, 'store'])->name('testimonials.store');
});

// Auth Routes
Auth::routes();

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    // Articles Management (Admin)
    Route::resource('articles', App\Http\Controllers\Admin\ArticleController::class);
    Route::patch('articles/{article}/toggle-published', [App\Http\Controllers\Admin\ArticleController::class, 'togglePublished'])->name('articles.toggle-published');
    Route::patch('articles/{article}/toggle-featured', [App\Http\Controllers\Admin\ArticleController::class, 'toggleFeatured'])->name('articles.toggle-featured');
    
    // Testimonials Management (Admin)
    Route::resource('testimonials', App\Http\Controllers\Admin\TestimonialController::class);
    Route::patch('testimonials/{testimonial}/toggle-approval', [App\Http\Controllers\Admin\TestimonialController::class, 'toggleApproval'])->name('testimonials.toggle-approval');
    Route::patch('testimonials/{testimonial}/toggle-featured', [App\Http\Controllers\Admin\TestimonialController::class, 'toggleFeatured'])->name('testimonials.toggle-featured');
    
    // Hospitals Management (Admin)
    Route::resource('hospitals', App\Http\Controllers\Admin\HospitalController::class);
    
    // Tours Management (Admin)
    Route::resource('tours', App\Http\Controllers\Admin\TourController::class);
    
    // Profile Management (Admin)
    Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [App\Http\Controllers\Admin\ProfileController::class, 'updatePassword'])->name('profile.password');
});

// Admin Hospital Routes
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('hospitals', App\Http\Controllers\Admin\HospitalController::class);
});

// Frontend Hospital Routes
Route::prefix('hospital')->name('hospital.')->group(function () {
    Route::get('/general', [App\Http\Controllers\HospitalController::class, 'general'])->name('general');
    Route::get('/specialist-clinic', [App\Http\Controllers\HospitalController::class, 'specialist_clinic'])->name('specialist_clinic');
    Route::get('/emergency', [App\Http\Controllers\HospitalController::class, 'emergency'])->name('emergency');
    Route::get('/{slug}', [App\Http\Controllers\HospitalController::class, 'show'])->name('show');
});
Route::get('/hospitals/general', [HospitalController::class, 'general'])->name('hospitals.general');

Route::get('/hospitals/{hospital}', [HospitalController::class, 'show'])->name('hospitals.show');


// Frontend Tour Routes

// Frontend Tour Routes - Langsung ke kategori
Route::prefix('tour')->name('tour.')->group(function () {
    Route::get('/nature', [TourController::class, 'nature'])->name('nature');
    Route::get('/culinary', [TourController::class, 'culinary'])->name('culinary');
    Route::get('/family', [TourController::class, 'family'])->name('family');
    Route::get('/{slug}', [TourController::class, 'show'])->name('show');
});

// Tambahkan route untuk profile dan dashboard setelah Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('profile');
    })->name('dashboard');
    
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
    
    Route::post('/profile/update', function () {
        // Logic untuk update profile akan ditambahkan nanti
        return back()->with('success', 'Profile updated successfully!');
    })->name('profile.update');
    
    Route::post('/password/update', function () {
        // Logic untuk update password akan ditambahkan nanti
        return back()->with('success', 'Password updated successfully!');
    })->name('password.update');
});


Route::prefix('api/chatbot')->group(function () {
    Route::get('/categories', [ChatbotController::class, 'getCategories']);
    Route::get('/questions', [ChatbotController::class, 'getQuestionsByCategory']);
    Route::get('/answer', [ChatbotController::class, 'getAnswer']);
    Route::get('/search', [ChatbotController::class, 'search']);
    Route::get('/history', [ChatbotController::class, 'getHistory'])->middleware('auth');
});

Route::post('/', function (Request $request) {
    \Log::info('GitHub webhook received', $request->all());
    return response()->json(['status' => 'OK']);
});
