<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Module Translation
    |--------------------------------------------------------------------------
    */

    'title' => 'General Company Settings',
    'description' => 'Update general company settings ',
    'settings_updated' => 'Settings updated',
    'updated' => 'Settings updated',

    'send_test_email' => 'Send Test Email base on Company Email Settings',
    'check_your_inbox' => 'Check You Inbox',

    'panel' => [
      'email_notify' => 'Email Notifications',
      'email_notify_content' => 'Email Content',
    ],


    'form' => [

        's_email_notify_host' => 'Host',
        's_email_notify_port' => 'Port',
        's_email_notify_username' => 'Username',
        's_email_notify_password' => 'Password',
        's_email_notify_encryption' => 'Encryption',
        's_email_notify_mail_from_address' => 'Mail From Address',
        's_email_notify_mail_from_name' => 'Mail From Name',

        's_email_notify_content_welcome' => 'User Invite Email Content',
        's_email_notify_content_welcome_description' => 'You can use "{{name}} {{email}} {{password}} {{app_url}} variables in email content."',
        's_email_notify_content_welcome_title' => 'User Invite Email Title',

        'save' => 'Save'
    ]


];
