<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
use App\Models\AnswerQuestion;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // answers
    public function answers()
    {
        $answers = Answer::all();
        return view('dashboard.answers.answers',[
            'answers' => $answers
        ]);
    }
    // add answer 
    public function addAnswer(Request $request)
    {
        $data = [
            'en' => [
                'answer' => $request->answer_en,
            ],
            'ar' => [
                'answer' => $request->answer_ar,
            ],
        ];
        Answer::create($data);
        return redirect()->back()->withErrors("added successfully");
    }

    // update answer 
    public function updateAnswer(Request $request)
    {
        $data = [
            'en' => [
                'answer' => $request -> answer_en,
            ],
            'ar' => [
                'answer' => $request -> answer_ar,
            ],
        ];
        $answer = Answer::find($request->id);
        $answer->update($data);
        return redirect()->back()->withErrors("updated successfully");
    }
    // deleted answer
    public function deleteAnswer($id)
    {
        $answer = Answer::find($id)->delete();
        return redirect()->back()->withErrors("deleted successfully");
    }
    // add_answer_to_question
    public function answer_to_question($id)
    {
        $question = Question::with('answers')->find($id);
        $answers = Answer::all();
        return view('dashboard.answers.question-answer',[
            'question' => $question,
            'answers' => $answers
        ]);
    }

    // save_answer_to_question
    public function save_answer_to_question(Request $request)
    {
        $question = Question::with('answers')->find($request->id);
        
        $question->answers()->sync($request->answers);
        
        return redirect()->back()->withErrors("added successfully");
    }

    // delete_question_answer
    public function delete_question_answer($question_id , $answer_id)
    {
        AnswerQuestion::where('question_id',$question_id)->where('answer_id',$answer_id)->delete();
        return redirect()->back()->withErrors("deleted successfully");
    }
}
