<?php

namespace Tests\Feature;

use Tests\TestCase;

class LeadTest extends TestCase
{


    public function test_user_can_load_lead_list()
    {

        $response = $this->asApiUser()->get('/api/leads');

        $records = json_decode($response->getContent());

        $this->assertTrue(count($records->data[0]->data) > 0);

    }

    public function test_user_can_load_single_lead()
    {

        $leadId = 1;

        $response = $this->asApiUser()->get("/api/leads/get/$leadId");

        $record = json_decode($response->getContent());

        $this->assertTrue($record->data->first_name != null);

    }

    public function test_user_can_create_single_lead()
    {

        $data = [
            'first_name' => 'Test',
            'last_name' => 'Test'
        ];

        $response = $this->asApiUser()->post("/api/leads/create", $data);

        $record = json_decode($response->getContent());

        $this->assertTrue($record->data->first_name != null);

    }

    public function test_user_can_update_single_lead()
    {

        $leadId = 1;

        $response = $this->asApiUser()->get("/api/leads/get/$leadId");

        $record = json_decode($response->getContent());

        $this->assertTrue($record->data->first_name != null);

        $object = $record->data;

        $object->first_name = "Mike";

        $response = $this->asApiUser()->post("api/leads/update/$leadId", [
            'first_name' => 'Mike',
            'last_name' => 'Zoltant'
        ]);

        $record = json_decode($response->getContent());

        $this->assertTrue($record->data->first_name == 'Mike');

    }

    public function test_user_can_delete_single_lead()
    {

        $leadId = rand(0, 30);

        $data = [
            'force_delete' => 1
        ];

        $response = $this->asApiUser()->delete("api/leads/delete/$leadId", $data);

        $record = json_decode($response->getContent());

        $this->assertTrue($record->status);

    }
}
