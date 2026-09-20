<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Keep Google Drive account storage quotas fresh automatically.
Schedule::command('drive:sync-quotas')->hourly()->onOneServer()->withoutOverlapping();
