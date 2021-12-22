<?php

namespace Domain\User\Database\Seeds;

use Domain\User\Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class UserTableSeed extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        UserFactory::factory(50)->create();
    }
}
