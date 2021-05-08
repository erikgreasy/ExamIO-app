@extends('layouts.app')

@section('content')

    <!-- div that will pop up when adding new question -->
    <div id="add_question_modal"
        class="flex items-center justify-center fixed left-0 bottom-0 w-full h-full bg-custom-blue_dark">
        <div class="bg-white rounded-lg w-1/2 py-5 px-5">

            <div class="flex flex-col items-start p-4">
                <div class="flex items-center w-full">
                    <div class="text-gray-900 font-semibold text-2xl text-center w-full m-2">Upravenie otázky</div>
                </div>
            </div>

            {{-- text question --}}
            @if ($question->type_id == 1)
                <div class="flex flex-col">
                    <form method="post" action="{{ route('exams.questions.update', [$exam, $question]) }}" class="p-4">
                        @csrf
                        <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                        <div id="add_question_selected"></div>
                    </form>
                </div>
            @endif



            <div class="ml-auto float-right">
                <button type="button" id="add_question_modal_cancel"
                    class="bg-red-500  hover:bg-red-700 text-white  font-bold py-2 px-4 rounded mx-2">Zrušiť</button>
                <button type="submit" id="add_question_modal_create"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pridať</button>
            </div>

        </div>
    </div>

@endsection