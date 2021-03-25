<?php

namespace Database\Seeders;

use App\Models\Position;
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
        $this->call(UsersSeeder::class);

        Position::flushEventListeners();
        Position::factory(50)->create();

        $this->call(EmployeeSeeder::class);
    }
}
