<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Domain\User\Database\Seeds\UserTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // run command php artisan db:seed --class=Domain\User\Database\Seeds\UserTableSeeder
        $this->call(UserTableSeeder::class);
    }
}
