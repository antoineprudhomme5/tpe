<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\GameSynonym;
use Auth;

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
                if($inputs[$i] == $decode_values[$i]->response)
                {
                    $points += 10;
                }
            }

            $response = 'points : ' + $points;

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

        /*
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

        return view('games/synonyms_submit', ['results' => $results, 'points' => $points]);*/
    }
}
