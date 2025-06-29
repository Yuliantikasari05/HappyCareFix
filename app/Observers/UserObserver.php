<?php

namespace App\Observers;

use App\Models\User;
use App\Http\Controllers\Admin\DashboardController;

class UserObserver
{
    public function created(User $user)
    {
        $this->updateDashboard();
    }

    public function updated(User $user)
    {
        $this->updateDashboard();
    }

    public function deleted(User $user)
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