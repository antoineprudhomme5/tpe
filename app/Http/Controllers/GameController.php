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
