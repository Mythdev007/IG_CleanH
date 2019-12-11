<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Reseed data
 * Class VaanceReseed
 * @package App\Console\Commands
 */
class VaanceReseed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vaance:reseed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'VAANCE Reseed Command';

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
        $this->call('db:seed', ['--force'=>true]);
    }
}
