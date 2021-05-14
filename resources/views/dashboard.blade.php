@extends('layouts.app')

@section('content')


<div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="font-roboto-slab font-bold text-2xl sm:text-3xl leading-tight text-center px-5 py-5">
                Administrácia
            </div>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 min-h-screen">

    <div class="grid grid-cols-7 gap-4">
        <div class="col-span-4">
            <h1 class="font-roboto-slab font-bold text-2xl sm:text-3xl leading-tight text-white uppercase pb-5">Moje testy: </h1>
        </div>
        <div class="col-span-3 flex justify-end">
            <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 my-2 mx-2 rounded" href="{{ route('exams.create') }}">Vytvoriť nový test</a>
            <a class="bg-yellow-400 hover:bg-yellow-200 text-white font-bold py-2 px-4 my-2 mx-2 rounded" href="{{ route('exams.watch') }}" target="_blank">Sledovať testy</a>
        </div>
    </div>

    <div class="flex flex-col bg-gray-100  p-5">
        @foreach ($exams as $exam)
            <div class="m-5 flex flex-col">
                <div class="grid grid-cols-6 gap-4">
                    <div class="col-span-5">
                        <span class="font-roboto-slab font-bold text-2xl sm:text-2xl leading-tight pb-5">
                            {{ $exam->title }}  - <span class="text-red-500 underline">{{ $exam->exam_code }}</span>
                        </span>
                    </div>
                    <div class="w-full">
                        <form action="{{ route('exams.update', $exam) }}" method="POST">
                            @method('PUT')
                            @csrf
                                @if ($exam->active)
                                <button
                                    type="submit"
                                    class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline"
                                >
                                    Deaktivovať
                                </button>
                                @else
                                <button
                                    type="submit"
                                    class="border border-green-500 bg-green-500 text-white rounded-md px-5 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline"
                                >
                                    Aktivovať
                                </button>
                                @endif
                        </form>

                    </div>

                </div>
                <div class="my-1"><b>Popis testu: </b> {{ $exam->description }}</div>
                <div class="my-1"><b>Časový limit:</b> {{ $exam->time_limit }} minút</div>
                <div class="mt-5">
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 my-2 px-4 py-2 rounded" href="{{ route('exams.attendances.index', $exam) }}">Zobraziť vypracovania</a>
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 my-2 px-4 py-2 rounded" href="{{ route('exams.edit', $exam) }}">Upraviť</a>
                    <a class="bg-yellow-300 hover:bg-yellow-400 text-white font-bold py-1 my-2 px-4 py-2 rounded" href="{{ route('exportCsv', $exam) }}">Export do csv</a>
                </div>
            </div>
            <hr>
        @endforeach
    </div>


</div>

@endsection
