@extends('layouts.app')

@section('content')


<section class="py-10 px-6 bg-custom-blue_dark">
    <div class="max-w-7xl h-screen px-6 py-16 mx-auto bg-gray-100 mt-10">
        <h1 class="font-roboto-slab font-bold text-3xl sm:text-4xl leading-tight my-4 text-center uppercase">Nový test</h1>



<!-- Create new exam -->
        <form class="flex flex-col my-5 mx-3" action="{{ route('exams.store') }}" method="post">
            @csrf
            <div class="mb-3 pt-0 my-2">
                <label for="exam_title" class="input-label text-base mb-2">Názov testu</label>
                <input name="exam_title" type="text" placeholder="Názov testu" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-full"/>
                @error('exam_title')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 pt-0 my-2">
                <label for="time_limit" class="input-label text-base mb-2">Čas na vypracovanie</label>
                <input name="time_limit" type="number" placeholder="Časový limit" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-full"/>
                @error('time_limit')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="mb-3 pt-0 my-2">
                <label for="exam_description" class="input-label text-base mb-2">Popis testu (pred spustením)</label>
                <textarea name="exam_description" type="text" rows="5" cols="50" placeholder="Časový limit" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-full"/>
                </textarea>
                @error('exam_description')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <example-component></example-component>

            <button type="submit" class="max-w-xs my-4 bg-custom-blue hover:bg-custom-blue_dark text-white rounded py-3 px-8 shadow-lg font-medium text-lg">Vytvoriť test</button>
        </form>

           
        </div>
</section>


@endsection