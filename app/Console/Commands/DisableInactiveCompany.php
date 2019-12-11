<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Modules\Core\Notifications\GenericNotification;
use Modules\Notifications\Events\NotificationEvent;
use Modules\Platform\Companies\Service\CompanyService;
use Modules\Platform\Notifications\Entities\NotificationPlaceholder;
use Modules\Platform\User\Entities\User;

/**
 * Disable Inactive Company
 *
 * Class DisableInactiveCompany
 * @package App\Console\Commands
 */
class DisableInactiveCompany extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vaance:disable_inactive_company';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Disable inactive company';

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

        $companyService =  App::make(CompanyService::class);

        $companyService->disableInactiveCompanies();

    }
}
