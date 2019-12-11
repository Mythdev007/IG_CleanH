<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class TestAuthApi extends TestCase
{

    public function test_admin_can_load_leads()
    {

        $user = Auth::loginUsingId(1);

        $response = $this->apiAs($user)->get('/api/leads');

        $records = json_decode($response->getContent());

        $this->assertTrue(count($records->data[0]->data) > 0 );

    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_can_login()
    {

        $params = [
            'email' => 'admin@laravel-vaance.com',
            'password' => 'admin'
        ];

        $response = $this->post('/api/login', $params);

        $result = json_decode($response->getContent());

        $this->assertTrue($result->data->user != null);
        $this->assertTrue($result->data->access_token != null);


        $response->assertStatus(200);

    }


}
