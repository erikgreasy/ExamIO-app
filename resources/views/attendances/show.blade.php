@extends('layouts.app')

@section('content')
<section class="py-10 px-6">
    <div class="max-w-7xl h-full px-6 py-16 mx-auto bg-gray-100 mt-10">
        <h1 class="font-roboto-slab font-bold text-3xl sm:text-4xl leading-tight mt-2 text-center uppercase"> Otázky a odpovede</h1><br>
            
            <div class="flex flex-col ">
                
                <div class="text-xl font-semibold mb-3 ">Meno: {{$attendance->first_name . " " . $attendance->last_name}} <br>AIS : {{$attendance->ais_id}}</div>
                
                <?php $pos = 1; $points = 0; $fullPoints = 0; $index = 0;?>
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
                                                    <div class="text-green-500 font-semibold">
                                                        Správna odpoveď
                                                    </div>
                                                    <?php $fullPoints++; ?>
                                                @else
                                                    <div class="text-red-500 font-semibold">
                                                        Nesprávna odpoveď
                                                    </div>
                                                    <?php $fullPoints++; ?>
                                                @endif
                                                <a href="{{ route('correction', [$answer,$attendance]) }}">Zmeniť hodnotenie.</a>
                                                
                                            </div>
                                        
                                    @break

                                    @case(2)
                                        (Vyberte možnosť)
                                        <div class="text-lg ml-5 w-1/3">{{$answer->selectOption->text}}</div>
                                            <div class="text-right -mt-7 p-0 m-0">
                                                @if ($answer->is_correct)
                                                    <div class="text-green-500 font-semibold">
                                                       Správna odpoveď
                                                    </div>
                                                    <?php  $fullPoints++; ?>
                                                @else
                                                    <div class="text-red-500 font-semibold">
                                                        Nesprávna odpoveď
                                                        <?php $fullPoints++; ?>
                                                    </div>
                                                @endif
                                                <a href="{{ route('correction', [$answer,$attendance]) }}">Zmeniť hodnotenie.</a>
                                            </div>
                                        
                                    @break

                                    @case(3)
                                        (Párovanie odpovedí)
                                            <?php $pair = 1;?>
                                            @foreach($pairAnswer[$index] as $pAnswer)
                                                @if ($pAnswer->is_correct)
                                                <div class="text-lg ml-5 w-1/2 text-green-500">{{$pAnswer->leftPairOption->text . " - " .$pAnswer->rightPairOption->text}} </div>  
                                                @else
                                                <div class="text-lg ml-5 w-1/2 text-red-500">{{$pAnswer->leftPairOption->text . " - " .$pAnswer->rightPairOption->text}} </div>  
                                                @endif
                                            <?php $pair++;?>  
                                            @endforeach
                                            <?php $index++;?>
                                            
                                        
                                            <div class="text-right -mt-7 p-0 m-0">
                                                @if ($answer->is_correct)
                                                    <div class="text-green-500 font-semibold">
                                                        Správna odpoveď
                                                    </div>
                                                    <?php  $fullPoints++; ?>
                                                @else
                                                    <div class="text-red-500 font-semibold">
                                                        Nesprávna odpoveď
                                                        <?php $fullPoints++; ?>
                                                    </div>
                                                @endif
                                                <a href="{{ route('correction', [$answer,$attendance]) }}">Zmeniť hodnotenie.</a>
                                            </div>
                                        
                                    @break

                                    @case(4)
                                        (Nakreslenie obrázku)
                                        <div class="text-lg ml-5 w-1/3"><img src="{{$answer->canvas}}"></div>
                                            <div class="text-right -mt-7 p-0 m-0">
                                                @if ($answer->is_correct)
                                                    <div class="text-green-500 font-semibold">
                                                        Správna odpoveď                                                  
                                                    </div>
                                                    <?php  $fullPoints++; ?>
                                                @else
                                                    <div class=" text-red-500 font-semibold">
                                                        Nesprávna odpoveď                                                 
                                                        <?php $fullPoints++; ?>
                                                    </div>
                                                @endif 
                                                <a href="{{ route('correction', [$answer,$attendance]) }}">Zmeniť hodnotenie.</a>
                                            </div>
                                        
                                    @break

                                    @case(5)
                                        (Napísanie matematického výrazu)
                                        <div class="text-lg ml-5 w-1/3">{{$answer->text}}</div>
                                            <div class="text-right -mt-7 p-0 m-0">
                                                @if ($answer->is_correct)
                                                    <div class="text-black">
                                                        <p class=" text-green-500 font-semibold">Správna odpoveď</p>              
                                                    </div>
                                                    <?php $fullPoints++; ?>
                                                @else
                                                    <div class="text-black">
                                                        <p class=" text-red-500 font-semibold">Nesprávna odpoveď</p>
                                                        <?php $fullPoints++; ?>
                                                    </div>
                                                @endif
                                                <a href="{{ route('correction', [$answer,$attendance]) }}">Zmeniť hodnotenie.</a>
                                            </div>
                                        
                                    @break
                                    
                                    @default

                                @endswitch
                                <hr>
                    </div>
                    <?php $pos++; ?>
                @endforeach

                <div class="text-2xl font-semibold">Počet bodov: {{$attendance->points}}<?php echo "/".$fullPoints; ?></div>

            </div>
    </div>
</section>

@endsection
