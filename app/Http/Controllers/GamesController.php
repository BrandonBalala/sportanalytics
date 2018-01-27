<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function index() {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://conu.astuce.media:9993/api/sports/basketball/matches?RoundId=14&MatchDate=20180126&LoadReferences=true&IncludeLinks=true&format=json');

        $games = json_decode($response->getBody(), true);

        /*foreach($games as $game) {
            echo gettype($game['Id']);
            echo var_dump($game);
            break;
        }*/
        
        return view('welcome', [
            'games' => $games
        ]);
    }
}