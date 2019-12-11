<?php
/**
 * Created by PhpStorm.
 * User: laravel-vaance.com
 * Date: 05.01.19
 * Time: 11:30
 */

namespace Modules\Platform\Account\Service;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Modules\Campaigns\Entities\EmailCampaign;
use Modules\Platform\Account\Dto\EmailSettingsDTO;
use Modules\Platform\Account\Emails\TestMail;
use Modules\Platform\Core\Helper\CompanySettings;
use Modules\Platform\Core\Helper\UserSettings;
use Modules\Platform\User\Entities\User;
use Modules\SentEmails\Dto\EmailDto;
use Modules\SentEmails\Emails\SimpleMail;
use Modules\SentEmails\LaravelDatabaseEmails\Email;

class UserMailService
{


    /**
     * @param array $data
     * @return \Swift_Mailer
     */
    protected function setMailer($data = [])
    {

        Config::set('mail.host', $data['mail_host']);
        Config::set('mail.port', $data['mail_port']);
        Config::set('mail.encryption', $data['mail_encryption']);
        Config::set('mail.username', $data['mail_username']);
        Config::set('mail.password', $data['mail_password']);
        Config::set('mail.from.address', $data['mail_from_address']);
        Config::set('mail.from.name', $data['mail_from_name']);

        $app = App::getInstance();

        $app->singleton('swift.transport', function ($app) {
            return new \Illuminate\Mail\TransportManager($app);
        });

        $mailer = new \Swift_Mailer($app['swift.transport']->driver());

        Mail::setSwiftMailer($mailer);

        return $mailer;

    }


    /**
     * Set Mailer settings base on companyId
     * @param $companyId
     */
    public function companyMailConfigurator($companyId)
    {

        $emailSettings = (object)CompanySettings::getMany([
            's_email_notify_host',
            's_email_notify_port',
            's_email_notify_username',
            's_email_notify_password',
            's_email_notify_encryption',
            's_email_notify_mail_from_address',
            's_email_notify_mail_from_name',
        ],$companyId);

        if (!empty($emailSettings) && isset($emailSettings->s_email_notify_host)) {

            $mailConfig = [
                'mail_host' => $emailSettings->s_email_notify_host,
                'mail_port' => $emailSettings->s_email_notify_port,
                'mail_encryption' => $emailSettings->s_email_notify_encryption,
                'mail_username' => $emailSettings->s_email_notify_username,
                'mail_password' => $emailSettings->s_email_notify_password,
                'mail_from_address' => $emailSettings->s_email_notify_mail_from_address,
                'mail_from_name' => $emailSettings->s_email_notify_mail_from_name,
            ];

            $this->setMailer($mailConfig);

        }

    }

    /**
     * @param $emailCampaignId
     */
    public function emailCampaignMailerConfigurator($emailCampaignId)
    {

        $emailCampaign = EmailCampaign::find($emailCampaignId);

        if (!empty($emailCampaign) && !empty($emailCampaign->email_host)) {

            $mailConfig = [
                'mail_host' => $emailCampaign->email_host,
                'mail_port' => $emailCampaign->email_port,
                'mail_encryption' => $emailCampaign->email_encryption,
                'mail_username' => $emailCampaign->email_username,
                'mail_password' => $emailCampaign->email_password,
                'mail_from_address' => $emailCampaign->email_from_address,
                'mail_from_name' => $emailCampaign->email_from_name,
            ];

            $this->setMailer($mailConfig);

        }
    }

    /**
     * @param null $userId
     * @return \Swift_Mailer
     */
    public function userMailerConfigurator($userId = null)
    {

        if ($mailConfig = $this->getSettings($userId)) {

            if (!empty($mailConfig->mail_host)) {

                $mailConfig = [
                    'mail_host' => $mailConfig->mail_host,
                    'mail_port' => $mailConfig->mail_port,
                    'mail_encryption' => $mailConfig->mail_encryption,
                    'mail_username' => $mailConfig->mail_username,
                    'mail_password' => $mailConfig->mail_password,
                    'mail_from_address' => $mailConfig->mail_from_address,
                    'mail_from_name' => $mailConfig->mail_from_name,
                ];

                return $this->setMailer($mailConfig);

            }
        }

    }

    /**
     * Send test email via email queue
     * @param null $userId
     * @return Email
     */
    public function sendTest($userId = null)
    {

        $user = \Auth::user();

        if (!empty($userId)) {
            $user = User::find($userId);
        }

        $mailConfig = $this->getSettings();

        $result = Email::compose()
            ->mailable(new TestMail("Custom Text"))
            ->composedById($user->id)
            ->subject(trans('account::account.this_is_test_email'))
            ->recipient($user->email)
            ->label(trans('account::account.this_is_test_email'))
            ->from($mailConfig->mail_from_address, $mailConfig->mail_from_name)
            ->send();

        return $result;

    }

    /**
     * Send company Email test via queue
     * @param $companyId
     * @return Email
     */
    public function sendCompanyEmailTest(EmailDto $emailDto, $companyId)
    {

        $result = Email::compose()
            ->mailable(new SimpleMail($emailDto))
            ->companyId($companyId)
            ->subject($emailDto->subject)
            ->recipient($emailDto->to)
            ->label($emailDto->subject)
            ->from($emailDto->from_address, $emailDto->from_name)
            ->send();

        return $result;

    }

    /**
     * @param null $userId
     * @return EmailSettingsDTO
     */
    public function getSettings($userId = null): EmailSettingsDTO
    {
        $dto = new EmailSettingsDTO();

        $password = UserSettings::get(EmailSettingsDTO::MAIL_PASSWORD, null, $userId);

        $dto->mail_host = UserSettings::get(EmailSettingsDTO::MAIL_HOST, null, $userId);
        $dto->mail_port = UserSettings::get(EmailSettingsDTO::MAIL_PORT, null, $userId);
        $dto->mail_username = UserSettings::get(EmailSettingsDTO::MAIL_USERNAME, null, $userId);
        $dto->mail_password = !empty($password) ? decrypt($password) : null;
        $dto->mail_encryption = UserSettings::get(EmailSettingsDTO::MAIL_ENCRYPTION, null, $userId);
        $dto->mail_from_address = UserSettings::get(EmailSettingsDTO::MAIL_FROM_ADDRESS, null, $userId);
        $dto->mail_from_name = UserSettings::get(EmailSettingsDTO::MAIL_FROM_NAME, null, $userId);
        $dto->mail_signature = UserSettings::get(EmailSettingsDTO::MAIL_SIGNATURE, null, $userId);

        return $dto;
    }

    /**
     * Save user email settings
     *
     * @param EmailSettingsDTO $dto
     */
    public function saveSettings(EmailSettingsDTO $dto)
    {
        UserSettings::set(EmailSettingsDTO::MAIL_HOST, $dto->mail_host);
        UserSettings::set(EmailSettingsDTO::MAIL_PORT, $dto->mail_port);
        UserSettings::set(EmailSettingsDTO::MAIL_USERNAME, $dto->mail_username);
        UserSettings::set(EmailSettingsDTO::MAIL_PASSWORD, encrypt($dto->mail_password));
        UserSettings::set(EmailSettingsDTO::MAIL_ENCRYPTION, $dto->mail_encryption);
        UserSettings::set(EmailSettingsDTO::MAIL_FROM_ADDRESS, $dto->mail_from_address);
        UserSettings::set(EmailSettingsDTO::MAIL_FROM_NAME, $dto->mail_from_name);
        UserSettings::set(EmailSettingsDTO::MAIL_SIGNATURE, $dto->mail_signature);

    }

}
