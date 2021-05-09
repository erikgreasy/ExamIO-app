@extends('layouts.app')

@section('content')

    <!-- div that will pop up when adding new question -->
    <div id="add_question_modal"
        class="flex items-center justify-center fixed left-0 bottom-0 w-full h-full bg-custom-blue_dark">
        <div class="bg-white rounded-lg w-1/2 py-5 px-5">


            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><span class="block sm:inline">{{ $error }}</span></li>
                        @endforeach
                    </ul>
                </div>
            @endif

           

            <div class="flex flex-col items-start p-4">
                <div class="flex items-center w-full">
                    <div class="text-gray-900 font-semibold text-2xl text-center w-full m-2">Upravenie otázky</div>
                </div>
            </div>

            <div class="flex flex-col">
                <form method="post" action="{{ route('exams.questions.update', [$exam, $question]) }}" class="p-4">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="exam_id" value="{{ $exam->id }}">

                    @if ($question->type_id == 1)
                        {{-- text question --}}

                        <div class="my-5 flex flex-col">
                            <input type="hidden" name="question_type" value="text_question">

                            Znenie otazky:<br>
                            <div class="mb-4">
                                <input placeholder="Otázka" name="question_text"
                                    class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    type="text" value="{{ $question->text }}">
                            </div>
                            Odpoveď:<br>
                            <div class="mb-4">
                                <input placeholder="Odpoveď" name="question_answer"
                                    class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="username" type="text" value="{{ $answers }}">
                            </div>

                        </div>

                    @elseif ($question->type_id == 2)
                        {{-- select question --}}

                        <div class="my-5 flex flex-col">
                            <input type="hidden" name="question_type" value="select_question">
                            Znenie otazky:<br>
                            <div class="mb-4">
                                <input placeholder="Otázka" name="question_text"
                                    class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    type="text" value="{{ $question->text }}">
                            </div>
                            <button type="button" id="button_select_add_option"
                                class="max-w-xs my-5  bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pridať
                                možnosť</button>

                            Zadajte možnosti:
                            <div id="select_question_options" class="flex flex-col">

                                @foreach ($answers as $answer)
                                    <div class="mb-4 grid grid-cols-6 gap-4">
                                        <input placeholder="Možnosť 1" name="options[]"
                                            class="col-span-5 shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            type="text" value="{{ $answer->text }}">
                                        <label class="inline-flex items-center mt-3">
                                            <input type="radio" name="correct" value={{ $answer->is_correct ? '1' : '0' }}
                                                class="form-radio h-5 w-5 text-orange-600"
                                                {{ $answer->is_correct ? 'checked' : '' }}><span
                                                class="ml-2 text-gray-700">Správna</span>
                                        </label>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                    @elseif ($question->type_id == 3)
                        {{-- pair question --}}

                        <div class="my-5 flex flex-col">
                            <input type="hidden" name="question_type" value="connect_question">
                            Znenie otazky:<br>
                            <div class="mb-4">
                                <input placeholder="Otázka" name="question_text"
                                    class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    type="text" value="{{ $question->text }}">
                            </div>
                            <button type="button" id="button_connect_add_option"
                                class="max-w-xs my-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pridať
                                možnosť</button>

                            Páry otaázok:<br>
                            <div id="connect_question_options" class="flex flex-col">

                                @foreach ($answers as $index => $answer)
                                    <div class="flex flex-row">
                                        <div class="mb-4">
                                            <input placeholder="Otázka" name="options[{{$index}}][left]"
                                                class="shadow appearance-none  rounded w-50 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                type="text" value="{{ $answer->leftPairOption->text }}">
                                        </div>
                                        <div class="mb-4 ml-4">
                                            <input placeholder="Správna odpoveď" name="options[{{$index}}][right]"
                                                class="shadow appearance-none  rounded  w-50 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                type="text" value="{{ $answer->rightPairOption->text }}">
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                    @elseif ($question->type_id == 4)
                        {{-- draw question --}}

                        <div class="my-5 flex flex-col">
                            <input type="hidden" name="question_type" value="image_question"><br>
                            Znenie otazky:<br>
                            <div class="mb-4">
                                <input placeholder="Otázka" name="question_text"
                                    class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    type="text" value="{{ $question->text }}">
                            </div>
                        </div>

                    @elseif ($question->type_id == 5)
                        {{-- formula question --}}

                        <div class="my-5 flex flex-col">
                            <input type="hidden" name="question_type" value="formula_question"><br>
                            Znenie otazky:<br>
                            <div class="mb-4">
                                <input placeholder="Otázka" name="question_text"
                                    class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    type="text" value="{{ $question->text }}">
                            </div>
                        </div>

                    @endif

                    <div class="ml-auto float-right">
                        <a href="{{ route('exams.edit', $exam->id) }}"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-2">Zrušiť</a>
                        <button type="submit" id="add_question_modal_create"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Potvrdiť</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection
