<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actualite;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Input;
use Session;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = Actualite::get();
        return view('administration.news.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create the validation rules
        $rules = array(
            'title'   => 'required|unique:actualites',
            'description' => 'required'
        );

        // do the validation
        // validate against the inputs from our form
        $validator = Validator::make(Input::all(), $rules);

        // check if the validator failed
        if ($validator->fails()) {

            // get the error messages from the validator
            $messages = $validator->messages();

            // redirect our user back to the form with the errors from the validator
            return Redirect::to('administration/news/create')
                ->withErrors($validator);

        } else {
            // validation successful ---------------------------

            // create the data for our news
            $news = new Actualite;
            $news->title       = Input::get('title');
            $news->description = Input::get('description');
            $news->slug        = str_slug($request->input('title'));
            $news->user_id     = $request->user()->id;
            if (Input::get('online') === '1'){
                $news->online = 1;
            }else $news->online = 0;

            // save the news
            $news->save();

            $request->session()->flash('success', 'News was successful added!');
            // redirect ----------------------------------------
            return Redirect::to('administration/news');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = Actualite::findOrFail($id);

        return view('administration.news.edit')->withNews($news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $news = Actualite::findOrFail($id);

        $rules = array(
            'title'       => 'required',
            'description' => 'required'
        );

        // do the validation
        // validate against the inputs from our form
        $validator = Validator::make(Input::all(), $rules);

        // check if the validator failed
        if ($validator->fails()) {

            // get the error messages from the validator
            $messages = $validator->messages();

            // redirect our user back to the form with the errors from the validator
            return Redirect::to('administration/news/create')
                ->withErrors($validator);

        } else {
            // validation successful ---------------------------

            // update the data for our news
            $news->title       = Input::get('title');
            $news->description = Input::get('description');
            $news->slug        = str_slug($request->input('title'));
            $news->user_id     = $request->user()->id;

            // save the news
            $news->save();

            Session::flash('flash_message', 'News was successfully updated!');
            // redirect ----------------------------------------
            return Redirect::to('administration/news ');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = Actualite::findOrFail($id);

        $news->delete();

        Session::flash('flash_message', 'News successfully deleted!');

        return redirect()->route('administration.news.index');
    }

    /**
     * @param Request $request
     * @return int
     */
    public function online($id, $value){
        return 1;
//
//        $news = Actualite::findOrFail($request->id);
//
//        if ($news !== NULL){
//            try{
//                $news->online = $request->value;
//                $news->save();
//
//                $message = array(
//                    "reponse" => "success",
//                    "message" => "succes"
//                );
//            }catch(\Exception $e){
//                $message = array(
//                    "reponse" => "error",
//                    "message" => "erreur"
//                );
//            }
//        }else{
//            $message = array(
//                "reponse" => "error",
//                "message" => "erreur inconnue"
//            );
//        }
//        echo json_encode($message);
    }
}
