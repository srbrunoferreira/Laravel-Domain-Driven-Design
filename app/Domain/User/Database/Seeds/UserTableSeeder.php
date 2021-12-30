<?php

namespace Domain\User\Database\Seeds;

use Illuminate\Database\Seeder;
use Domain\User\Entities\User;

class UserTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // run command php artisan db:seed --class=Domain\User\Database\Seeds\UserTableSeeder
        User::factory(50)->create();
    }
}
