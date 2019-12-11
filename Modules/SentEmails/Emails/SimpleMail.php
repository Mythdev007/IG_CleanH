<?php

namespace Modules\SentEmails\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\SentEmails\Dto\EmailDto;

/**
 * Simple Mail for sending test emails
 * Class SimpleMail
 * @package Modules\SentEmails\Emails
 */
class SimpleMail extends Mailable
{
    use SerializesModels;

    public $emailDto;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EmailDto $emailDto)
    {
        $this->emailDto = $emailDto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $this->with('email_dto', $this->emailDto);

        return $this->subject($this->emailDto->subject)->markdown('sentemails::markdown_mail');
    }
}
