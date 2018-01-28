@extends('layout')

@section('content')
        <div class="game-page">
            <div class="game col-md-12">
                <div class="game-stats">
                    <div class="stats">
                        <div class="date">{{date('D, F d, Y', strtotime($game['StartTime']))}}</div>
                        @if ($game['Status'] == "PreEvent")
                            <span class="time">{{date('H:i e',strtotime($game['StartTime']))}}</span>
                        @else
                            <span class="time">Final</span>
                            <div class="score">{{ $game['TeamAFinalScore'] }} - {{ $game['TeamBFinalScore'] }}</div>
                        @endif
                    </div>
                    <div class="teama">
                        <div class="team-info">
                            <img src="{{$game['TeamA']['DynamicLinks']['default-thumbnail']}}"/>
                            <div class="name">{{$game['TeamA']['LocationName']}} {{$game['TeamA']['Name']}}</div>
                        </div>
                    </div>
                    <div class="teamb">
                        <div class="team-info">
                            <img src="{{$game['TeamB']['DynamicLinks']['default-thumbnail']}}"/>
                            <div class="name">{{$game['TeamB']['LocationName']}} {{$game['TeamB']['Name']}}</div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($game['Status'] == 'PostEvent')
                <div class="pointsPerQuarter col-md-12 text-center">
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
        </div>
@endsection