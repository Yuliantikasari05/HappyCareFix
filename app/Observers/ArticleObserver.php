<?php

namespace App\Observers;

use App\Models\Article;
use App\Http\Controllers\Admin\DashboardController;

class ArticleObserver
{
    public function created(Article $article)
    {
        $this->updateDashboard();
    }

    public function updated(Article $article)
    {
        $this->updateDashboard();
    }

    public function deleted(Article $article)
    {
        $this->updateDashboard();
    }

    private function updateDashboard()
    {
        try {
            app(DashboardController::class)->triggerUpdate();
        } catch (\Exception $e) {
            \Log::error('Dashboard update failed: ' . $e->getMessage());
        }
    }
}