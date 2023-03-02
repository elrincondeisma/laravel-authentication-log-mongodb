<?php

namespace Elrincondeisma\LaravelAuthenticationLogMongodb\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Elrincondeisma\LaravelAuthenticationLogMongodb\Models\AuthenticationLog;

class AuthenticationLogFactory extends Factory
{
    protected $model = AuthenticationLog::class;

    public function definition()
    {
        return [];
    }
}
