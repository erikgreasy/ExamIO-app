<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\Attendance;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attendance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'exam_id'       => Exam::all()->random(1)->first()->id,
            'started_at'    => now(),
            'active'        => $this->faker->boolean(),
            'first_name'    => $this->faker->firstName(),
            'last_name'     => $this->faker->lastName(),
            'ais_id'        => Str::random(5)
        ];
    }
}
