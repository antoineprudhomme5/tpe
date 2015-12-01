<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller{

    public function index(){
        return view('administration.index');
    }


#----------------------------------------------------------------------------------------------------------------\
#---- N. Actualités
#----------------------------------------------------------------------------------------------------------------/

    public function displayNews(){
        $news = News::get();

        return view('administration.news', ['news' => $news]);
    }

    public function AddNews(){

        return view('administration.newsAdd');
    }

    public function storeNews(Request $request){

        try{
            $news              = new News;
            $news->title       = $request->input('title');
            $news->description = $request->input('content');
            $news->slug        = str_slug($request->input('title'));
            $news->user_id     = $request->user()->id;

            $news->save();


        }catch(\Exception $e){
            die($e);
        }
        return redirect()->route('AdDisplayNews');
    }

    public function destroyNews($id){
        $news = News::find($id);
        $news->delete();

        return Redirect::action('TopicController@show');
    }

}