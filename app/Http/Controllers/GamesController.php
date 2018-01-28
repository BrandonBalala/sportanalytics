<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function index() {
        $client = new \GuzzleHttp\Client();
        $response = $client->request("GET", "http://conu.astuce.media:9993/api/sports/basketball/matches?RoundId=14&MatchDate=20180129&LoadReferences=true&IncludeLinks=true&format=json");

        $games = json_decode($response->getBody(), true);

        // foreach($games as $game) {
        //     echo gettype($game['Id']);
        //     echo var_dump($game);
        //     break;
        // }
        
        return view('welcome', [
            'games' => $games
        ]);
    }

    public function game($gameId) {
        $client = new \GuzzleHttp\Client();
        $response = $client->request("GET", "http://conu.astuce.media:9993/api/sports/basketball/matches?Id=$gameId&LoadReferences=true&IncludeLinks=true&format=json");

        $game = json_decode($response->getBody(), true);

        // echo var_dump($game);
        /*foreach($games as $game) {
            echo gettype($game['Id']);
            echo var_dump($game);
            break;
        }*/

        $roundId = $game[0]['RoundId'];
        // $response = $client->request("GET", "http://conu.astuce.media/api/sports/basketball/matches?RoundId=$roundId&Status=PostEvent&format=json");

        // echo var_dump($response->getBody());

        // $previous_games = json_decode($response->getBody(), true);


        
        return view('game', [
            'game' => $game[0],
            // 'previous_games' => $previous_games,
        ]);
    }
}