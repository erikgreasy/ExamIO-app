@extends('layouts.app')

@section('content')

<section class="py-10 px-6">
    <div class="max-w-7xl h-full px-6 py-16 mx-auto bg-gray-100 mt-10">
        <h1 class="font-roboto-slab font-bold text-3xl sm:text-4xl leading-tight mt-3 text-center uppercase"> Účasť na teste: </h1><br>
{{--        <h3 class="font-roboto-slab font-bold text-lg leading-tight my-2 text-center uppercase">Kód testu: <span class="text-custom-pink underline text-3xl sm:text-4xl">{{ $exam->exam_code }}</span> </h3><br>--}}

    <ul>
        <?php $pos = 1; ?>
        @foreach($exam->attendances as $attendance)
            <li class="my-2">
                <div class="grid grid-cols-6 gap-4">
                    <div class="col-span-5">
                        <span class="text-2xl font-semibold">{{ $pos }}.</span>
                        <a href="{{ route('exams.attendances.show', [$exam, $attendance]) }}">
                            <span class="text-lg font-bold">{{ $attendance->first_name }} {{ $attendance->last_name }}</span>, id: #{{ $attendance->ais_id }}
                        </a>
                    </div>
                    <div>
                        @if ($attendance->active)
                            <span class="text-green-500 font-bold w-full">
                                Aktívny
                            </span>
                        @else
                            <span class="text-red-500 font-bold w-full">
                                Neaktívny
                            </span>
                        @endif

                    </div>
                </div>
            </li>
            <hr>
            <?php $pos++; ?>
        @endforeach

    </ul>
    </div>
</section>

@endsection
