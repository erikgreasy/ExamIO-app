<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>



        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Mitr|Roboto+Slab|Source+Sans+Pro&display=swap" rel="stylesheet">

    </head>
<body>

    <div class="bg-custom-blue_dark relative overflow-hidden">
        <div class="inset-0 bg-black opacity-25 absolute"></div>

       @include('layouts.navigation')

        <div class="container mx-auto px-6 md:px-12 relative z-10 flex justify-center  flex-wrap items-center py-24 xl:py-40">
            <div class="lg:w-3/5 xl:w-2/5 flex flex-col items-start relative z-10">
                <span class="font-mitr uppercase text-indigo-500">- - -</span>

                <h1 class="font-roboto-slab text-4xl sm:text-6xl text-white leading-tight mt-4">Pripojte sa <br> k vašemu testu</h1>

                <div class="max-w-md">
                    <p class="font-source-sans-pro text-indigo-500 mt-6 text-lg">Stačí zadať kód, ktorý vám poslal váš učiteľ. Je to jednoduché!</p>
                </div>

                <form class="xl:mt-4 mt-8 flex" action="{{ route('attendances.create') }}" method="GET">
                    <input name="exam_code" class="p-4 border-t mr-0 border-b border-l text-gray-800 border-gray-200 bg-white" placeholder="#A72BB"/>
                    <button class="px-8 rounded-r-full bg-custom-pink  hover:bg-pink-700 text-white font-bold p-4 uppercase border-t border-b border-r">Pripojte ma</button>
                </form>
            </div>

            <div class="flex">
                <img class="object-fill h-80" id="exam_img" src="{{ asset('img/exam.png') }}">
            </div>
        </div>

            <svg class="absolute left-0 bottom-0 w-full h-full" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="30 0 662.41 385.07" preserveAspectRatio="xMinYMax slice"><defs/><defs><radialGradient id="a" cx="368.69" cy="333.92" r="259.84" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#d37575"/><stop offset=".99" stop-color="#58448b" stop-opacity="0"/></radialGradient><radialGradient id="c" cx="2758.74" cy="334.46" r="259.84" gradientTransform="matrix(-1 0 0 1 3280.52 0)" xlink:href="#a"/><clipPath id="b"><path fill="none" d="M0 0h662.41v385.07H0z"/></clipPath></defs><g clip-path="url(#b)" style="clip-path:url(#clip-path)"><g opacity=".2"><path fill="#58448b" d="M361.11 385.53a16.81 16.81 0 00-23.11-4.32v-.59a38.54 38.54 0 00-58.5-33 26.74 26.74 0 00-45.43-12.15A16.77 16.77 0 00223 331a37.75 37.75 0 00-56.86-44.81 26.64 26.64 0 00-13.06-9.39 38.89 38.89 0 00-28.59-65.28 40.12 40.12 0 00-5.63.4 40 40 0 00-69.66-35.4A26.71 26.71 0 0015.34 169c0-.49.05-1 .05-1.45A45.51 45.51 0 00-30.13 122a45.35 45.35 0 00-20.78 5 26.93 26.93 0 002.06-10.3A26.79 26.79 0 00-75.63 90a26.37 26.37 0 00-13.09 3.43v301.82h449.83z"/><path fill="#48376d" d="M222.53 395.25h-45.64a22.82 22.82 0 1145.64 0zM323 395.25h-66.4a15.71 15.71 0 1128.31-9.73 22.8 22.8 0 0138.09 9.73zM134.15 360.36a27.23 27.23 0 00-12.43 3 18.08 18.08 0 00-31.4-17.06A18.75 18.75 0 0061 331.06a30.41 30.41 0 00.5-5.35A29 29 0 007.49 311a5.85 5.85 0 000-.6A18.77 18.77 0 00-10 291.66 22.83 22.83 0 005.65 270a22.83 22.83 0 00-22.83-22.82 22.72 22.72 0 00-10 2.34 31.25 31.25 0 002.27-11.63 31.25 31.25 0 00-31.25-31.25 31.15 31.15 0 00-16.66 4.84 18.09 18.09 0 00-11.24-6.71 22.75 22.75 0 006.86-16.29 22.78 22.78 0 00-11.5-19.8v226.57h249a26.5 26.5 0 001.1-7.65 27.24 27.24 0 00-27.25-27.24z"/><path fill="#3e3063" d="M80.62 395.25H23.39a29.79 29.79 0 0157.23 0zM7.43 381.31a39.28 39.28 0 01-2.54 13.94h-93.61V271.32a43 43 0 0134 42.07 42.63 42.63 0 01-2.59 14.74h.08a16.78 16.78 0 0116.63 14.69 39.72 39.72 0 018.58-.94 39.44 39.44 0 0139.45 39.43z"/><circle cx="101.05" cy="240.18" r="12.28" fill="#48376d" transform="rotate(-45 101.048 240.185)"/><circle cx="86.62" cy="303.13" r="8.6" fill="#48376d"/><path fill="#48376d" d="M136.23 339a5.75 5.75 0 115.75 5.75 5.75 5.75 0 01-5.75-5.75zM239 373.74a5.74 5.74 0 115.74 5.75 5.74 5.74 0 01-5.74-5.75zM6.61 287.71a5.75 5.75 0 115.74 5.75 5.74 5.74 0 01-5.74-5.75zM124.5 248.67a5.87 5.87 0 115.87 5.87 5.87 5.87 0 01-5.87-5.87z"/><path fill="#58448b" d="M241.25 311a5.55 5.55 0 115.55 5.55 5.55 5.55 0 01-5.55-5.55z"/><circle cx="181.19" cy="251.6" r="9.63" fill="#58448b" transform="rotate(-25.44 181.23 251.633)"/><path fill="#3e3063" d="M19.23 365.39a4.85 4.85 0 114.85 4.85 4.85 4.85 0 01-4.85-4.85z"/><circle cx="95.21" cy="370.24" r="9.53" fill="#3e3063" transform="rotate(-76.66 95.223 370.242)"/><path fill="#ad6475" d="M272.13 353.47a38.5 38.5 0 017.41-5.85 26.68 26.68 0 00-33.08-19.53 26.74 26.74 0 0125.67 25.38zM217.33 316.32a37.6 37.6 0 01-4.54 18 16.72 16.72 0 019.94-3.27h.27a37.75 37.75 0 00-35-51.75h-.81a37.76 37.76 0 0130.14 37.02zM206.78 342.49a37.63 37.63 0 01-26.39 11.56 37.85 37.85 0 0025.67-3.86 16 16 0 01-.18-2.31 16.61 16.61 0 01.9-5.39z"/><path fill="#ad6475" d="M223 331h-.29a16.72 16.72 0 00-9.94 3.27 37.9 37.9 0 01-6 8.19 16.61 16.61 0 00-.9 5.39 16 16 0 00.18 2.31A37.88 37.88 0 00223 331zM138.3 276.3a26.39 26.39 0 016.45-.82 26.8 26.8 0 018.35 1.34 38.89 38.89 0 00-9.24-60.11 38.91 38.91 0 01-5.56 59.59zM105.79 205.87v.88a38.75 38.75 0 0110.56-1.46c1.23 0 2.45.06 3.65.17.11-1.16.17-2.34.17-3.53A40 40 0 0062.52 166c1.08-.09 2.16-.14 3.26-.14a40 40 0 0140.01 40.01z"/><path fill="#ad6475" d="M105.77 206.75a40 40 0 01-1.65 10.56 38.73 38.73 0 0114.76-5.31 39.62 39.62 0 001.1-6.49c-1.2-.11-2.42-.17-3.65-.17a38.75 38.75 0 00-10.56 1.41z"/><path fill="url(#a)" d="M361.11 385.53a16.81 16.81 0 00-23.11-4.32v-.59a38.54 38.54 0 00-58.5-33 26.74 26.74 0 00-45.43-12.15A16.77 16.77 0 00223 331a37.75 37.75 0 00-56.86-44.81 26.64 26.64 0 00-13.06-9.39 38.89 38.89 0 00-28.59-65.28 40.12 40.12 0 00-5.63.4 40 40 0 00-69.66-35.4A26.71 26.71 0 0015.34 169c0-.49.05-1 .05-1.45A45.51 45.51 0 00-30.13 122a45.35 45.35 0 00-20.78 5 26.93 26.93 0 002.06-10.3A26.79 26.79 0 00-75.63 90a26.37 26.37 0 00-13.09 3.43v301.82h449.83z" style="mix-blend-mode:lighten"/></g><g opacity=".2"><path fill="#58448b" d="M529.35 386.08a16.8 16.8 0 0123.07-4.33v-.59a38.55 38.55 0 0158.51-33A26.74 26.74 0 01656.34 336a16.77 16.77 0 0111.1-4.45 37.76 37.76 0 0156.86-44.81 26.7 26.7 0 0113.06-9.39 38.9 38.9 0 0134.22-64.87 40 40 0 0169.66-35.41 26.71 26.71 0 0133.88-7.58v-1.45a45.52 45.52 0 0166.3-40.48 26.78 26.78 0 0124.67-37.06 26.37 26.37 0 0113.09 3.43v301.86H529.35z"/><path fill="#48376d" d="M567.43 395.79h66.4a15.7 15.7 0 10-28.31-9.73 22.8 22.8 0 00-38.09 9.73zM651.46 374.29a5.74 5.74 0 10-5.74 5.74 5.74 5.74 0 005.74-5.74z"/><circle cx="643.66" cy="311.51" r="5.55" fill="#58448b"/><path fill="#ad6475" d="M618.33 354a38.58 38.58 0 00-7.41-5.85 26.76 26.76 0 0126-20.5 27.05 27.05 0 017.07 1A26.75 26.75 0 00618.33 354z"/><path fill="url(#c)" d="M529.35 386.08a16.8 16.8 0 0123.07-4.33v-.59a38.55 38.55 0 0158.51-33A26.74 26.74 0 01656.34 336a16.77 16.77 0 0111.1-4.45 37.76 37.76 0 0156.86-44.81 26.7 26.7 0 0113.06-9.39 38.9 38.9 0 0134.22-64.87 40 40 0 0169.66-35.41 26.71 26.71 0 0133.88-7.58v-1.45a45.52 45.52 0 0166.3-40.48 26.78 26.78 0 0124.67-37.06 26.37 26.37 0 0113.09 3.43v301.86H529.35z" style="mix-blend-mode:lighten"/></g></g></svg>
        </div>
    </div>


