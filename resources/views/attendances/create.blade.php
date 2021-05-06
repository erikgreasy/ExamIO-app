@extends('layouts.app')

@section('content')


    <form action="{{ route('exams.attendances.store', $exam) }}" method="POST">
        @csrf
        <div>
            <label for="name">Meno:</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="surname">Priezvisko:</label>
            <input type="text" name="surname" id="surname">
        </div>
        <div>
            <label for="aisId">Ais ID:</label>
            <input type="text" name="aisId" id="aisId">
        </div>

        <input type="hidden" name="exam_id" value="{{ $exam->id }}">
        <button>Začať písať test</button>
    </form>

@endsection