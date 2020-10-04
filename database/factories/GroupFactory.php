<?php

namespace Database\Factories;

use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Department;

class GroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Group::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
        'group_number' => $this->faker->ean8,
        'department_id' => Department::factory(),
        'course' => $this->faker->numberBetween($min = 1, $max = 5),

        ];
    }
}


