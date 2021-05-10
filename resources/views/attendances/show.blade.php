@extends('layouts.app')

@section('content')
<section class="py-10 px-6">
    <div class="max-w-7xl h-full px-6 py-16 mx-auto bg-gray-100 mt-10">
        <h1 class="font-roboto-slab font-bold text-3xl sm:text-4xl leading-tight mt-3 text-center uppercase"> Otázky a odpovede</h1><br>
            <div class="flex flex-col">

                <?php $pos = 1; ?>
                @foreach($answers as $answer)
                    <div>
                        <span class="text-2xl font-semibold">{{ $pos }}.</span>
                    </div>
                <?php $pos++; ?>
                @endforeach

            </div>
    </div>
</section>

@endsection
