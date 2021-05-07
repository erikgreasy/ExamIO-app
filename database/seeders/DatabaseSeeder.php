<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\User;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Attendance;
use Illuminate\Support\Str;
use App\Models\QuestionType;
use App\Models\SelectOption;
use App\Models\LeftPairOption;
use App\Models\RightPairOption;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // CREATING TEST USER
        User::create([
            'name'              => 'Admin', 
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
            'email'             => 'admin@admin.com',
            'remember_token'    => Str::random(10),
        ]);

        
        User::factory(5)->create();
        Exam::factory(10)->create();
        
        QuestionType::create([
            'full_name' => 'Krátka odpoveď'
        ]);
        QuestionType::create([
            'full_name' => 'Výber odpovede'
        ]);
        QuestionType::create([
            'full_name' => 'Párovanie odpovedí'
        ]);
        QuestionType::create([
            'full_name' => 'Nakreslenie obrázku'
        ]);
        QuestionType::create([
            'full_name' => 'Napísanie matematického výrazu'
        ]);

        Question::factory(100)->create();
        Attendance::factory(100)->create();

        $selectQuestions = Question::all()->where('type_id', 2);
        foreach($selectQuestions as $question) {
            for($i=0; $i<4; $i++) {
                SelectOption::create([
                    'text'          => Str::random(10),
                    'question_id'   => $question->id,
                    'is_correct'    => false
                ]);

                SelectOption::create([
                    'text'  => Str::random(10),
                    'question_id'   => $question->id,
                    'is_correct'    => true
                ]);
            }
        }

        $pairQuestions = Question::all()->where('type_id', 3);
        foreach($pairQuestions as $question) {
            for($i=0; $i<5; $i++) {
                LeftPairOption::create([
                    'text'          => Str::random(10),
                    'question_id'   => $question->id
                ]);
                RightPairOption::create([
                    'text'          => Str::random(10),
                    'question_id'   => $question->id
                ]);
            }
        }
    }
}
