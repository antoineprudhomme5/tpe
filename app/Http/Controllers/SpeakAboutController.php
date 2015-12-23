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
        try {
            $file = $request->file('audio');
            $resource = GameSpeakAbout::find($request->resource);
            $resource_name = explode('/', $resource->link);
            $resource_name = explode('.', $resource_name[3]);
            $resource_name = $resource_name[0];
            $user = Auth::user();
        } catch (Exception $e) {
            die($e);
        }

        if ($file) {
            $destinationPath = 'audio';
            $extension = $file->getClientOriginalExtension();
            $fileName = $resource_name . '_' . $user->id . '_' . date('Y-m-d_H-i-s') . '.' . $extension;

            $file->move($destinationPath, $fileName);

            $record = new GameSpeakAboutRecord();
            $record->time = $request->time;
            $record->link = $destinationPath . '/' . $fileName;
            $record->user_id = $user->id;
            $record->speakabout_id = $resource->id;
            $record->save();

            return Response::json('success');
        } else {
            return Response::json('error file');
        }
    }

    /**
     * @return the speak about view
     */
    public function speakAbout()
    {
        return view('games/speak_about');
    }


    /**
     * @return the speak about data with json
     */
    public function get_speak_about()
    {
        $resource = GameSpeakAbout::orderByRaw('RAND()')->take(1)->get();

        return Response::json($resource);
    }

    /**
     * store the record in the data base
     * @param Request $request
     * @return json response
     */
    public function post_speak_about(Request $request)
    {
        try {
            $file = $request->file('audio');

            $destinationPath = 'audio';
            $extension = $file->getClientOriginalExtension();
            $data = json_decode($request->data);
            $resource_name = explode('/', $data->link);
            $resource_name = explode('.', $resource_name[2]);
            $resource_name = $resource_name[0];
            $fileName = $resource_name . '_' . Auth::id() . '_' . date('Y-m-d_H-i-s') . '.' . $extension;
            $file->move($destinationPath, $fileName);

            $record = new GameSpeakAboutRecord();

            $record->time = $request->time;
            $record->link = $destinationPath . '/' . $fileName;
            $record->user_id = Auth::id();
            $record->speakabout_id = $data->id;

            $record->save();

            $response = '<div class="jumbotron alert-success">
                            <div class="container">
                                <h1>Your file is upload !</h1>
                                <p> You will have the result when the teacher will have corrected it.</p>
                            </div>
                        </div>';
        } catch (Exception $e) {
            $response = '<div class="alert alert-danger" role="alert">
                            <strong>Validation Error </strong>'
                . $e .
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

    /**
     * @return the views with all the unmarked records
     */
    public function evaluate()
    {
        $records = GameSpeakAboutRecord::with('user', 'speakAbout')
            ->orderBy('id', 'desc')
            ->where('points', '=', 0)
            ->paginate(5);

        $links = $records->setPath('')->render();

        return view('administration/games/speak_about/evaluate', compact('records', 'links'));
    }

    /**
     * store the mark, give points to the user and check if he win a new achievement
     * @param Request $request
     * @param $id the record id
     * @return redirect to the page
     */
    public function post_evaluate(Request $request, $id)
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

        $achievement = $this->check_achievements($record->user_id); // send notification to the user if achievement

        return Redirect::to('administration/games/evaluate/speak_about');
    }

    /**
     * Check if the user win a new achievements or not
     */
    private function check_achievements($user_id)
    {
        $games = DB::table('games_history')->where('user_id', '=', $user_id)->where('game_id', '=', 2)->count();
        $achievement = false;

        switch ($games) {
            case 1:
                $achievement = DB::table('achievements')->where('link', '=', 'badges/speakabout1.png')->get();
                break;
            case 10:
                $achievement = DB::table('achievements')->where('link', '=', 'badges/speakabout10.png')->get();
                break;
            case 25:
                $achievement = DB::table('achievements')->where('link', '=', 'badges/speakabout25.png')->get();
                break;
            case 50:
                $achievement = DB::table('achievements')->where('link', '=', 'badges/speakabout50.png')->get();
                break;
            case 100:
                $achievement = DB::table('achievements')->where('link', '=', 'badges/speakabout100.png')->get();
                break;
        }

        if ($achievement) {
            $id = $achievement[0]->id;
            $user = User::find($user_id);
            $user->achievements()->attach($id);

            $return = ['link' => $achievement[0]->link, 'title' => $achievement[0]->title];
            return $return;
        } else {
            return false;
        }
    }

    /**
     * store a new game resource for the speak about game in the data base
     * @param Request $request
     * @return json response
     */
    public function store(Request $request)
    {
        try {
            $file = $request->file('file');

            $destinationPath = 'games_resources/speakabout';
            $fileName = $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);

            $resource = new GameSpeakAbout();

            $resource->type = $request->type;
            $resource->link = $destinationPath . '/' . $fileName;

            $resource->save();
        } catch (Exception $e) {
            return Response::json('error');
        }

        return Response::json('success');
    }

    /**
     * remove a resource for the speak about game from the data base
     * @param $id game resource to delete
     * @return redirect to the page
     */
    public function remove($id)
    {
        $resource = GameSpeakAbout::find($id);
        $resource->delete();

        return Redirect::to('administration/games/data/speak_about');
    }

    /***
     * delete a record
     * @param $id the record id
     * @return redirect to the page
     */
    public function delete_record($id)
    {
        $record = GameSpeakAboutRecord::find($id);
        $record->delete();

        return Redirect::to('administration/games/evaluate/speak_about');
    }

}
