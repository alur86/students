<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Group;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
           'name' => $this->faker->firstName,
           'surname' => $this->faker->lastName,
           'birthdate'=>$this->faker->date,
           'group_id' => Group::factory(),
        ];
    }
}