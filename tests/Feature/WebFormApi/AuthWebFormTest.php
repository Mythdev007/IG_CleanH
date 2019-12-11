<?php

namespace Tests\Feature\WebFormApi;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Modules\Platform\Account\Service\AccountService;
use Modules\Platform\User\Entities\User;
use Tests\TestCase;

class AuthWebFormTest extends TestCase
{

    use WithFaker;

    public function test_api_auth()
    {

        $user = User::find(1);

        $accountService = App::make(AccountService::class);

        $key = $accountService->generateApiKey($user->id);

        $params = [
            'api_key' => $key,
           'company_id' => 1,
        ];

        $response = $this->post('/api/webform/test/auth', $params);

        $record = json_decode($response->getContent());

        dump($record);

        $this->assertTrue($record->status);
    }


}
