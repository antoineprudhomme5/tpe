<?php

namespace App\Http\Controllers;

use App\Achievement;
use App\GameHistory;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\ProfileQuestion;
use App\ProfileAnswer;
use App\User;
use Input;
use DB;
use App\Libraries\ResizeImage;

class ProfileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = ProfileQuestion::join('profiles_answers', 'profiles_questions.id', '=', 'profiles_answers.profile_question_id')
            ->where('profiles_answers.user_id', Auth::user()->id)
            ->get();

        return view('profile.index', ['questions' => $questions]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
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

    /**
     * Upload l'image de profile de l'utilisateur
     * @param Request $request
     * @return mixed
     */
    public function uploadPicture(Request $request){

        try{
            $file = $request->file('avatar');

            if ($file) {

                if ($_FILES['avatar']['error'] > 0) return Redirect::back()->with('error', 'An error has occured');

                $extensions_valides = array('jpg', 'png', 'jpeg', 'gif');

                // Récupération de l'extension uploadée
                $extension_upload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.') , 1));

                // On vérifie qu'elle existe parmi celles valides
                if (!in_array($extension_upload, $extensions_valides));

                // On définit une chaine de caractères unique qui sera le nom de l'image
                $uniq = $this->uniqString(40);
                $fileName = $uniq.'.'.$extension_upload;
                $fileName = (string)$fileName;

                $destination = "img/avatars/";

                // On la déplace dans le répertoire des avatars
                $file->move($destination, $fileName);

                $resize = new ResizeImage($destination.$fileName);
                $resize->resizeTo(100, 100, 'exact');
                $fileNameResize = $uniq.'-sm'.'.'.$extension_upload;
                $resize->saveImage($destination.'/'.$fileNameResize);

                // On récupère le user actuellement loggé
                $id = Auth::user()->id;
                $check_if_avatar = User::where('id', $id)->first();

                // On vérifie si un avatar (nom de fichier) était déjà présent en BDD
                // Si c'est le cas, alors on ordonne la destruction de ce dernier (car il va être remplacé par le nouveau)
                if (isset($check_if_avatar->avatar) && !empty($check_if_avatar->avatar)){
                    if(file_exists($destination.$check_if_avatar->avatar)){
                        unlink($destination.$check_if_avatar->avatar);
                        unlink($destination.$check_if_avatar->avatar_sm);
                    }
                }

                $user = User::find(Auth::user()->id);
                $user->avatar = $fileName;
                $user->avatar_sm = $fileNameResize;
                $user->save();
            }

        }catch(\Exception $e){
            return Redirect::back()->with('error', 'An error has occured');
        }
        return Redirect::back()->with('success', 'Profile picture updated!');
    }

    /**
     * Retourne une chaîne de caractères unique et aléatoire
     * @param $length
     * @return string
     */
    protected function uniqString($length) {
        $_SESSION['token']="";
        unset($_SESSION['token']);
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        for($i = 0; $i < $length; $i++){
            $token .= $codeAlphabet[$this->crypto_rand_secure(0,strlen($codeAlphabet))];
        }
        return $token;
    }

    protected function crypto_rand_secure($min, $max) {
        $range = $max - $min;
        if ($range < 0) return $min;
        $log = log($range, 2);
        $bytes = (int) ($log / 8) + 1;
        $bits = (int) $log + 1;
        $filter = (int) (1 << $bits) - 1;
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter;
        }while ($rnd >= $range);

        return $min + $rnd;
    }


    /**
     * Return the view achievements with all the users games informations
     */
    public function achievements()
    {
        $user = User::find(Auth::id());

        $users = DB::table('users')->orderBy('points', 'desc')->get();

        $i = 0;
        $row = 0;
        $length = sizeof($users);
        while(($row == 0) && ($i < $length))
        {
            if($users[$i]->id == $user->id)
            {
                $row = $i+1;
            }
            $i++;
        }

        $topranking = DB::table('users')
                            ->orderBy('points', 'desc')
                            ->where('points', '>', $user->points)
                            ->take(2)
                            ->get();

        $lowranking = DB::table('users')
                            ->orderBy('points', 'desc')
                            ->where('points', '<', $user->points)
                            ->take(2)
                            ->get();

        $games = GameHistory::with('game')
                            ->orderBy('created_at', 'desc')
                            ->where('user_id', '=', $user->id)
                            ->take(5)
                            ->get();

        $badges = Auth::user()->achievements()->get();


        return view('profile/achievements', compact('user', 'topranking', 'lowranking', 'games', 'badges', 'row'));
    }

}