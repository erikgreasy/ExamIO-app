@extends('layouts.app')

@section('content')

    <ul>
        @foreach($exam->attendances as $attendance)
            <li class="text-gray-50">
                <a href="{{ route('exams.attendances.show', [$exam, $attendance]) }}">
                    {{ $attendance->ais_id }} : {{ $attendance->first_name }} {{ $attendance->last_name }}
                </a>
            </li>
    
        @endforeach

    </ul>

@endsection