<?php

namespace App\Jobs;

use Carbon\Carbon;
use Dyrynda\Defibrillator\Defibrillator;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PrintCurrentTime implements ShouldQueue
{
    use Defibrillator, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->hasAbnormalRhythm()) {
            $this->defibrillate();
            return;
        }

        // Regular processing
        $this->defibrillate();
        echo Carbon::now()->format('Y-m-d H:i:s') . PHP_EOL;
    }
}
