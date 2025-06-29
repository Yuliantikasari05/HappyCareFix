<?php

namespace App\Observers;

use App\Models\Hospital;
use App\Http\Controllers\Admin\DashboardController;

class HospitalObserver
{
    public function created(Hospital $hospital)
    {
        $this->updateDashboard();
    }

    public function updated(Hospital $hospital)
    {
        $this->updateDashboard();
    }

    public function deleted(Hospital $hospital)
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