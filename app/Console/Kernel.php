<?php

namespace App\Console;

use App\Console\Commands\RefreshUserPostsCommand;
use App\Mail\MonthlyUserEmail;
use App\Post;
use App\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command(RefreshUserPostsCommand::class)
            ->monthlyOn(1, '00:00')
            ->runInBackground();
        $schedule->call(function () {
            $emails = User::all()->pluck('email');
            foreach ($emails as $email) {
                Mail::to($email)->send(new MonthlyUserEmail());
                dd('');
            }
        })->monthlyOn(1, '00:00')
            ->runInBackground();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
