<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Core\Notifications\GenericNotification;
use Modules\Notifications\Events\NotificationEvent;
use Modules\Platform\Notifications\Entities\NotificationPlaceholder;
use Modules\Platform\User\Entities\User;

/**
 * Reseed data
 * Class VaanceReseed
 * @package App\Console\Commands
 */
class NotificationTester extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vaance:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'VAANCE Notification Command';

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
        $u = User::find(1);

        $placeholder = new NotificationPlaceholder();
        $placeholder->setContent('New sample...');
        $placeholder->setRecipient($u);

        $u->notify(new GenericNotification($placeholder));
    }
}
