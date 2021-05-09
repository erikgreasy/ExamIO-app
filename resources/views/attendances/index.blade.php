@extends('layouts.app')

@section('content')

<div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 min-h-screen">
    <h1 class="font-roboto-slab font-bold text-2xl sm:text-3xl leading-tight text-center text-white uppercase">Vypracovania pre test: {{ $exam->title }}</h1>
    <div class="flex flex-col bg-gray-100  p-5">
        @foreach($exam->attendances as $attendance)
            <li>
                <a href="{{ route('exams.attendances.show', [$exam, $attendance]) }}">
                    {{ $attendance->ais_id }} : {{ $attendance->first_name }} {{ $attendance->last_name }}
                </a>
            </li>
    
        @endforeach
    </div>
</div>

@endsection