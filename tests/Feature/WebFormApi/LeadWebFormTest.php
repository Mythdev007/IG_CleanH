<?php

namespace Tests\Feature\WebFormApi;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Modules\Platform\Account\Service\AccountService;
use Modules\Platform\User\Entities\User;
use Tests\TestCase;

class LeadWebFormTest extends TestCase
{

    use WithFaker;

    public function test_api_invalid_call()
    {

        // invalid

        $params = [
            'api_key' => 'invalid_api_key'
        ];

        $response = $this->post('/api/webform/leads/create', $params);

        $record = json_decode($response->getContent());

        $response->assertJsonStructure(['message', 'errors']);

    }

    public function test_api_valid_call_by_admin()
    {

        $user = User::find(1);

        $accountService = App::make(AccountService::class);

        $key = $accountService->generateApiKey($user->id);

        $params = [
            'company_id' => 2,
            'first_name' => 'Mike',
            'last_name' => 'Wazowsky',
            'email' => $this->faker->safeEmail
        ];

        $response = $this->post("/api/webform/leads/create?api_key=$key", $params);

        $record = json_decode($response->getContent());

        $this->assertTrue($record->status);
    }


    public function test_api_valid_call_by_user()
    {

        $user = User::find(5);

        $accountService = App::make(AccountService::class);

        $key = $accountService->generateApiKey($user->id);

        $params = [
            'api_key' => $key,
            'first_name' => 'Mike',
            'last_name' => 'Wazowsky',
            'email' => $this->faker->safeEmail
        ];

        $response = $this->post('/api/webform/leads/create', $params);

        $record = json_decode($response->getContent());

        $this->assertTrue($record->status);
    }

}
