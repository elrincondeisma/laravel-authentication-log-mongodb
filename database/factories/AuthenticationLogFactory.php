<?php

namespace Elrincondeisma\LaravelAuthenticationLog\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Elrincondeisma\LaravelAuthenticationLog\Models\AuthenticationLog;

class AuthenticationLogFactory extends Factory
{
    protected $model = AuthenticationLog::class;

    public function definition()
    {
        return [];
    }
}
