@extends('layouts.app')

@section('content')

<section class="py-10 px-6 bg-custom-blue_dark">
    <div class="max-w-7xl h-screen px-6 py-16 mx-auto bg-gray-100 mt-10">
        <h1 class="font-roboto-slab font-bold text-3xl sm:text-4xl leading-tight my-4 text-center uppercase">Test: {{ $exam_title }} </h1><br>
        <b>Kod testu:</b> {{ $exam_code }} <br>
        <b>limit:</b> {{ $time_limit }} <br><hr>


        <div class="mb-3 pt-0 my-2">
            {{ $exam_description }}
        </div> 

        <div class="flex flex-col">
            @foreach ($questions as $question)
            <div> <hr>
                <p><b>Text otazky:</b> {{ $question->text }}<br>
                <b>Typ otazky:</b> {{ $question->type_id }}<br>
                <b>ID testu:</b> {{ $question->exam_id }}<br>
                </p><hr>
            <div>
            @endforeach
        </div>
        <hr>

        <button type="button" id="add_question_to_test" class="max-w-xs my-4 bg-custom-blue hover:bg-custom-blue_dark text-white rounded py-3 px-8 shadow-lg font-medium text-lg">Pridať novú otázku</button>
           
        </div>
</section>



<!-- div that will pop up when adding new question -->
<div id="add_question_modal" class="flex items-center justify-center fixed left-0 bottom-0 w-full h-full bg-gray-800" style="display:none">
    <div class="bg-white rounded-lg w-1/2">
        <div class="flex flex-col items-start p-4">
        <div class="flex items-center w-full">
            <div class="text-gray-900 font-medium text-lg">Pridať novú otázku k testu</div>
            <svg class="ml-auto fill-current text-gray-700 w-6 h-6 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
            </svg>
        </div>
        <hr>
        <div class="">Zvolte typ otázky a následne vyplnte potrebné polia</div>
        <select name="questionType" id="select_questionType">
            <option value="textQuestion">Textová</option>
            <option value="connectQuestion">Spájacia</option>
            <option value="selectQuestion">Výberová</option>
            <option value="imageQuestion">Obrázok</option>
            <option value="formulaQuestion">vzorec</option>
        </select>
        <hr>
        <div class="ml-auto">
            <button id="add_question_modal_create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Pridať
            </button>
            <button id="add_question_modal_cancel" class="bg-transparent hover:bg-gray-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            Zrušiť
            </button>
        </div>
        </div>
    </div>
</div>



@endsection