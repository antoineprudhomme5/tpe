<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\ProfileQuestion;
use App\ProfileAnswer;
use App\User;
use Input;

class ProfileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        //$questions = ProfileQuestion::all();
        $questions = ProfileQuestion::join('profiles_answers', 'profiles_questions.id', '=', 'profiles_answers.profile_question_id')
            ->where('profiles_answers.user_id', Auth::user()->id)
            ->get();

        return view('profile.about', ['questions' => $questions]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $input = Input::except('_token');

        foreach ($input as $key => $value) {

            $tag = ProfileQuestion::where('tag', $key)->firstOrFail();
            $id  = $tag->id;
            $answer = ProfileAnswer::where('profile_question_id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
            $answer->answer = $value;
            $answer->save();
        }
        return Redirect::back()->with('success', 'Profile updated!');
    }
}