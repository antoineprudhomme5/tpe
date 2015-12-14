<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;

class AdminController extends Controller{

    public function index(){
        return view('administration.skeleton');
    }


#----------------------------------------------------------------------------------------------------------------\
#---- N. Actualités
#----------------------------------------------------------------------------------------------------------------/

    public function displayNews(){
        $news = News::get();
        return view('administration.news.display', ['news' => $news]);
    }

    public function createNews(){

        return view('administration.news.create');
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
        return Redirect::route('AdminDisplayNews');
    }

    public function editNews($id){

        $news = News::findOrFail($id);
        return view('administration.news.update', ['news' => $news]);
    }

    public function updateNews($id, Request $request){

        $news = News::findOrFail($id);
        $this->validate($request, [
            'title'   => 'required',
            'content' => 'required'
        ]);

        $input = $request->all();
        $news->fill($input)->save();
        Session::flash('flash_message', 'News successfully added!');
        return redirect()->back();
    }

    public function destroyNews(Request $request){
        $news = News::find($request->news_id);

        if ($news != NULL){
            try{
                $news->delete();
                $message = array(
                    "reponse" => "success",
                    "message" => "La news a bien été supprimée"
                );
            }catch(\Exception $e){
                $message = array(
                    "reponse" => "error",
                    "message" => "Une erreur innatendue s'est produite"
                );
            }
        }else{
            $message = array(
                "reponse" => "error",
                "message" => "Une erreur innatendue s'est produite"
            );
        }
        echo json_encode($message);

        return Redirect::route('AdminDisplayNews');
    }

}