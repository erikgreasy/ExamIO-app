@extends('layouts.app')

@section('content')
<section class="py-10 px-6">
    <div class="max-w-7xl h-full px-6 py-16 mx-auto bg-gray-100 mt-10">
        <h1 class="font-roboto-slab font-bold text-3xl sm:text-4xl leading-tight mt-2 text-center uppercase"> Otázky a odpovede</h1><br>
            
            <div class="flex flex-col ">
                
                <div class="text-xl font-semibold mb-3 ">Meno: {{$attendance->first_name . " " . $attendance->last_name}} <br>AIS : {{$attendance->ais_id}}</div>
                
                <?php $pos = 1; $points = 0; $fullPoints = 0;?>
                <hr>
                @foreach($answers as $answer)
                    <div>
                        <span class="text-2xl font-semibold">{{ $pos . ". " . $answer->questionType->text }}</span>
                            @switch($answer->questionType->type_id)
                                    @case(1)
                                        (Zadajte slovnú odpoveď)
                                        <div class="text-lg ml-5 w-1/2">{{$answer->text}}</div>
                                            <div class="text-right -mt-7 p-0 m-0">
                                                @if ($answer->is_correct)
                                                    <div class="text-black">
                                                        <p class=" text-green-500 font-semibold">Správna odpoveď</p>
                                                        <a href="{{ route('correction', [$answer]) }}">Zmeniť hodnotenie.</a>
                                                    </div>
                                                    <?php $points++; $fullPoints++; ?>
                                                @else
                                                    <div class="text-black">
                                                        <p class=" text-red-500 font-semibold">Nesprávna odpoveď</p>
                                                        <a href="{{ route('correction', [$answer]) }}">Zmeniť hodnotenie.</a>
                                                    </div>
                                                    <?php $fullPoints++; ?>
                                                @endif
                                            </div>
                                        
                                    @break

                                    @case(2)
                                        (Vyberte možnosť)
                                        <div class="text-lg ml-5 w-1/3">{{$answer->selectOption->text}}</div>
                                            <div class="text-right -mt-7 p-0 m-0">
                                                @if ($answer->is_correct)
                                                    <div class="text-black">
                                                        <p class=" text-green-500 font-semibold">Správna odpoveď</p>
                                                        <a href="{{ route('correction', [$answer]) }}">Zmeniť hodnotenie.</a>
                                                    </div>
                                                    <?php $points++; $fullPoints++; ?>
                                                @else
                                                    <div class="text-black">
                                                        <p class=" text-red-500 font-semibold">Nesprávna odpoveď</p>
                                                        <a href="{{ route('correction', [$answer]) }}">Zmeniť hodnotenie.</a>
                                                        <?php $fullPoints++; ?>
                                                    </div>
                                                @endif
                                            </div>
                                        
                                    @break
                                    
                                    @default

                                @endswitch
                                <hr>
                    </div>
                    <?php $pos++; ?>
                @endforeach

                <div class="text-2xl font-semibold">Počet bodov: <?php echo $points."/".$fullPoints; ?></div>

            </div>
    </div>
</section>

@endsection
