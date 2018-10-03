<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Game;
use App\Question;
use App\MCQ;
use Auth;
use App\GameSpeakAboutRecord;
use App\GameSpeakAbout;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    public function index()
    {
        $mcq = MCQ::where("playable", true)->get(); // get all playable mcq
        $games = Game::get(); // get all games

        return view('games/index', ['games' => $games, 'mcq' => $mcq]);
    }

    public function adminIndex()
    {
        $games = Game::get();
        return view('administration/games/index', compact('games'));
    }
}