<!-- steps to ...-->
    <section class="max-w-7xl container mx-auto px-6 pt-8 sm:pt-16 pb-20">

        <h1 class="font-roboto-slab font-bold text-3xl sm:text-4xl leading-tight text-custom-blue_dark my-4 text-center uppercase">Pre skúšajúcich</h1>

        <div class="flex flex-col sm:flex-row w-full mb-16 sm:mb-32">
            <div class="relative sm:w-1/3">
                <span class="text-6xl font-black text-gray-200 absolute top-0 left-0">1</span>
                <div class="mt-8 ml-6 relative z-10 flex flex-col">
                    <h4 class="font-bold text-gray-400 uppercase font-xs leading-none">Začíname</h4>
                    <p class="text-3xl text-gray-800 leading-none mt-2">Vytvorte nový test.</p>
                    <!-- <a href="#" class="text-blue-500 mt-2">Zobraziť viac</a> -->
                </div>
            </div>
            <div class="relative sm:w-1/3">
                <span class="text-6xl font-black text-gray-200 absolute top-0 left-0">2</span>
                <div class="mt-8 ml-6 relative z-10 flex flex-col">
                    <h4 class="font-bold text-gray-400 uppercase font-xs leading-none">Začíname</h4>
                    <p class="text-3xl text-gray-800 leading-none mt-2">Zadefinujte otázky.</p>
                    <!-- <a href="#" class="text-blue-500 mt-2">Zobraziť viac</a> -->
                </div>
            </div>
            <div class="relative sm:w-1/3">
                <span class="text-6xl font-black text-gray-200 absolute top-0 left-0">3</span>
                <div class="mt-8 ml-6 relative z-10 flex flex-col">
                    <h4 class="font-bold text-gray-400 uppercase font-xs leading-none">Začíname</h4>
                    <p class="text-3xl text-gray-800 leading-none mt-2">Odošlite žiakom kód testu.</p>
                    <!-- <a href="#" class="text-blue-500 mt-2">Zobraziť viac</a> -->
                </div>
            </div>
        </div>
        <div class="sm:px-12 flex flex-col sm:flex-row">
            <div class="sm:w-1/2 sm:pr-16">
                <img src="{{ asset('img/exam_time.jpg') }}" class="rounded-lg">
            </div>
            <div class="sm:w-1/2 pt-4">
                <h3 class="text-2xl text-gray-800 mb-4">
                    5 typov otázok, možnosť automatickej opravy.
                </h3>
                <p class="text-gray-600 leading-relaxed text-lg mb-4">
                    Pre každý test je možné zadefinovať niekoľko typov otázok, niektoré s možnosťou automatickej opravy.
                    Vytvorte otázky s možnosťami, spájanie správnych odpovedí, písanie vzorcov a ďalšie.
                </p>
                <button class="mx-auto bg-custom-blue hover:bg-custom-kako text-white rounded py-2 px-8 shadow-lg">
                    Zobraziť viac..
                </button>
            </div>
        </div>
    </section><hr class="max-w-7xl mx-auto">


