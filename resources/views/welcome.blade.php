<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Social Networking Site for Travellers">
    <meta name="keywords" content="network site, social media, travel, countries, advice, connect">
    <link rel='icon' href='favicon.ico' type='image/x-icon'>
    <title>Pangaea</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet" type="text/css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" type="text/javascript" defer></script>
    <script src="{{ asset('js/welcome.js') }}" type="text/javascript" defer></script>
    <script src="{{asset('js/scrollmagic/ScrollMagic.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery/jquery.min.js')}}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.6/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>
</head>

<body>
    <nav class="container">
        <a href="#">
            <img src="../public/img/logo.png" class="logo">
        </a>
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{route('posts.index')}}">Explore</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif
    </nav>

    <div class="content">
        <div class="title">
            <h1>Welcome to Pangaea!</h1>
        </div>
        <section class="panel what-is">
            <h2>What is Pangaea?</h2>
            <p>Pangaea is a social network tailored to all things travel. A place to discuss where you have been, where you are now, and where you want to go next. Travelling back to when we were all one big nation, joined by land. Now we are all joining through Pangaea!</p>
        </section>
        <section class="panel why-join">
            <h2>Why Join Pangaea?</h2>
            <p>The place to share your passion with other travellers, while searching for your next destination. Post your best trips, worst trips, and any advice. Want first hand experience? Here is the place to hear exactly where to go, what to see, and what not to miss!</p>
        </section>
        <section class="panel reveal-images">
            <div id="reveal-elements">
                <div class="box1 digit">
                    <img class="travel-img" src="../public/img/hawaii.jpg">
                </div>
                <div class="box2 digit">
                    <img class="travel-img" src="../public/img/japan.jpg">
                </div>
                <div class="box3 digit">
                    <img class="travel-img" src="../public/img/london.jpg">
                </div>
                <div class="box4 digit">
                    <img class="travel-img" src="../public/img/paris.jpg">
                </div>
                <div class="box5 digit">
                    <img class="travel-img" src="../public/img/sydney.jpg">
                </div>
            </div>
        </section>
        <section class="panel register-now">
            <a href="{{ route('register') }}">Register Now!</a> and find your next adventure.
        </section>
        <footer id="footer">
            <p>&copy; Copyright 2020 Pangaea. All Rights Reserved.</p>
        </footer>
    </div>
</body>

</html>