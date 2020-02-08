<?php

namespace App\Console;

use App\Console\Commands\VaanceInstall;
use App\Console\Commands\VaanceReseed;
use App\Console\Commands\EmailTest;
use App\Console\Commands\ExtractTranslations;
use App\Console\Commands\NotificationTester;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Krucas\Settings\Facades\Settings;
use Modules\SentEmails\LaravelDatabaseEmails\SendEmailsCommand;
use Modules\PolizzaCar\Service\CsvExportService;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        VaanceInstall::class,
        VaanceReseed::class,
        NotificationTester::class,
        NotificationTester::class,
        ExtractTranslations::class,
        SendEmailsCommand::class,
        EmailTest::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->command('email:send')->everyFiveMinutes()->withoutOverlapping();

        $schedule->command('vaance:cache')->daily();

        // Set information about cron last run
        $schedule->call(static function () {
            Settings::set('cron_last_run', Carbon::now());
            $time = \Modules\Platform\Core\Helper\UserHelper::formatUserDateTime(Carbon::now());
            if(substr_compare($time, env('FTP_EXPORT_TIME1'),11,5) == 0 || substr_compare($time, env('FTP_EXPORT_TIME2'),11,5) == 0)
            {
                // $file_local = Storage::disk('exports')->get('_20191213.csv');
                // $file_ftp = Storage::disk('ftp')->put('_20191213.csv', $file_local); 
                (new CsvExportService())->uploadToFTP();               
            }
            if(substr_compare($time, env('FTP_RESPOND_TIME1'),11,5) == 0 || substr_compare($time, env('FTP_RESPOND_TIME2'),11,5) == 0)
            {
                //Storage::download('_20191213.csv');
                (new CsvExportService())->exportCsv();
            }
        })->everyMinute();

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

    protected function osProcessIsRunning($needle)
    {
        // get process status. the "-ww"-option is important to get the full output!
        exec('ps aux -ww', $process_status);

        // search $needle in process status
        $result = array_filter($process_status, function ($var) use ($needle) {
            return strpos($var, $needle);
        });

        // if the result is not empty, the needle exists in running processes
        if (!empty($result)) {
            return true;
        }
        return false;
    }
}
