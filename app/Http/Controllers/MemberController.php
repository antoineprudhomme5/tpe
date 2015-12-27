<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\User;


class MemberController extends  Controller{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::join('profiles_answers', 'users.id', '=', 'profiles_answers.user_id')
            ->where('profiles_answers.user_id', '<>' ,Auth::user()->id)
            ->where('profiles_answers.profile_question_id', 1)
            ->get();

        //$users = User::where('category_id', 2)->where('id', '<>', Auth::user()->id)->get();
        return view('members/index', ['users' => $users]);
    }
}