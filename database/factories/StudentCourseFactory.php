<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentCourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "student_id" => $this->faker->numberBetween(1,10),
            "course_id" => $this->faker->numberBetween(1,10),
        ];
    }
}
