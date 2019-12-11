<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class VaanceCache
 * @package App\Console\Commands
 */
class VaanceCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vaance:cache {--soft}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'VAANCE Optimize';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Remove old combined cs/js');

        $soft = $this->option('soft');

        $this->deleteFiles(public_path() . '/storage/cache/css/');
        $this->deleteFiles(public_path() . '/storage/cache/js/');

        $this->warn('Clear config cache');
        $this->call('config:cache');

        $this->warn("Running module publish");

        $this->call("module:publish");


        if (!$soft) {
            $this->warn('Clear cache');

            $this->call('cache:clear');

            $this->warn('Route cache');

            $this->call('route:cache');
        }


    }


    /**
     * @param $folder
     */
    private function deleteFiles($folder)
    {

        //Get a list of all of the file names in the folder.
        $files = glob($folder . '/*');

        //Loop through the file list.
        foreach ($files as $file) {
            //Make sure that this is a file and not a directory.
            if (is_file($file)) {
                //Use the unlink function to delete the file.
                unlink($file);
            }
        }
    }
}
