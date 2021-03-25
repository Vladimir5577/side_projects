<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::flushEventListeners();
        Employee::truncate();

        $level_1 = Employee::factory()->create()->pluck('id');

        $level_2 = Employee::factory()->count(1000)->create(['head_id' => $level_1->random()])->pluck('id');
        unset($level_1);

        $level_3 = Employee::factory()->count(5000)
            ->afterMaking(function (Employee $employee) use ($level_2) {
                $employee->head_id = $level_2->random();
            })->create()->pluck('id');
        unset($level_2);

        $level_4 = Employee::factory()->count(10000)
            ->afterMaking(function (Employee $employee) use ($level_3) {
                $employee->head_id = $level_3->random();
            })->create()->pluck('id');
        unset($level_3);

        Employee::factory()->count(34000)
            ->afterMaking(function (Employee $employee) use ($level_4) {
                $employee->head_id = $level_4->random();
            })->create();
        unset($level_4);
    }
}
