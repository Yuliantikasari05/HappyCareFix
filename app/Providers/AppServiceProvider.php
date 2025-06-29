<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Article;
use App\Models\Testimonial;
use App\Models\Hospital;
use App\Models\Tour;
use App\Observers\UserObserver;
use App\Observers\ArticleObserver;
use App\Observers\TestimonialObserver;
use App\Observers\HospitalObserver;
use App\Observers\TourObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        User::observe(UserObserver::class);
        Article::observe(ArticleObserver::class);
        Testimonial::observe(TestimonialObserver::class);
        Hospital::observe(HospitalObserver::class);
        Tour::observe(TourObserver::class);
    }
}