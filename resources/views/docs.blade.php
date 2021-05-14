@extends('layouts.app')

@section('content')


<section class="py-10 px-6 h-full">
    <div class="max-w-7xl h-full px-6 py-16 mx-auto bg-gray-100 mt-10">
        <h1 class="font-roboto-slab font-bold text-3xl sm:text-4xl leading-tight my-4 text-center uppercase">Technická dokumentácia</h1>
        <div class="flex flex-col">
            <div class="my-2 mx-2">
                <h2 class="font-roboto-slab font-bold text-xl sm:text-xl leading-tight my-4 ">Použité technológie na strane servera:</h2>
                <ul class="list-disc mx-5">
                    <li><b>Docker</b>, <b>Docker-compose</b> postavený na <b>Sail</b> (PHP 8 servis, phpMyAdmin a MySQL servis)</li>
                    <li><b>Laravel 8.x</b>, MVC architektúra a views generované pomocou Blade</li>
                    <li><b>pusher/pusher-php-server</b> - napojenie na Pusher server pomocou ktoreho funguju websockety</li>
                    <li>Pre odovzdanie testu po uplynutí času je použitý Pusher</li>
                    <li>Informácia pre učiteľa, keď žiak opustí test, tiež pomocou websocket Pusher</li>
                    <li><b>Auth & Auth</b> je použitá built-in riešenie Laravel Breeze</li>
                    <li><b>Policies</b> Jediným typom registrovaného používateľa v našej aplikácii je učiteľ. Pre každého používateľa je potrebné vytvoriť policy – súbor pravidiel, ktoré slúžia na definovanie jeho role. V našom prípade nechcem dovoliť učiteľom, aby mohli upravovať testy iných učiteľov a ani meniť ich otázky. Pre vytvorenie takýchto pravidiel sme sa rozhodli použiť Laravel policies,  ktoré aplikujeme priamo na modely a ich kontrolery.</li>
                </ul>
                <h2 class="font-roboto-slab font-bold text-xl sm:text-xl leading-tight my-4 ">Použité technológie na strane klienta:</h2>
                <ul class="list-disc mx-5">
                    <li><b><a href="https://github.com/barryvdh/laravel-dompdf">DomPdf</a></b> - Knižnica pomocou ktorej môžeme jednoducho na základe HTML štruktúry vygenerovať PDF dokument</li>
                    <li><b><a href="#">Mathlive</a></b> - Pre odpovede na matematické otázky v teste sme sa rozhodli použiť knižnicu Mathlive. Mathlive je JavaScript knižnica používaná na grafickú interpretáciu matematických výrazov na webe. Jej použitie je jednoduché a dokážeme ňou zapísať väčšinu matematických funkcií. Obsahuje rôzne fonty a používa Latex interpretáciu výrazov. </li>
                    <li><b><a href="#">Sketchpad</a></b> - Aby sme umožnili žiakom odpovedať na otázky, ktoré vyžadujú nakreslenie obrázka, sme sa rozhodli použiť v našom projekte knižnicu Sketchpad.  Sketchpad je JavaScript knižnica ktorá slúži ako „web skicár“. Využíva HTML element <b>canvas</b>, do ktorého  môže užívateľ kresliť. Nakreslený obrázok je možné následne pomocou canvas metódy toDataUrl() prekonvertovať na dátovú URI obsahujúcu reprezentáciu obrázka v stanovenom formáte (defaultne .png). </li>
                    <li><b><a href="#">Jquery-Ui</a></b> - Ďalším typom otázok, ktoré radi učitelia v testoch dávajú, sú tzv. otázky s párovacími odpoveďami. Aby mohli žiaci jednoducho a prehľadne odpovedať na takýto typ otázok, rozhodli sme sa pre použitie JS knižnice Jquery-Ui. Tá umožňuje funkciu drag&drop, pomocou ktorej žiaci môžu jednoducho myškou spojiť správne dvojice súvisiacich výrazov.  </li>
                    <li><b>Laravel echo</b> - JS knižnca pre jednoduchšiu prácu s Pusher websocketmi</li>
                    {{--                    <li><b><a href="#"></a></b> </li>--}}
                </ul>
            </div>
            <span class="mt-8 mb-3">
                V dnešnej dobe existuje mnoho rôznych nástrojov na rozdelenie úloh v tíme. Našou obľúbenou voľbou je Trello, ktoré umožňuje zvolenej skupine ľudí (môže byť aj verejné) vytvárať a priraďovať  úlohy jednotlivým členom tímu.
            </span>
            <button
                type="button"
                class="border max-w-xs border-green-500 bg-green-500 text-white rounded-md px-5 py-2 my-7 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline"
            >
                <a target="_blank" href="https://trello.com/b/UCnpV0WL/webtech2final">Rozdelenie uloh</a>
            </button>
        </div>
    </div>
</section>


@endsection
