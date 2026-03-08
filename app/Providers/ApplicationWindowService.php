<?php

namespace App\Providers;

use App\Models\ApplicationWindow;
use Illuminate\Support\Carbon;

class ApplicationWindowService
{
    public function getWindowStatus(): array
    {
        $today = Carbon::now()->startOfDay();
        $window = ApplicationWindow::orderBy('start_date')->first();

        if (!$window) {
            return [
                'active' => false,
                'message' => 'No application windows have been set yet.',
            ];
        }

        if ($today->between($window->start_date, $window->end_date)) {
            return [
                'active' => true,
                'batch' => $window->batch,
                'message' => 'Applications are currently open.',
            ];
        }

        if ($today->lt(Carbon::parse($window->start_date))) {
            $diff = Carbon::parse($window->start_date)->diffForHumans($today, [
                'short' => false,
                'parts' => 2,
                'syntax' => Carbon::DIFF_RELATIVE_TO_NOW,
            ]);

            return [
                'active' => false,
                'message' => "Applications will open {$diff}.",
            ];
        }
        

        return [
            'active' => false,
            'message' => 'Applications have closed. Please check back for the next window.',
        ];
    }
}

