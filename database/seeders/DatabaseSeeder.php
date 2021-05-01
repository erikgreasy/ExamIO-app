<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\User;
use App\Models\Question;
use App\Models\QuestionType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        Exam::factory(50)->create();
        QuestionType::factory(5)->create();
        Question::factory(100)->create();
    }
}
