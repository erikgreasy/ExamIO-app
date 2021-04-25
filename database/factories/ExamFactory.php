<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exam::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'exam_code'     => Str::random(5),
            'user_id'       => User::all()->random(1)->first()->id,
            'time_limit'    => $this->faker->numberBetween(100, 2000),
            'active'        => $this->faker->boolean
        ];
    }
}
