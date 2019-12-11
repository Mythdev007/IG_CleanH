<?php

namespace Modules\Platform\User\Service;


use Modules\Platform\Core\Helper\CompanySettings;
use Modules\Platform\Core\Helper\StringHelper;
use Modules\Platform\User\Entities\User;
use Modules\SentEmails\LaravelDatabaseEmails\Email;

class UserService
{

    /**
     * Send Invitation email to user
     * @param User $user
     * @param $password
     * @return Email|static
     */
    public function sendInviteEmail(User $user, $password)
    {

        $company = \Auth::user()->companyContext();

        $emailSettings = CompanySettings::getMany([
            's_email_notify_host',
            's_email_notify_port',
            's_email_notify_username',
            's_email_notify_password',
            's_email_notify_encryption',
            's_email_notify_mail_from_address',
            's_email_notify_mail_from_name',
            's_email_notify_content_welcome',
            's_email_notify_content_welcome_title'
        ], $company->id);

        if (isset($emailSettings['s_email_notify_host'])) {


            $renderVariables = [
                'name' => $user->name,
                'email' => $user->email,
                'password' => $password,
                'app_url' => config('app.url')
            ];

            $result = Email::compose()
                ->recipient($user->email)
                ->composedById(\Auth::id())
                ->companyId($company->id)
                ->variables([
                    'body' => StringHelper::renderTemplateVariables($emailSettings['s_email_notify_content_welcome'], $renderVariables),
                ])->view('sentemails::email')
                ->subject(StringHelper::renderTemplateVariables($emailSettings['s_email_notify_content_welcome_title'], $renderVariables))
                ->label(StringHelper::renderTemplateVariables($emailSettings['s_email_notify_content_welcome_title'], $renderVariables))
                ->from($emailSettings['s_email_notify_mail_from_address'], $emailSettings['s_email_notify_mail_from_name']);

            $result = $result->send();

            return $result;

        }


    }

}