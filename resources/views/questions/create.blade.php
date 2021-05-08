@extends('layouts.app')

@section('content')

<div id="add_question_modal" class="flex items-center justify-center fixed left-0 bottom-0 w-full h-full bg-custom-blue_dark">
    <div class="bg-white rounded-lg w-1/2  py-5 px-5">

        <div class="flex flex-col">
            <div class="flex flex-col items-start p-4">
            <div class="flex items-center w-full">
                <div class="text-gray-900 font-semibold text-2xl text-center w-full m-2">Pridať novú otázku k testu</div>
            </div>
            <hr>
            <div class="">Zvolte typ otázky a následne vyplnte potrebné polia:</div>
<!-- select questionType -->
            <div class="flex flex-wrap py-3 w-full">
                <div class="w-full flex flex-wrap lg:w-6/12 py-2">
                    <div class="relative w-full border-none">
                        <select name="questionType" id="select_questionType" class="bg-custom-blue_dark text-white appearance-none border-none inline-block py-3 pl-3 pr-8 rounded leading-tight w-full">
                            <option class="pt-6" value="textQuestion">Textová</option>
                            <option value="connectQuestion">Spájacia</option>
                            <option value="selectQuestion">Výberová</option>
                            <option value="imageQuestion">Obrázok</option>
                            <option value="formulaQuestion">vzorec</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2">
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif

        <form method="post" action="{{ route('exams.questions.store', $exam) }}" class="p-4">
            @csrf
            <input type="hidden" name="exam_id" value="{{ $exam->id }}">
            <div id="add_question_selected"></div>
            <div class="ml-auto float-right">
                <a href="{{ route('exams.edit', $exam) }}" id="add_question_modal_cancel" class="bg-red-500  hover:bg-red-700 text-white  font-bold py-2 px-4 rounded mx-2">Zrušiť</a>
                <button type="submit" id="add_question_modal_create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pridať</button>
            </div>
        </form>


        </div>
    </div>
</div>



@endsection