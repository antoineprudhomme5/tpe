<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Game;
use Auth;
use App\GameSpeakAboutRecord;
use App\GameSpeakAbout;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::get();
        return view('games/index', ['games' => $games]);
    }

    public function adminIndex()
    {
        $games = Game::get();
        return view('administration/games/index', compact('games'));
    }
}
