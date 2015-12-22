<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\GameSynonym;
use Auth;
use DB;
use App\GameHistory;

class SynonymController extends Controller
{
    /**
     * Return the game view
     */
    public function synonyms()
    {

        return view('games/synonyms');
    }

    /**
     * @return the game data
     */
    public function get_synonyms()
    {
        $synonyms = GameSynonym::orderByRaw('RAND()')->take(4)->get();

        return Response::json($synonyms);
    }

    /**
     * Save in database the score, update his profile and return a message to the user
     */
    public function post_synonyms(Request $request)
    {
        $points = 0;
        $user = Auth::user();
        $response = '';
        $score_table = '<table class="table">
                        <tr>
                            <th>The word</th>
                            <th>Your input</th>
                            <th>The response</th>
                        </tr>';

        try
        {
            $inputs = array(
                $request->radio1, // 0 = the user choice, 1 = the synonym row id
                $request->radio2,
                $request->radio3,
                $request->radio4
            );
            $decode_values = json_decode($request->values); // games data

            for($i = 0; $i < sizeof($inputs); $i++)
            {
                $score_table .= '<tr>
                                    <td>'.$decode_values[$i]->word.'</td>
                                    <td>'.$inputs[$i].'</td>
                                    <td>'.$decode_values[$i]->response.'</td>
                                </tr>';

                if($inputs[$i] == $decode_values[$i]->response)
                {
                    $points += 10;
                }
            }

            $score_table .= '</table>';

            $response = '<div class="jumbotron alert-success">
                            <div class="container">
                                <h1>You win '.$points.' points</h1>
                                <p>There are your results :</p>
                            </div>
                        </div>'.$score_table;

            $user->points = $user->points + $points;
            $user->save();

            $history = new GameHistory();

            $history->user_id = Auth::id();
            $history->game_id = 1;
            $history->points = $points;

            $history->save();

            $this->check_achievements();

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
        $synonyms = DB::table('game_synonyms')
                        ->orderBy('id', 'desc')
                        ->paginate(10);

        $links = $synonyms->setPath('')->render();

        return view('administration/games/synonym/data_managing', compact('synonyms', 'links'));
    }

    /**
     * Store a new synonym in database
     * @param Request $request
     * @return the original view
     */
    public function store(Request $request)
    {
        $synonym = new GameSynonym();

        $synonym->word = $request->word;
        $synonym->p1 = $request->p1;
        $synonym->p2 = $request->p2;
        $synonym->p3 = $request->p3;
        $synonym->response = $request->response;

        $synonym->save();

        return Redirect::to('administration/games/data/synonyms');
    }

    /**
     * Remove a synonym from the database
     * @param $id of the synonym to delete
     * @return the original view
     */
    public function remove($id)
    {
        $synonym = GameSynonym::find($id);

        $synonym->delete();

        return Redirect::to('administration/games/data/synonyms');
    }

    /**
     * Check if the user win a new achievements or not
     */
    private function check_achievements()
    {
        $games = DB::table('games_history')->where('user_id', '=', Auth::id())->count();
        $achievement = -1;

        switch($games)
        {
            case 1:
                $achievement = DB::table('achievements')->where('link', '=', 'badges/synonyms1.png')->get();
                break;
            case 10:
                $achievement = DB::table('achievements')->where('link', '=', 'badges/synonyms10.png')->get();
                break;
            case 25:
                $achievement = DB::table('achievements')->where('link', '=', 'badges/synonyms25.png')->get();
                break;
            case 50:
                $achievement = DB::table('achievements')->where('link', '=', 'badges/synonyms50.png')->get();
                break;
            case 100:
                $achievement = DB::table('achievements')->where('link', '=', 'badges/synonyms100.png')->get();
                break;
        }

        if($achievement != -1)
        {
            $achievement = $achievement[0]->id;
            $user = Auth::user();
            $user->achievements()->attach($achievement);
        }
    }
}
