<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\Question;
use App\Models\QuestionType;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'exam_id'   => Exam::all()->random(1)->first()->id,
            'type_id'   => QuestionType::all()->random(1)->first()->id,
            'text'      => $this->faker->sentence(5)
        ];
    }
}
