<?php

namespace Database\Seeders;

use Domain\User\Database\Seeds\UserTableSeed;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        (new UserTableSeed())->run();
    }
}
