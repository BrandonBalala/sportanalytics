@extends('layout')

@section('content')
        <div class="games-page">
            <div class="col-md-10 games">
                @foreach ($games as $game)
                    <a href="/game/{{ $game["Id"] }}" class="game">
                        <div class="stats">
                            @if ($game['Status'] == "PreEvent")
                                <span class="time">{{date('H:i e',strtotime($game['StartTime']))}}</span>
                            @else
                                <span class="time">Final</span>
                            @endif
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
        </div>

        <div>
            <form method="GET" action="{{ route('showPrediction') }}">
                <select name="teamA">
                    @foreach ($teams as $team)
                        <option value="{{ $team['﻿id'] }}">{{ $team['name'] }}</option>
                    @endforeach
                </select>
                <select name="teamB">
                    @foreach ($teams as $team)
                        <option value="{{ $team['﻿id'] }}">{{ $team['name'] }}</option>
                    @endforeach
                </select> 
                
                {{ csrf_field() }}
                <button type="submit" class="btn btn-default">Predict Winner</button>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>
@endsection
