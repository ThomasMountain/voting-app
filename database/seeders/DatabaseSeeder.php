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
             'name' => 'Admin User',
             'email' => 'admin@example.com',
         ]);

        UserFactory::new()->withPersonalTeam()->create([
            'name' => 'Andy',
            'email' => 'andy@example.com',
        ]);

        UserFactory::new()->withPersonalTeam()->create([
            'name' => 'David',
            'email' => 'david@example.com',
        ]);
    }
}