<!-- Stay updated -->
    <section class="py-10 px-6">
        <div class="max-w-7xl px-6 py-16 mx-auto">
            <h1 class="font-roboto-slab font-bold text-3xl sm:text-4xl leading-tight text-custom-blue_dark my-4 text-center uppercase">
            až 5 typov otázok</h1>

            <div class="grid gap-8 mt-10 md:grid-cols-3 lg:grid-cols-5">
                <div class="px-6 py-8 overflow-hidden bg-white rounded-md shadow-md">
                    <h2 class="text-xl font-medium text-gray-800">Textová odpoveď</h2>
                    <p class="max-w-md mt-4 text-gray-400">Klasická textová odpoveď na otázku, s možnosťou automatickej opravy.</p>
                </div>

                <div class="px-6 py-8 overflow-hidden bg-white rounded-md shadow-md">
                    <h2 class="text-xl font-medium text-gray-800">Výber z možností</h2>
                    <p class="max-w-md mt-4 text-gray-400">Žiakovi sú zobrazené dopredu zadefinované možnosti a musí vybrať tú správnu.</p>
                </div>

                <div class="px-6 py-8 overflow-hidden bg-white rounded-md shadow-md">
                    <h2 class="text-xl font-medium text-gray-800">Spájanie možností</h2>
                    <p class="max-w-md mt-4 text-gray-400">Úloha žiaka je pospájať objekty, rozdelené do dvoch skupín.</p>
                </div>
                <div class="px-6 py-8 overflow-hidden bg-white rounded-md shadow-md">
                    <h2 class="text-xl font-medium text-gray-800">Odpoveď obrázkom</h2>
                    <p class="max-w-md mt-4 text-gray-400">Ako odpoveď je možné nahrať obrázok, či už priamo alebo pomocou QR kódu.</p>
                </div>
                <div class="px-6 py-8 overflow-hidden bg-white rounded-md shadow-md">
                    <h2 class="text-xl font-medium text-gray-800">Odpoveď vzorcom</h2>
                    <p class="max-w-md mt-4 text-gray-400">Odpoveď je nutné zapísať v matematickom tvare pomocou nástroja na vzorce. </p>
                </div>
            </div>
        </div>
    </section><hr class="max-w-7xl mx-auto">


