<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Attendance;
use Illuminate\Support\Str;
use App\Models\SelectOption;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Answer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'attendance_id' => Attendance::all()->random(1)->first()->id,
            'question_id'   => Question::all()->random(1)->first()->id,
            'text'          => $this->faker->sentence(5),
            'img_path'      => Str::random(20),
            'select_option_id'  => SelectOption::all()->random(1)->first()->id,
            'is_correct'    => $this->faker->boolean()
        ];
    }
}
