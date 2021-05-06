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
            <div class="m-5">
                <b>Text otazky:</b> {{ $exam->title }}<br>
                <b>Typ otazky:</b> {{ $exam->active }}<br>
                <b>ID testu:</b> {{ $exam->exam_code }}<br>
                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 my-2 px-4 rounded" href="{{ route('exams.attendances.index', $exam) }}">Zobrazit vypracovania</a>
                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 my-2 px-4 rounded" href="{{ route('exams.edit', $exam) }}">Upravit</a><br>
            </div>
            <hr>
        @endforeach
    </div>
    <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 my-5 px-4 rounded" href="{{ route('exams.create') }}">Vytvorit novy test</a><br>
</div>

@endsection
