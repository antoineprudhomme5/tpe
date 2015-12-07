<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Game;
use Auth;
use App\GameSpeakAboutRecord;
use App\GameSynonym;
use App\GameSpeakAbout;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    public function upload(Request $request)
    {
        try
        {
            $file = $request->file('audio');
            $resource = GameSpeakAbout::find($request->resource);
            $resource_name = explode('/', $resource->link);
            $resource_name = explode('.', $resource_name[3]);
            $resource_name = $resource_name[0];
            $user = Auth::user();
        }
        catch(Exception $e)
        {
            die($e);
        }

        if ($file)
        {
            $destinationPath = 'audio';
            $extension = $file->getClientOriginalExtension();
            $fileName = $resource_name.'_'.$user->id.'_'.date('Y-m-d_H-i-s').'.'.$extension;

            $file->move($destinationPath, $fileName);

            $record = new GameSpeakAboutRecord();
            $record->time = $request->time;
            $record->link = $destinationPath.'/'.$fileName;
            $record->user_id = $user->id;
            $record->speakabout_id = $resource->id;
            $record->save();

            return Response::json('success');
        }
        else
        {
            return Response::json('error file');
        }
    }

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

    /**
     * Synonyms game get
     */
    public function synonyms()
    {
        $synonyms = GameSynonym::orderByRaw('RAND()')->take(4)->get();

        return view('games/synonyms', ['synonyms' => $synonyms]);
    }

    /**
     * Synonyms game post
     */
    public function post_synonyms(Request $request)
    {
        $points = 0;

        $user = Auth::user();

        $rep1 = explode('-', $request->radio1); // 0 = the choice, 1 = the id
        $rep2 = explode('-', $request->radio2);
        $rep3 = explode('-', $request->radio3);
        $rep4 = explode('-', $request->radio4);

        $word1 = GameSynonym::find($rep1[1]);
        $word2 = GameSynonym::find($rep2[1]);
        $word3 = GameSynonym::find($rep3[1]);
        $word4 = GameSynonym::find($rep4[1]);

        $valid1 = false; $valid2 = false; $valid3 = false; $valid4 = false;

        if($rep1[0] == $word1->response) // check if response 1 is good
        {
            $valid1 = true;
            $points += 10;
        }

        if($rep2[0] == $word2->response) // check if response 2 is good
        {
            $valid2 = true;
            $points += 10;
        }

        if($rep3[0] == $word3->response) // check if response 3 is good
        {
            $valid3 = true;
            $points += 10;
        }

        if($rep4[0] == $word4->response) // check if response 3 is good
        {
            $valid4 = true;
            $points += 10;
        }

        $results = array(
            array(
                'word' => $word1->word,
                'choice' => $rep1[0],
                'response' => $word1->response,
                'valid' => $valid1
            ),
            array(
                'word' => $word2->word,
                'choice' => $rep2[0],
                'response' => $word2->response,
                'valid' => $valid2
            ),
            array(
                'word' => $word3->word,
                'choice' => $rep3[0],
                'response' => $word3->response,
                'valid' => $valid3
            ),
            array(
                'word' => $word4->word,
                'choice' => $rep4[0],
                'response' => $word4->response,
                'valid' => $valid4
            )
        );

        $user->points = $points;
        $user->save();

        return view('games/synonyms_submit', ['results' => $results, 'points' => $points]);
    }

    public function speakAbout()
    {
        $resource = GameSpeakAbout::orderByRaw('RAND()')->take(1)->get();

        return view('games/speak_about', ['resource' => $resource]);
    }

    public function speakAbout_submit(Request $request)
    {
        echo $request;
        //return view('games/speak_about_submit');
    }
}
