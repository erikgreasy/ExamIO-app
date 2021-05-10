@extends('layouts.app')

@section('content')


<div class="py-12 sm:rounded-lg max-w-7xl mx-auto sm:px-6 lg:px-8 min-h-screen">
    <h1 class="font-roboto-slab font-bold text-2xl sm:text-3xl leading-tight text-center text-white uppercase">Zadajte vaše údaje: </h1>
    <div class="flex justify-center">

        <div class="bg-white rounded-lg w-1/2  py-5 px-5 flex flex-col bg-gray-100  p-5">
            @if (count($errors) > 0)
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              
                    
            @endif

            <form action="{{ route('exams.attendances.store', $exam) }}" method="POST">
                @csrf
                <div>
                    <label for="name">Meno:</label>
                    <input value="{{ old('first_name') }}" class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="first_name" id="name">
                </div>
                <div>
                    <label for="surname">Priezvisko:</label>
                    <input value="{{ old('last_name') }}" class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="last_name" id="surname">
                </div>
                <div>
                    <label for="aisId">Ais ID:</label>
                    <input value="{{ old('ais_id') }}" class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="ais_id" id="aisId">
                </div>
        
                <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                <button class="mt-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded block w-full">Začať písať test</button>
            </form>
        </div>
    </div>
</div>

    

@endsection