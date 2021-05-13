<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<style>
    body {
        font-family: DejaVu Sans;
    }
</style>

<body>
    <div>
        <h1> Otázky a odpovede</h1><br>

        <div>
            <div>Meno: {{ $attendance->first_name . ' ' . $attendance->last_name }}
                <br>AIS : {{ $attendance->ais_id }}
            </div>

            <?php
            $pos = 1;
            $points = 0;
            $fullPoints = 0;
            $index = 0;
            ?>
            <hr>
            @foreach ($answers as $answer)
                <div>
                    <span>{{ $pos . '. ' . $answer->questionType->text }}</span>
                    @switch($answer->questionType->type_id)
                        @case(1)
                            (Zadajte slovnú odpoveď)
                            <div>Odpoveď študenta: {{ $answer->text }}</div>
                            <div>
                                @if ($answer->is_correct)
                                    <div>
                                        <p>Vyhodnotenie: Správna odpoveď</p>
                                    </div>
                                    <?php
                                    $points++;
                                    $fullPoints++;
                                    ?>
                                @else
                                    <div>
                                        <p>Vyhodnotenie: Nesprávna odpoveď</p>
                                    </div>
                                    <?php $fullPoints++; ?>
                                @endif
                            </div>

                        @break

                        @case(2)
                            (Vyberte možnosť)
                            <div>Odpoveď študenta: {{ $answer->selectOption->text }}</div>
                            <div>
                                @if ($answer->is_correct)
                                    <div>
                                        <p>Vyhodnotenie: Správna odpoveď</p>
                                    </div>
                                    <?php
                                    $points++;
                                    $fullPoints++;
                                    ?>
                                @else
                                    <div>
                                        <p>Vyhodnotenie: Nesprávna odpoveď</p>
                                        <?php $fullPoints++; ?>
                                    </div>
                                @endif
                            </div>

                        @break

                        @case(3)
                            (Párovanie odpovedí)
                            Odpoveď študenta: 
                            @foreach ($pairAnswer[$index] as $pAnswer)
                                <div>
                                    {{ $pAnswer->leftPairOption->text . ' => ' . $pAnswer->rightPairOption->text }}
                                </div>
                            @endforeach
                            <?php $index++; ?>


                            <div>
                                @if ($answer->is_correct)
                                    <div>
                                        <p>Vyhodnotenie: Správna odpoveď</p>
                                    </div>
                                    <?php
                                    $points++;
                                    $fullPoints++;
                                    ?>
                                @else
                                    <div>
                                        <p>Vyhodnotenie: Nesprávna odpoveď</p>
                                        <?php $fullPoints++; ?>
                                    </div>
                                @endif
                            </div>

                        @break

                        @case(4)
                            (Nakreslenie obrázku)
                            <div>Odpoveď študenta: <img src="{{ $answer->canvas }}"></div>
                            <div>
                                @if ($answer->is_correct)
                                    <div>
                                        <p>Vyhodnotenie: Správna odpoveď</p>
                                    </div>
                                    <?php
                                    $points++;
                                    $fullPoints++;
                                    ?>
                                @else
                                    <div>
                                        <p>Vyhodnotenie: Nesprávna odpoveď</p>
                                        <?php $fullPoints++; ?>
                                    </div>
                                @endif
                            </div>

                        @break

                        @case(5)
                            (Napísanie matematického výrazu)
                            <div>Odpoveď študenta: {{ $answer->text }}</div>
                            <div>
                                @if ($answer->is_correct)
                                    <div>
                                        <p>Vyhodnotenie: Správna odpoveď</p>
                                    </div>
                                    <?php
                                    $points++;
                                    $fullPoints++;
                                    ?>
                                @else
                                    <div>
                                        <p>Vyhodnotenie: Nesprávna odpoveď</p>
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

            <div>Počet bodov: <?php echo $points . '/' . $fullPoints; ?></div>

        </div>
    </div>
</body>

</html>
