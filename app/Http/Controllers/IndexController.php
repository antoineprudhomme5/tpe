<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Actualite;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
        {
            $actu   = Actualite::orderBy('id', 'desc')->first();
            $topics = Topic::orderBy('id', 'desc')->take(5)->get();
            $userLevel = $this::checkLevel();

            return view('index', ['topics' => $topics, 'actu' => $actu, 'level' => $userLevel]);
        }
        else
        {
            return view('index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Fonction permettant de connaître le niveau d'un user :
     * - le nom de son niveau actuel
     * - le % de son niveau actuel
     *
     * Les données sont calculées en fonction du nombre de badges gagnés par l'utilisateur
     * @return array
     */
    static function checkLevel(){
        $user = User::with('achievements')->where('id', Auth::user()->id)->count();
        $badges      = Auth::user()->achievements()->count();
        $totalBadges = \App\Achievement::count();

        if ($badges >= 0 && $badges <= 7){
            $level = 'Beginner';
        }
        elseif ($badges > 7 && $badges <= 14){
            $level = 'Casual';
        }
        elseif ($badges > 14 && $badges <= 21){
            $level = 'Advanced';
        }
        elseif($badges > 21 && $badges <= 28){
            $level = 'Expert';
        }

        $percent = round($badges * 100 / $totalBadges);

        $userLevel = ['percent' => $percent, 'level' => $level];

        return $userLevel;
    }
}
