<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function index() {
        $client = new \GuzzleHttp\Client();
        $response = $client->request("GET", "http://conu.astuce.media:9993/api/sports/basketball/matches?RoundId=14&MatchDate=20180125&LoadReferences=true&IncludeLinks=true&format=json");

        $games = json_decode($response->getBody(), true);

        // foreach($games as $game) {
        //     echo gettype($game['Id']);
        //     echo var_dump($game);
        //     break;
        // }

        $teams = $this->getCSVAsArray('data/nba-teams.csv',',');

        // echo var_dump($teams);

        return view('welcome', [
            'games' => $games,
            'teams' => $teams
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
        $response = $client->request("GET", "http://conu.astuce.media/api/sports/basketball/matches?RoundId=$roundId&Status=PostEvent&format=json");

        // echo var_dump($response->getBody());

        // $previous_games = json_decode($response->getBody(), true);


        
        return view('game', [
            'game' => $game[0],
            // 'previous_games' => $previous_games,
        ]);
    }

    public function getCSVAsArray($filename, $delimiter){
        $file = public_path($filename);

        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }

    public function prediction(Request $request) {
        if(!isset($request->teamA) || !isset($request->teamB)){
            return redirect('/');
        }

        $teamAId = $request->teamA;
        $teamBId = $request->teamB;

        echo var_dump($teamAId . "  -  " . $teamBId);

        $client = new \GuzzleHttp\Client();
        $response = $client->request("GET", "http://conu.astuce.media/api/sports/basketball/matches?RoundId=14&Status=PostEvent&format=json");
        
        $games = json_decode($response->getBody(), true);
        echo var_dump(count($games));

        $previous_games = array();
        $teams = [$teamAId, $teamBId];
        foreach ($games as $game) {
            if ($game['Status'] == 'PostEvent' && in_array($game["TeamAId"], $teams) && in_array($game["TeamBId"], $teams)) {
                $previous_games[] = $game;
            }
        }

        echo var_dump(count($previous_games));



        return view('prediction', [
            //...
        ]);
    }
}