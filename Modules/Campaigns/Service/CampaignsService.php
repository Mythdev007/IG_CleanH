<?php


namespace Modules\Campaigns\Service;


use Modules\SentEmails\LaravelDatabaseEmails\Email;

class CampaignsService
{

    /**
     * Count Sent Email in Email Campaign
     * @param $row
     * @return string
     */
    public function countSent($row)
    {

        $result = [
            'all' => $row->leads_to_sent + $row->contacts_to_sent + $row->accounts_to_sent,
            'sent' => 0,
            'failed' => 0
        ];

        $sentEmail = Email::whereCampaignId($row->id)->whereNotNull('sent_at')->count();
        $failedEmail = Email::whereCampaignId($row->id)->where('error', '!=', "")->count();

        if ($sentEmail > 0) {
            $result['sent'] = $sentEmail;
        }
        if ($failedEmail > 0) {
            $result['failed'] = $failedEmail;
        }

        return $result['all'] . '/' . $result['sent'] . '/' . $result['failed'];
    }

}
