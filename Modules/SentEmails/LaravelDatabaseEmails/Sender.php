<?php

namespace Modules\SentEmails\LaravelDatabaseEmails;

use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Modules\Platform\Account\Service\UserMailService;

class Sender
{

    protected $mailService;

    public function __construct()
    {
        $this->mailService = new UserMailService();
    }

    /**
     * Send the given e-mail.
     *
     * @param Email $email
     */
    public function send(Email $email)
    {
        if ($email->isSent()) {
            return;
        }

        $email->markAsSending();

        if (!empty($email->getCompanyId())) {
            $this->mailService->companyMailConfigurator($email->getCompanyId());
        } else if (!empty($email->getEmailCampaignId())) {
            $this->mailService->emailCampaignMailerConfigurator($email->getEmailCampaignId());
        } else if (!empty($email->getComposedById())) {
            $this->mailService->userMailerConfigurator($email->getComposedById());
        } else {
            //Do nothing
        }

        $this->getMailerInstance()->send([], [], function (Message $message) use ($email) {
            $this->buildMessage($message, $email);
        });

        $email->markAsSent();
    }

    /**
     * Get the instance of the Laravel mailer.
     *
     * @return Mailer
     */
    private function getMailerInstance()
    {
        return app('mailer');
    }

    /**
     * Build the e-mail message.
     *
     * @param Message $message
     * @param Email $email
     */
    private function buildMessage(Message $message, Email $email)
    {


        $message->to($email->getRecipient())
            ->cc($email->hasCc() ? $email->getCc() : [])
            ->bcc($email->hasBcc() ? $email->getBcc() : [])
            ->subject($email->getSubject())
            ->from($email->getFromAddress(), $email->getFromName())
            ->setBody($email->getBody(), 'text/html');

        $attachmentMap = [
            'attachment' => 'attach',
            'rawAttachment' => 'attachData',
        ];

        foreach ((array)$email->getAttachments() as $attachment) {
            call_user_func_array([$message, $attachmentMap[$attachment['type']]], $attachment['attachment']);
        }
    }
}
