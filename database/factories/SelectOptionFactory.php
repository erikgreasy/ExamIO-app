<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\SelectOption;
use Illuminate\Database\Eloquent\Factories\Factory;

class SelectOptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SelectOption::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'text'          => $this->faker->sentence(10),
            'question_id'   => Question::all()->random(1)->first()->id,
            'is_correct'    => $this->faker->boolean()
        ];
    }
}
