<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\MCQ;
use App\Question;
use App\Answer;
use App\Game;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MCQController extends Controller
{
    /**
     * get all the MCQ from the database and return the MCQ index view
     */
    public function index()
    {
        $mcq = MCQ::get();
        return view('administration/mcq/index', ["mcq" => $mcq]);
    }

    /**
     * create a new mcq
     * @param Request $request => data from mcq form create
     * @return the index view
     */
    public function createMCQ(Request $request)
    {
        if($request->name)
        {
            $mcq = new MCQ();
            $mcq->name = $request->name;
            $mcq->save();
        }

        return redirect()->action('MCQController@index');
    }

    /**
     * show all the questions of the mcq
     * @param $id => the mcq id
     * @return the mcq view
     */
    public function getMCQ($id)
    {
        $mcq = MCQ::where('id', $id)->get();

        $questions = Question::where('question.id_mcq', $id)
                        ->get();

        return view('administration/mcq/mcq', ["mcq" => $mcq[0], "questions" => $questions]);
    }

    /**
     * create a question
     * @param $id => mcq id
     * @param Request $request => form inputs
     * @return the mcq view
     */
    public function createQuestion($id, Request $request)
    {
        if($request->question)
        {
            $q = new Question();
            $q->question = $request->question;
            $q->id_mcq = $id;
            $q->save();
        }

        return redirect()->action('MCQController@getMCQ', ["id" => $id]);
    }

    /**
     * remove a question
     * @param $mcq_id
     * @param $q_id => question id
     * @return the mcq view
     */
    public function removeQuestion($mcq_id, $q_id)
    {
        Answer::where('id_question', '=', $q_id)->delete();
        Question::destroy($q_id);

        return redirect()->action('MCQController@getMCQ', ["id" => $mcq_id]);
    }

    /**
     * show all the answers for the question
     * @param $mcq_id
     * @param $q_id => question id
     * @return the answers view
     */
    public function getAnswers($mcq_id, $q_id)
    {
        $question = Question::where("id", $q_id)->get();
        $answers = Answer::where("id_question", $q_id)->get();

        return view('administration/mcq/answers', ["question" => $question[0], "answers" => $answers, "mcq_id" => $mcq_id]);
    }

    /**
     * add an answer to the question
     * @param $mcq_id
     * @param $q_id => question id
     * @return redirect to the answers view
     */
    public function addAnswer($mcq_id, $q_id, Request $request)
    {
        if($request->answer && $request->answer_correct)
        {
            $nbAnswers = Answer::where('id_question', $q_id)->count();

            if($nbAnswers < 5 ) // 5 answers max per question
            {
                $a = new Answer();
                $a->answer = $request->answer;

                if($request->answer_correct == "false")
                {
                    $a->correct = false;
                }
                else
                {
                    $a->correct = true;
                }

                $a->id_question = $q_id;
                $a->save();
            }
        }

        return redirect()->action('MCQController@getAnswers', ["mcq_id" => $mcq_id, "q_id" => $q_id]);
    }

    /**
     * remove an answer
     * @param $mcq_id
     * @param $q_id => question id
     * @param $a_id => answer id
     * @return redirect to the answers view
     */
    public function removeAnswer($mcq_id, $q_id, $a_id)
    {
        Answer::destroy($a_id);

        return redirect()->action('MCQController@getAnswers', ["mcq_id" => $mcq_id, "q_id" => $q_id]);
    }
}
