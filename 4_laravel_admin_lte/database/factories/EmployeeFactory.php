<?php

namespace Database\Factories;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @throws Exception
     *
     * @return array
     */
    public function definition() : array
    {
        return [
            'photo' => 'https://randomuser.me/api/portraits/thumb/men/'.random_int(1, 99).'.jpg',
            'name' => $this->faker->name,
            'phone' => $this->faker->numerify('+380 (##) ### ## ##'),
            'email' => $this->faker->unique()->email,
            'position_id' => Position::inRandomOrder()->first()->id,
            'salary' => $this->faker->randomFloat(3, 0, 500),
            'date' => Carbon::parse($this->faker->dateTimeBetween())->isoFormat('DD.MM.YY'),
            'admin_created_id' => User::inRandomOrder()->first()->id ?? null,
        ];
    }
}
