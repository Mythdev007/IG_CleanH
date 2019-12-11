<?php

namespace Tests;


use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Auth;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function asApiUser($userId = 1){

        $user = Auth::loginUsingId($userId);

        return $this->apiAs($user);
    }

    public function apiAs($user)
    {

        $token = \JWTAuth::fromUser($user);

        $this->withHeader('Authorization', 'Bearer ' . $token);

        return $this;
    }
}
