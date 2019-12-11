<?php


namespace Modules\Campaigns\Resources;


use Modules\Campaigns\Entities\EmailCampaign;
use Modules\Platform\Core\Helper\StringHelper;
use Modules\SentEmails\LaravelDatabaseEmails\Email;
use Modules\SentEmails\Service\SendEmailService;

class EmailCampaignService
{

    private $sendEmailService;

    public function __construct(SendEmailService $sendEmailService)
    {

        $this->sendEmailService = $sendEmailService;
    }

    const DEBUG_MODE = false;

    /**
     * Send test email to lead, contact, account
     * @param $data
     * @param EmailCampaign $emailCampaign
     */
    private function storeAndSendTestEmail($data, EmailCampaign $emailCampaign)
    {

        $lead = $emailCampaign->campaign->leads()->first();

        if (!empty($lead)) {

            $result = Email::compose()
                ->recipient($emailCampaign->email_test)
                ->composedById(\Auth::id())
                ->emailCampaignId($emailCampaign->id)
                ->campaignId($emailCampaign->campaign_id)
                ->variables([
                    'body' => StringHelper::renderTemplateVariables($emailCampaign->body, $lead->toArray()),
                ])->view('sentemails::email')
                ->subject(StringHelper::renderTemplateVariables($emailCampaign->subject, $lead->toArray()))
                ->label(StringHelper::renderTemplateVariables($emailCampaign->subject, $lead->toArray()))
                ->from($emailCampaign->email_from_address, $emailCampaign->email_from_name);

            $result = $result->send();
        }

        $contact = $emailCampaign->campaign->contacts()->first();

        if (!empty($contact)) {

            $result = Email::compose()
                ->recipient($emailCampaign->email_test)
                ->composedById(\Auth::id())
                ->emailCampaignId($emailCampaign->id)
                ->campaignId($emailCampaign->campaign_id)
                ->variables([
                    'body' => StringHelper::renderTemplateVariables($emailCampaign->body, $contact->toArray()),
                ])->view('sentemails::email')
                ->subject(StringHelper::renderTemplateVariables($emailCampaign->subject, $contact->toArray()))
                ->label(StringHelper::renderTemplateVariables($emailCampaign->subject, $contact->toArray()))
                ->from($emailCampaign->email_from_address, $emailCampaign->email_from_name);

            $result = $result->send();
        }

        $account = $emailCampaign->campaign->accounts()->first();

        if (!empty($account)) {

            $result = Email::compose()
                ->recipient($emailCampaign->email_test)
                ->composedById(\Auth::id())
                ->emailCampaignId($emailCampaign->id)
                ->campaignId($emailCampaign->campaign_id)
                ->variables([
                    'body' => StringHelper::renderTemplateVariables($emailCampaign->body, $account->toArray()),
                ])->view('sentemails::email')
                ->subject(StringHelper::renderTemplateVariables($emailCampaign->subject, $account->toArray()))
                ->label(StringHelper::renderTemplateVariables($emailCampaign->subject, $account->toArray()))
                ->from($emailCampaign->email_from_address, $emailCampaign->email_from_name);

            $result = $result->send();
        }
    }

    private function storeAndSendCampaign($data, EmailCampaign $emailCampaign)
    {

        $leads = $emailCampaign->campaign->leads()->get();

        $emailCampaign->leads_to_sent = $leads->count();

        if (count($leads) > 0) {

            foreach ($leads as $lead) {

                $exist = Email::whereEmailCampaignId($emailCampaign->id)->where('recipient','LIKE',"%$lead->email%")->get();
                if (count($exist) == 0 ){
                    $result = Email::compose()
                        ->recipient(self::DEBUG_MODE ? $emailCampaign->email_test : $lead->email)
                        ->composedById(\Auth::id())
                        ->emailCampaignId($emailCampaign->id)
                        ->campaignId($emailCampaign->campaign_id)
                        ->variables([
                            'body' => StringHelper::renderTemplateVariables($emailCampaign->body, $lead->toArray()),
                        ])->view('sentemails::email')
                        ->subject(StringHelper::renderTemplateVariables($emailCampaign->subject, $lead->toArray()))
                        ->label(StringHelper::renderTemplateVariables($emailCampaign->subject, $lead->toArray()))
                        ->from($emailCampaign->email_from_address, $emailCampaign->email_from_name);

                    $result = $result->send();

                }

            }

        }

        $contacts = $emailCampaign->campaign->contacts()->get();

        $emailCampaign->contacts_to_sent = $contacts->count();

        if (count($contacts) > 0) {

            foreach ($contacts as $contact) {

                if (!self::DEBUG_MODE) {

                    $exist = Email::whereEmailCampaignId($emailCampaign->id)->where('recipient','LIKE',"%$contact->email%")->get();

                    if (count($exist) > 0) { // do not duplicate email send
                        break;
                    }
                }

                $result = Email::compose()
                    ->recipient(self::DEBUG_MODE ? $emailCampaign->email_test : $contact->email)
                    ->composedById(\Auth::id())
                    ->emailCampaignId($emailCampaign->id)
                    ->campaignId($emailCampaign->campaign_id)
                    ->variables([
                        'body' => StringHelper::renderTemplateVariables($emailCampaign->body, $contact->toArray()),
                    ])->view('sentemails::email')
                    ->subject(StringHelper::renderTemplateVariables($emailCampaign->subject, $contact->toArray()))
                    ->label(StringHelper::renderTemplateVariables($emailCampaign->subject, $contact->toArray()))
                    ->from($emailCampaign->email_from_address, $emailCampaign->email_from_name);

                $result = $result->send();
            }

        }

        $accounts = $emailCampaign->campaign->accounts()->get();

        $emailCampaign->accounts_to_sent = $accounts->count();

        if (count($accounts) > 0) {

            foreach ($accounts as $account) {

                if (!self::DEBUG_MODE) {

                    $exist = Email::whereEmailCampaignId($emailCampaign->id)->where('recipient','LIKE',"%$account->email%")->get();

                    if (count($exist) > 0) { // do not duplicate email send
                        break;
                    }
                }

                $result = Email::compose()
                    ->recipient(self::DEBUG_MODE ? $emailCampaign->email_test : $account->email)
                    ->composedById(\Auth::id())
                    ->emailCampaignId($emailCampaign->id)
                    ->campaignId($emailCampaign->campaign_id)
                    ->variables([
                        'body' => StringHelper::renderTemplateVariables($emailCampaign->body, $account->toArray()),
                    ])->view('sentemails::email')
                    ->subject(StringHelper::renderTemplateVariables($emailCampaign->subject, $account->toArray()))
                    ->label(StringHelper::renderTemplateVariables($emailCampaign->subject, $account->toArray()))
                    ->from($emailCampaign->email_from_address, $emailCampaign->email_from_name);

                $result = $result->send();
            }

        }

        $emailCampaign->save();

    }

    /**
     * Prepare email campaign
     *
     * @param $data
     * @param EmailCampaign $emailCampaign
     */
    public function prepareEmailCampaign($data, EmailCampaign $emailCampaign)
    {

        if ($emailCampaign != null) {


            if ($emailCampaign->test_mode) {
                $this->storeAndSendTestEmail($data, $emailCampaign);
            } else {

                $this->storeAndSendCampaign($data, $emailCampaign);

            }
        }

    }

}
