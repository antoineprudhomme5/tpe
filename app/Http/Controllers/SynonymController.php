<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\GameSynonym;
use Auth;
use App\GameHistory;

class SynonymController extends Controller
{
    /**
     * Synonyms game get
     */
    public function synonyms()
    {

        return view('games/synonyms');
    }

    public function get_synonyms()
    {
        $synonyms = GameSynonym::orderByRaw('RAND()')->take(4)->get();

        return Response::json($synonyms);
    }

    /**
     * Synonyms game post
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

            $user->points = $points;
            $user->save();

            $history = new GameHistory();

            $history->user_id = Auth::id();
            $history->game_id = 1;
            $history->points = $points;

            $history->save();

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
}
