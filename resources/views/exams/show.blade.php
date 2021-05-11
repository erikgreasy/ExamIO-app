@extends('layouts.app')

@section('content')
<section class="py-10 px-6 bg-custom-blue_dark">
    <div class="max-w-7xl px-6 py-16 mx-auto bg-gray-100 mt-10">
        <h1 class="font-roboto-slab font-bold text-3xl sm:text-4xl leading-tight my-4 text-center uppercase">Test: {{ $exam->title }} </h1><br>
        <b>Kod testu:</b> {{ $exam->code }} <br>
        <b>limit:</b> {{ $exam->time_limit }} <br><hr>


        <div class="mb-3 pt-0 my-2">
            {{ $exam->description }}
        </div>

        <form action="{{ route('exams.attendances.update', [$exam, $attendance]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="flex flex-col">

                @foreach ($exam->questions as $index => $question)
                    <div class="py-5">
                        <h2 class="text-2xl">
                            {{ ++$index }}. {{ $question->text }}
                        </h2>
                        @switch($question->questionType->full_name)
                            @case('Krátka odpoveď')
                                (Zadajte slovnú odpoveď)
                                <div>
                                    <input type="text" name="question_{{ $index }}">
                                </div>
                                @break
                            @case('Výber odpovede')
                                (Vyberte možnosť)
                                <div>
                                    <select name="" id="">
                                        @foreach( $question->selectOptions as $option )
                                            <option value="{{ $option->id }}">
                                                {{ $option->text }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @break
                            @case('Párovanie odpovedí')
                                ({{ 'Párovanie odpovedí' }})
                                <div class="grid grid-cols-2 gap-4">
                                        <div >
                                            <div class="grid grid-cols-2 gap-1">
                                                @foreach( $question->leftPairOptions as $loption )
                                                <div > 
                                                    <p id="{{ $loption->id }}">
                                                                {{ $loption->text }}
                                                    </p>
                                                </div>
                                                <div >
                                                    <input id="input_{{ $loption->id }}" class="drop" style="border: 4px solid black; border-radius: 6px;">
                                                    <input type="hidden" id="hinput_{{ $loption->id }}">
                                                </div>            
                                                            
                                                @endforeach
                                            </div>
                                        </div>

                                        <div >
                                        @foreach( $question->rightPairOptions as $roption )
                                            
                                            <span id="r{{ $roption->id }}" class="drag"  >
                                                        {{ $roption->text }}
                                            </span>
                                            <br>
                                            
                                        @endforeach
                                        </div>
                                </div>
                                
                                @break
                            @case('Nakreslenie obrázku')
                                ({{'Nakreslenie obrázku'}})
                                <div class="form-check question_{{ $index }}" >
                                    <input class="form-check-input question_{{ $index }}" type="radio" name="flexRadioDefault_question_{{ $index }}" id="pic_question_{{ $index }}" onchange="fileOrInput(this.id)">
                                    <label class="form-check-label" for="pic_question_{{ $index }}">
                                        Pridať obrázok
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input question_{{ $index }}" type="radio" name="flexRadioDefault_question_{{ $index }}" id="drw_question_{{ $index }}" onchange="fileOrInput(this.id)" checked>
                                    <label class="form-check-label" for="drw_question_{{ $index }}">
                                        Nakresliť obrázok
                                    </label>
                                </div>
                                <div class="form-group question_{{ $index }}" id="file_selected_question_{{ $index }}" style="display: none;">
                                    <input type="file" class="form-control-file" id="file_question_{{ $index }}">

                                </div>
                                <div class="form-group question_{{ $index }}" id="draw_selected_question_{{ $index }}" style="display: block;">
                                    <canvas class="sketchpad" id="sketchpad_question_{{ $index }}" style="border: 3px solid;"> </canvas>
                                    <!--
                                    <button class="btn btn-primary" id="undo_question_{{ $index }}" onclick="undoSketch(this.id)"> undo </button>
                                    <button class="btn btn-primary" id="redo_question_{{ $index }}" onclick="redoSketch(this.id)"> rendo </button>
                                    -->
                                </div>
                                @break
                            @case('Napísanie matematického výrazu')
                                ({{'Napísanie matematického výrazu'}})
                                <div class="form-check question_{{ $index }}" >
                                    <input class="form-check-input question_{{ $index }}" type="radio" name="flexRadioDefault_question_{{ $index }}" id="pic_question_{{ $index }}" onchange="fileOrInput(this.id)">
                                    <label class="form-check-label" for="pic_question_{{ $index }}">
                                        Pridať obrázok
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input question_{{ $index }}" type="radio" name="flexRadioDefault_question_{{ $index }}" id="drw_question_{{ $index }}" onchange="fileOrInput(this.id)" checked>
                                    <label class="form-check-label" for="drw_question_{{ $index }}">
                                        Napísať vzorec
                                    </label>
                                </div>
                                <div class="form-group question_{{ $index }}" id="file_selected_question_{{ $index }}" style="display: none;">
                                    <input type="file" class="form-control-file" id="file_question_{{ $index }}">

                                </div>
                                <div class="form-group question_{{ $index }}" id="draw_selected_question_{{ $index }}" style="display: block;">
                                    <math-field virtual-keyboard-mode="manual" id="equation_question_{{ $index }}">f(x)=</math-field>
                                </div>
                                <!--
                                <button onclick="logconsole()" > BUTTON </button>
                                -->
                                @break
                            @default
                                
                        @endswitch
                    </div>
                    <hr>
                
                @endforeach
            </div>
            <button type="submit" class="max-w-xs my-4 bg-custom-blue hover:bg-custom-blue_dark text-white rounded py-3 px-8 shadow-lg font-medium text-lg">Odovzdať</button>
        </form>

    </div>
</section>

@endsection
