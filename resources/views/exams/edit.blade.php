@extends('layouts.app')

@section('content')

<section class="py-10 px-6 bg-custom-blue_dark">
    <div class="max-w-7xl h-full px-6 py-16 mx-auto bg-gray-100 mt-10">
        <h1 class="font-roboto-slab font-bold text-3xl sm:text-4xl leading-tight mt-3 text-center uppercase">Test: {{ $exam->title }} </h1><br>
        <h3 class="font-roboto-slab font-bold text-lg leading-tight my-2 text-center uppercase">Kód testu: <span class="text-custom-pink underline text-3xl sm:text-4xl">{{ $exam->exam_code }}</span> </h3><br>

        <div class="my-2">
            <b>Časový limit:</b> <span class="text-custom-pink text-2xl sm:text-2xl">{{ $exam->time_limit }} minút</span>
        </div>


        <div class="mb-3 pt-0 mt-2 mb-7 ">
            <b>Popis testu:</b> {{ $exam->description }}
        </div>
        <hr>

        <div class="flex flex-col">
            <?php $pos = 1; ?>
            @foreach ($exam->questions as $question)
            <div class="my-2 flex flex-col">
                <div class="grid grid-cols-3 gap-4">
                    <span class="text-xl sm:text-xl col-span-2">{{ $pos }}) {{ $question->text }}</span>
                    <div>
                        <a href="{{ route('exams.questions.edit', [$exam, $question]) }}">
                            <button  class="bg-custom-blue hover:bg-custom-blue text-white font-bold mx-2 py-2 px-4 rounded-full w-1/4">
                                Upraviť
                            </button>
                        </a>
                        <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full w-1/4">
                            Zmazať
                        </button>

                    </div>

                </div>
                <div><b>Typ otazky:</b> {{ $question->type_id }}</div>
                <div><b>ID testu:</b> {{ $exam->id }}</div>
            </div><hr>
            <?php $pos++; ?>
            @endforeach
        </div>
        <hr>

        <button type="button" id="add_question_to_test" class="max-w-xs my-4 bg-custom-blue hover:bg-custom-blue_dark text-white rounded py-3 px-8 shadow-lg font-medium text-lg">Pridať novú otázku</button>

        </div>
</section>



<!-- div that will pop up when adding new question -->
<div id="add_question_modal" class="flex items-center justify-center fixed left-0 bottom-0 w-full h-full bg-gray-400 hidden">
    <div class="bg-white rounded-lg w-1/2  py-5 px-5">

        <div class="flex flex-col">
            <div class="flex flex-col items-start p-4">
            <div class="flex items-center w-full">
                <div class="text-gray-900 font-semibold text-xl text-center w-full m-2">Pridať novú otázku k testu</div>
            </div>
            <hr>
            <div class="">Zvolte typ otázky a následne vyplnte potrebné polia</div>
<!-- select questionType -->
            <div class="flex flex-wrap py-3 w-full">
                <div class="w-full flex flex-wrap lg:w-6/12 py-2">
                    <div class="relative w-full border-none">
                        <select name="questionType" id="select_questionType" class="bg-custom-kako text-white appearance-none border-none inline-block py-3 pl-3 pr-8 rounded leading-tight w-full">
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
        <form method="post" action="{{ route('exams.questions.store', [$exam]) }}" class="p-4">
            @csrf
            <input type="hidden" name="exam_id" value="{{ $exam->id }}">
            <div id="add_question_selected"></div>
        </form>

            <div class="ml-auto float-right">
                <button type="button" id="add_question_modal_cancel" class="bg-transparent hover:bg-gray-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Zrušiť
                </button>
            </div>
        </div>
    </div>
</div>



@endsection