<!-- Its for free! -->
    <section class="bg-white py-10 px-6">
        <div class="max-w-7xl py-10 mx-auto">
            <div class="py-12 bg-gray-800 rounded-md md:px-20 md:flex md:items-center md:justify-between">
                <div>
                    <h3 class="text-2xl font-semibold text-white">Naše služby sú úplne zadarmo!</h3>
                    <p class="max-w-md mt-4 text-gray-400">Poskytnuté služby pre pomoc pri vzdelávaní a hodnotení študentov
                    sú úplne zdarma, no môžte nás podporiť a tým urýchliť vývoj.</p>
                </div>

                <a class="block px-8 py-2 mt-6 text-lg font-medium text-center text-white transition-colors duration-300 transform bg-custom-blue rounded md:mt-0 hover:bg-custom-kako" href="#">Podporiť</a>
            </div>
        </div>
    </section><hr class="max-w-7xl mx-auto">


<!-- Made by :)) -->
    <section class="bg-gray-100 py-10 px-6">
        <div class="max-w-7xl px-6 py-16 mx-auto text-center">
            <h2 class="text-3xl font-semibold text-gray-800">Náš tím</h2>
            <p class="max-w-lg mx-auto mt-4 text-gray-600">Tento projekt Vám prináša partia mladých ľudí, ktorí milujú fancy znejúce skratky,
            no ešte viac technológie a preto tvorbu tejto webovej aplikácie prijali ako skvelú výzvu vstúpiť do neznámych vôd Laravelu a Dockeru.
            </p>

            <div class="grid gap-8 mt-6 md:grid-cols-2 lg:grid-cols-5">
                <div>
                    <img class="object-cover object-center w-full h-64 rounded-md shadow" src="{{ asset('img/lukas.jpg') }}">
                    <h3 class="mt-2 font-medium text-gray-700">Lukáš Krivosudský</h3>
                    <p class="text-sm text-gray-600">Chief Executive Officer (CEO)</p>
                </div>

                <div>
                    <img class="object-cover object-center w-full h-64 rounded-md shadow" src="{{ asset('img/roman.jpg') }}">
                    <h3 class="mt-2 font-medium text-gray-700">Roman Bútora</h3>
                    <p class="text-sm text-gray-600">Chief Operating Officer (COO)</p>
                </div>

                <div>
                    <img class="object-cover object-center w-full h-64 rounded-md shadow" src="{{ asset('img/marek.jpg') }}">
                    <h3 class="mt-2 font-medium text-gray-700">Marek Lunter</h3>
                    <p class="text-sm text-gray-600">Chief IT Security Officer (CISO)</p>
                </div>

                <div>
                    <img class="object-cover object-center w-full h-64 rounded-md shadow" src="{{ asset('img/erik.jpg') }}">
                    <h3 class="mt-2 font-medium text-gray-700">Erik Masný</h3>
                    <p class="text-sm text-gray-600">Chief Technology Officer (CTO)</p>
                </div>

                <div>
                    <img class="object-cover object-center w-full h-64 rounded-md shadow" src="{{ asset('img/rasto.jpg') }}">
                    <h3 class="mt-2 font-medium text-gray-700">Rastislav Kopál</h3>
                    <p class="text-sm text-gray-600">Chief Information Officer (CIO)</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-gray-800 pt-16">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="flex flex-col sm:flex-row items-center justify-end">
                <div class="sm:w-2/3">
                    <h4 class="text-2xl text-white leading-tight text-center sm:text-left">Webová aplikácia www.Exam.io <br class="hidden sm:block"> Projekt pre predmet <span class="font-bold underline">Webové technológie 2</span></h4>
                </div>
                <div class="sm:w-1/3 mt-12 sm:mt-0 flex justify-end">
                    <button class="bg-custom-blue hover:bg-custom-blue_dark text-white rounded py-3 px-8 shadow-lg font-medium text-lg">Kontaktujte nás</button>
                </div>
            </div>
            <div class="flex justify-center sm:justify-end border-t border-gray-700 py-10 mt-16">
                <a href="#" class="text-white mx-2">Domov</a>
                <a href="#" class="text-white mx-2">Prihlásenie</a>
                <a href="#" class="text-white mx-2">Registrácia</a>
                <a href="#" class="text-white mx-2">Moje testy</a>
                <a href="#" class="text-white mx-2">Rozdelenie úloh </a>
                <a href="#" class="text-white mx-2">Zdroje</a>
            </div>
        </div>
    </footer>

{{--    <a href="https://www.vecteezy.com/free-vector/toggle">Toggle Vectors by Vecteezy</a>--}}
    <!-- <a href='https://www.freepik.com/vectors/banner'>Banner vector created by upklyak - www.freepik.com</a> -->
    <!-- <a href='https://www.freepik.com/vectors/education'>Education vector created by stories - www.freepik.com</a> -->
    <script src="https://premium-tailwindcomponents.netlify.app/assets/build/js/main.js?id=8c11b7cf78ebea1b5aed"></script>
</body>
</html>
