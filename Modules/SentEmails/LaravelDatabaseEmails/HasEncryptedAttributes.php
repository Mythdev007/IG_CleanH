<?php

namespace Modules\SentEmails\LaravelDatabaseEmails;

use Illuminate\Contracts\Encryption\DecryptException;

trait HasEncryptedAttributes
{
    /**
     * The attributes that are encrypted when e-mail encryption is enabled.
     *
     * @var array
     */
    private $encrypted = [
        'recipient',
        'from',
        'cc',
        'bcc',
        'subject',
        'variables',
        'body',

    ];

    /**
     * The attributes that are stored encoded.
     *
     * @var array
     */
    private $encoded = [
        'recipient',
        'from',
        'cc',
        'bcc',
        'variables',
        'attachments',
    ];

    /**
     * Get an attribute from the model.
     *
     * @param  string $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        try {
            $value = $this->attributes[$key];

            if ($this->isEncrypted() && in_array($key, $this->encrypted)) {
                try {
                    $value = decrypt($value);
                } catch (DecryptException $e) {
                    $value = '';
                }
            }

            if (in_array($key, $this->encoded) && is_string($value)) {
                $decoded = json_decode($value, true);

                if (!is_null($decoded)) {
                    $value = $decoded;
                }
            }

        } catch (\Exception $exception) {
            $value = '';
        }

        return $value;


    }
}
