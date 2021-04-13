<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Otestujeme saaaa</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>
    <section id="welcome_section" class="container-fluid">
        <div class="row m-0 p-0">
                @if (Route::has('login'))
                    <div class="">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
        </div>
        
        <hr>

        <div class="row m-0 p-0  align-items-start">
            <div id="welcome_join_col" class="col-md-12 col-lg-6 m-0 w-100 justify-content-center align-self-center">
                <div id="welcome_join">
                    <h1 class="display-3">Pripojte sa k testu</h1><br>
                    <!-- <span class="display-4">Veľmi jednoducho</span><br> -->

                    <!-- <input type="text"> -->
                    <div id="welcome_join_form" class="input-group mb-3">
                        <input id="welcome_join_input" type="text" class="form-control form-control-lg rounded-left" placeholder="ID testu" aria-label="ID testu" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button id="welcome_join_button" class="btn" type="button">Pripoj</button>
                        </div>
                    </div>
                </div>
            </div>

            <img class="col-md-12 col-lg-6 w-100 align-self-center" id="exam_img" src="{{ asset('img/exam.png') }}">
        </div>
   </section>

   <!-- <a href='https://www.freepik.com/vectors/banner'>Banner vector created by upklyak - www.freepik.com</a> -->
           
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
</body>
</html>
