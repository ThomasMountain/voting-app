<?php

namespace Database\Seeders;

use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        UserFactory::new()->withPersonalTeam()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);
    }
}