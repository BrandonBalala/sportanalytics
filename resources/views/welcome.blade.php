<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SportAnalytics</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/app.css"
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-8 games">
            @foreach ($games as $game)
                <a href="/game/{{ $game["Id"] }}" class="game">
                    <div class="stats">
                        <span class="time"></span>
                    </div>
                    <div class="teama">
                        <div class="team-info">
                            <img src="{{$game['TeamA']['DynamicLinks']['default-thumbnail']}}"/>
                            <span class="name">{{$game['TeamA']['LocationName']}} {{$game['TeamA']['Name']}}</span>
                            <span class="record">({{ $game['TeamAWinsLosses'] }})</span>
                            <span class="score">{{ $game['TeamAFinalScore'] }}</span>
                        </div>
                    </div>
                    <div class="teamb">
                        <div class="team-info">
                            <img src="{{$game['TeamB']['DynamicLinks']['default-thumbnail']}}"/>
                            <span class="name">{{$game['TeamB']['LocationName']}} {{$game['TeamB']['Name']}}</span>
                            <span class="record">({{ $game['TeamBWinsLosses'] }})</span>
                            <span class="score">{{ $game['TeamBFinalScore'] }}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>
