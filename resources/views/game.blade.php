<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
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


        <div class="game col-md-8 text-center">
            <div>
                <img src="{{$game['TeamA']['DynamicLinks']['default-thumbnail']}}"/>{{$game['TeamA']['LocationName']}} {{$game['TeamA']['Name']}} vs. <img src="{{$game['TeamB']['DynamicLinks']['default-thumbnail']}}"/>{{$game['TeamB']['LocationName']}} {{$game['TeamB']['Name']}}
                <p>
                    <span>{{ $game['TeamAWinsLosses'] }}</span> ... <span>{{ $game['TeamBWinsLosses'] }}</span>
                </p>
            </div>
        </div>

        @if ($game['Status'] == 'PostEvent')
            <div>
                @if ($game['Winner'] == 'teamA')
                    <p>The {{ $game['TeamA']['Name'] }} Won!</p>
                @else
                    <p>The {{ $game['TeamB']['Name'] }} Won!</p>
                @endif
            </div>

            <div>
                <span>{{ $game['TeamAFinalScore'] }}</span>
                <span>{{ $game['TeamBFinalScore'] }}</span>
            </div>

            <div class="pointsPerQuarter col-md-8 text-center">
                <table class="table table-sm">
                    <thead>
                        <tr>
                        <th scope="col">Team</th>
                        <th scope="col">1st Quarter</th>
                        <th scope="col">2nd Quarter</th>
                        <th scope="col">3rd Quarter</th>
                        <th scope="col">4th Quarter</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">{{ $game['TeamA']['DisplayName'] }}</th>
                        <td>{{ $game['TeamAPeriod1Score'] }}</td>
                        <td>{{ $game['TeamAPeriod2Score'] }}</td>
                        <td>{{ $game['TeamAPeriod3Score'] }}</td>
                        <td>{{ $game['TeamAPeriod4Score'] }}</td>
                        </tr>
                        <tr>
                        <th scope="row">{{ $game['TeamB']['DisplayName'] }}</th>
                        <td>{{ $game['TeamBPeriod1Score'] }}</td>
                        <td>{{ $game['TeamBPeriod2Score'] }}</td>
                        <td>{{ $game['TeamBPeriod3Score'] }}</td>
                        <td>{{ $game['TeamBPeriod4Score'] }}</td>
                        </tr>
                    </tbody>
                    </table>
            </div>
        @endif


        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    </body>
</html>
