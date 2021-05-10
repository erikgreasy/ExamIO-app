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
                                @break
                            @case('Nakreslenie obrázku')
                                ({{'Nakreslenie obrázku'}})
                                @break
                            @case('Napísanie matematického výrazu')
                                ({{'Napísanie matematického výrazu'}})
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
