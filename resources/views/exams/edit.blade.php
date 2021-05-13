@extends('layouts.app')

@section('content')
@can('view',$exam)
<section class="py-10 px-6">
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
                    <div class="flex justify-end">

                        <button  class="bg-custom-blue hover:bg-custom-blue_dark text-white font-bold mx-2 py-2 px-4 rounded-full w-1/4">
                            <a href="{{ route('exams.questions.edit', [$exam, $question]) }}">
                            Upraviť
                            </a>
                        </button>


                        <form class="w-1/4" action="{{ route('exams.questions.destroy', [$exam, $question]) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full w-full">
                                    Zmazať
                            </button>
                        </form>

                    </div>

                </div>
                <div>
                    <b>Typ otazky:</b> {{ $question->questionType->full_name }}<br>
                </div>
            </div><hr>
            <?php $pos++; ?>
            @endforeach
        </div>
        <hr>

        <a href="{{ route('exams.questions.create', $exam) }}" class="max-w-xs my-4 bg-custom-blue hover:bg-custom-blue_dark text-white rounded py-3 px-8 shadow-lg font-medium text-lg">Pridať novú otázku</a>
        {{-- <button type="button" id="add_question_to_test" class="max-w-xs my-4 bg-custom-blue hover:bg-custom-blue_dark text-white rounded py-3 px-8 shadow-lg font-medium text-lg">Pridať novú otázku</button> --}}

        </div>
</section>

@endcan
@endsection
