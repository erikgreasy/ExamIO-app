@extends('layouts.app')

@section('content')


<div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                You're logged in!
            </div>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    My exams:
    <div class="flex flex-col bg-gray-100  p-5">
        @foreach ($exams as $exam)
            <div class="m-5 flex flex-col">
                <div class="grid grid-cols-6 gap-4">
                    <div class="col-span-5"><b>Text otazky:</b> {{ $exam->title }}</div>
                    <div class="w-full">
                        <form action="{{ route('exams.update', $exam) }}" method="POST">
                            @method('PUT')
                            @csrf
                                @if ($exam->active)
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold mx-2 py-2 px-4 rounded-full w-full">
                                        Deaktivovať
                                    </button>
                                @else
                                <button type="submit" class="bg-custom-blue hover:bg-custom-blue_dark text-white font-bold mx-2 py-2 px-4 rounded-full w-full">
                                    Aktivovať
                                </button>
                                @endif

                        </form>

                    </div>

                </div>
                <div><b>Typ otazky:</b> {{ $exam->active }}</div>
                <div><b>ID testu:</b> {{ $exam->exam_code }}</div>
                <div>
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 my-2 px-4 rounded" href="{{ route('exams.attendances.index', $exam) }}">Zobrazit vypracovania</a>
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 my-2 px-4 rounded" href="{{ route('exams.edit', $exam) }}">Upravit</a>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
    <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 my-5 px-4 rounded" href="{{ route('exams.create') }}">Vytvorit novy test</a><br>
</div>

@endsection
