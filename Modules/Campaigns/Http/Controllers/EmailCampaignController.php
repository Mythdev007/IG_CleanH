<?php

namespace Modules\Campaigns\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Modules\Campaigns\Datatables\Tabs\EmailCampaignDatatable;
use Modules\Campaigns\Entities\Campaign;
use Modules\Campaigns\Entities\EmailCampaign;
use Modules\Campaigns\Http\Forms\EmailCampaignForm;
use Modules\Campaigns\Http\Requests\EmailCampaignRequest;
use Modules\Campaigns\Resources\EmailCampaignService;
use Modules\Platform\Account\Service\UserMailService;
use Modules\Platform\Core\Http\Controllers\ModuleCrudController;
use Modules\SentEmails\Service\SendEmailService;

class EmailCampaignController extends ModuleCrudController
{

    protected $datatable = EmailCampaignDatatable::class;

    protected $formClass = EmailCampaignForm::class;

    protected $storeRequest = EmailCampaignRequest::class;

    protected $updateRequest = EmailCampaignRequest::class;

    protected $entityClass = EmailCampaign::class;

    protected $moduleName = 'campaigns';

    protected $permissions = [
        'browse' => 'campaigns.browse',
        'create' => 'campaigns.create',
        'update' => 'campaigns.update',
        'destroy' => 'campaigns.destroy'
    ];

    protected $moduleSettingsLinks = [

    ];

    protected $settingsPermission = 'campaigns.settings';

    protected $showFields = [

        'information' => [

            'subject' => [
                'type' => 'text',
                'col-class' => 'col-lg-12 col-md-12 col-sm-12 col-xs-12'
            ],
            'body' => [
                'type' => 'text',
                'col-class' => 'col-lg-12 col-md-12 col-sm-12 col-xs-12'
            ],
        ],

        'email_settings' => [
            'email_host' => [
                'type' => 'text',
            ],
            'email_port' => [
                'type' => 'text',
            ],
            'email_username' => [
                'type' => 'text',
            ],
            'email_password' => [
                'type' => 'text',
            ],
            'email_encryption' => [
                'type' => 'text',
            ],
            'email_from_address' => [
                'type' => 'text',
            ],
            'email_from_name' => [
                'type' => 'text',
            ],
            'test_mode' => ['type' => 'checkbox', 'col-class' => 'col-lg-6'],
            'email_test' => [
                'type' => 'text',
            ],

        ],

    ];

    protected $languageFile = 'campaigns::campaigns';

    protected $routes = [
        'index' => 'campaigns.emailcampaign.index',
        'create' => 'campaigns.emailcampaign.create',
        'show' => 'campaigns.emailcampaign.show',
        'edit' => 'campaigns.emailcampaign.edit',
        'store' => 'campaigns.emailcampaign.store',
        'destroy' => 'campaigns.emailcampaign.destroy',
        'update' => 'campaigns.emailcampaign.update'
    ];

    private $emailCampaignService;

    public function __construct(UserMailService $mailService, EmailCampaignService $emailCampaignService)
    {
        parent::__construct();

        $this->emailCampaignService = $emailCampaignService;

    }

    /**
     * @param $request
     * @param $entity
     */
    public function afterStore($request, &$entity)
    {

        //Implement after store
        $this->emailCampaignService->prepareEmailCampaign($request->all(),$entity);

    }

    /**
     * @param $request
     * @param $entity
     */
    public function afterUpdate($request, &$entity)
    {
        $this->emailCampaignService->prepareEmailCampaign($request->all(),$entity);

    }



}
