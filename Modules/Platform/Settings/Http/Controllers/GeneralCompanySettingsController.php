<?php

namespace Modules\Platform\Settings\Http\Controllers;


use Illuminate\Http\Request;
use Modules\Platform\Account\Service\UserMailService;
use Modules\Platform\Core\Helper\CompanySettings;
use Modules\Platform\Core\Http\Controllers\ModuleSettingsController;
use Modules\Platform\Settings\Http\Forms\GeneralCompanySettingsForm;
use Modules\Platform\Settings\Http\Forms\OutgoingServerTestMailForm;
use Modules\SentEmails\Dto\EmailDto;

/**
 * Update General Company Settings
 * Class GeneralCompanySettings
 * @package Modules\Platform\Settings\Http\Controllers
 */
class GeneralCompanySettingsController extends ModuleSettingsController
{

    protected $moduleName = 'settings';

    protected $settingsMode = true;

    protected $languageFile = 'settings::general_company_settings';

    protected $formClass = GeneralCompanySettingsForm::class;

    private $mailService;

    public function __construct(UserMailService $mailService)
    {
        $this->mailService = $mailService;

        parent::__construct();
    }

    protected $jsFiles = [
        'VAANCE_GeneralSettings.js'
    ];


    protected $includeViews = [
        'settings::general_company_settings.sendTestEmail'
    ];

    protected $fieldsName = [
        's_email_notify_host',
        's_email_notify_port',
        's_email_notify_username',
        's_email_notify_password',
        's_email_notify_encryption',
        's_email_notify_mail_from_address',
        's_email_notify_mail_from_name',
        's_email_notify_content_welcome',
        's_email_notify_content_welcome_title'
    ];

    protected $showFields = [

        'email_notify' => [
            's_email_notify_host' => ['type' => 'text', 'col-class' => 'col-lg-4 col-sm-6 col-md-6'],
            's_email_notify_port' => ['type' => 'text', 'col-class' => 'col-lg-4 col-sm-6 col-md-6'],
            's_email_notify_username' => ['type' => 'text', 'col-class' => 'col-lg-4 col-sm-6 col-md-6'],
            's_email_notify_password' => ['type' => 'text', 'col-class' => 'col-lg-4 col-sm-6 col-md-6'],
            's_email_notify_encryption' => ['type' => 'text', 'col-class' => 'col-lg-4 col-sm-6 col-md-6'],
            's_email_notify_mail_from_address' => ['type' => 'text', 'col-class' => 'col-lg-4 col-sm-6 col-md-6'],
            's_email_notify_mail_from_name' => ['type' => 'text', 'col-class' => 'col-lg-6 col-sm-6 col-md-6'],

            'send_test_email' => ['type' => 'button']
        ],
        'email_notify_content' => [
            's_email_notify_content_welcome_text' => ['type' => 'text', 'col-class' => 'col-lg-12'],
            's_email_notify_content_welcome_title' => ['type' => 'text', 'col-class' => 'col-lg-12'],
            's_email_notify_content_welcome' => ['type' => 'text', 'col-class' => 'col-lg-12'],
        ],

    ];

    public function attachToView(&$view)
    {
        $passwordForm = $this->form(OutgoingServerTestMailForm::class, [
            'method' => 'POST',
            'url' => route('settings.general_company_settings.send_test_email'),
            'id' => 'send_test_email_form'
        ]);

        $view->with('sendTestEmailForm', $passwordForm);
    }

    /**
     * Process email from
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendTestEmail(Request $request)
    {

        try {

            $company = \Auth::user()->companyContext();

            $emailSettings = CompanySettings::getMany([
                's_email_notify_host',
                's_email_notify_port',
                's_email_notify_username',
                's_email_notify_password',
                's_email_notify_encryption',
                's_email_notify_mail_from_address',
                's_email_notify_mail_from_name',
            ], $company->id);

            $emailDto = new EmailDto();
            $emailDto->subject = "Test Email from company settings";
            $emailDto->from_name = $emailSettings['s_email_notify_mail_from_name'];
            $emailDto->from_address = $emailSettings['s_email_notify_mail_from_address'];
            $emailDto->to = $request->get('email');
            $emailDto->content = $request->get('message');

            $result = $this->mailService->sendCompanyEmailTest($emailDto, $company->id);

            return response()->json([
                'type' => 'success',
                'message' => trans('settings::general_company_settings.check_your_inbox'),
                'action' => 'refresh'
            ]);

        } catch (\Exception $exception) {

            return response()->json([
                'type' => 'error',
                'message' => $exception->getMessage(),
                'action' => ''
            ]);
        }

    }

    protected $routes = [
        'show' => 'settings.general_company_settings',
        'save' => 'settings.general_company_settings',
    ];


}
