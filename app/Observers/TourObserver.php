<?php

namespace App\Observers;

use App\Models\Tour;
use App\Http\Controllers\Admin\DashboardController;

class TourObserver
{
    public function created(Tour $tour)
    {
        $this->updateDashboard();
    }

    public function updated(Tour $tour)
    {
        $this->updateDashboard();
    }

    public function deleted(Tour $tour)
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