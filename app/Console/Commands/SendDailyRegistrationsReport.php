<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Registration;
use PDF;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendDailyRegistrationsReport extends Command
{
    protected $signature = 'report:daily-registrations';
    protected $description = 'Send daily registrations report to admin';

    public function handle()
    {
        // Get yesterday's registrations
        $startDate = Carbon::yesterday()->startOfDay();
        $endDate = Carbon::yesterday()->endOfDay();

        $registrations = Registration::with('event')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

        // Generate PDF
        $pdf = PDF::loadView('reports.daily_registrations', [
            'registrations' => $registrations,
            'date' => $startDate->format('Y-m-d')
        ]);

        $this->info('Daily registrations report sent successfully!');
    }
}
