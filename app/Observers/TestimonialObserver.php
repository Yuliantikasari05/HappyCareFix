<?php

namespace App\Observers;

use App\Models\Testimonial;
use App\Http\Controllers\Admin\DashboardController;

class TestimonialObserver
{
    public function created(Testimonial $testimonial)
    {
        $this->updateDashboard();
    }

    public function updated(Testimonial $testimonial)
    {
        $this->updateDashboard();
    }

    public function deleted(Testimonial $testimonial)
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