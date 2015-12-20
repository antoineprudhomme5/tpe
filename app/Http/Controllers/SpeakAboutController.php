<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\GameSpeakAbout;
use App\GameSpeakAboutRecord;
use Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\GameHistory;

class SpeakAboutController extends Controller
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

    public function speakAbout()
    {
        return view('games/speak_about');
    }


    public function get_speak_about()
    {
        $resource = GameSpeakAbout::orderByRaw('RAND()')->take(1)->get();

        return Response::json($resource);
    }

    public function post_speak_about(Request $request)
    {
        try
        {
            $file = $request->file('audio');

            $destinationPath = 'audio';
            $extension = $file->getClientOriginalExtension();
            $data = json_decode($request->data);
            $resource_name = explode('/', $data->link);
            $resource_name = explode('.', $resource_name[3]);
            $resource_name = $resource_name[0];
            $fileName = $resource_name.'_'.Auth::id().'_'.date('Y-m-d_H-i-s').'.'.$extension;
            $file->move($destinationPath, $fileName);

            $record = new GameSpeakAboutRecord();

            $record->time = $request->time;
            $record->link = $destinationPath.'/'.$fileName;
            $record->user_id = Auth::id();
            $record->speakabout_id = $data->id;

            $record->save();

            $response = '<div class="jumbotron alert-success">
                            <div class="container">
                                <h1>Your file is upload !</h1>
                                <p> You will have the result when the teacher will have corrected it.</p>
                            </div>
                        </div>';
        }
        catch(Exception $e)
        {
            $response = '<div class="alert alert-danger" role="alert">
                            <strong>Validation Error </strong>'
                .$e.
                '</div>';
            return Response::json($response);
        }

        return Response::json($response);
    }

    /**
     * 10 synonym per page
     * @return the view page in the admin section
     */
    public function dataManaging()
    {
        $speakAbouts = DB::table('game_speakabouts')
            ->orderBy('id', 'desc')
            ->paginate(10);

        $links = $speakAbouts->setPath('')->render();

        return view('administration/games/speak_about/data_managing', compact('speakAbouts', 'links'));
    }

    public function evaluate()
    {
        $records = GameSpeakAboutRecord::with('user', 'speakAbout')
            ->orderBy('id', 'desc')
            ->where('points', '=', 0)
            ->paginate(5);

        $links = $records->setPath('')->render();

        return view('administration/games/speak_about/evaluate', compact('records', 'links'));
    }

    public function post_evaluate(Request $request,$id)
    {
        $points = $request->mark * 5;

        $record = GameSpeakAboutRecord::find($id);
        $record->points = $points;

        $history = new GameHistory();
        $history->user_id = $record->user_id;
        $history->game_id = 2;
        $history->points = $points;

        $student = User::find($record->user_id);
        $student->points = $student->points + $points;

        $student->save();
        $history->save();
        $record->save();

        return Redirect::to('administration/games/evaluate/speak_about');
    }
}
