<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee; // Import the Employee model

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'          => $this->faker->name,
            'job_title'     => $this->faker->jobTitle,
            'joining_date'  => $this->faker->date(),
            'salary'        => $this->faker->randomFloat(2, 10000, 100000), 
            'email'         => $this->faker->unique()->safeEmail,
            'mobile_no'     => $this->faker->unique()->phoneNumber,
            'address'       => $this->faker->address,
        ];
    }
}
