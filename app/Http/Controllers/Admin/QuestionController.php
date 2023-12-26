<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Sub;
use App\Models\QuestionSub;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // Question
    public function questions()
    {
        $questions = Question::with('subs')->get();
        return view('dashboard.questions.questions',[
            'questions' => $questions
        ]);
    }

    // save Question 
    public function addQuestion(Request $request)
    {
        $data = [
            'en' => [
                'question' => $request -> question_en,
            ],
            'ar' => [
                'question' => $request -> question_ar,
            ],
        ];
        Question::create($data);
        return redirect()->back()->withErrors("added successfully");
    }

    // UpdateQuestion
    public function updateQuestion(Request $request)
    {
        $data = [
            'en' => [
                'question' => $request -> question_en,
            ],
            'ar' => [
                'question' => $request -> question_ar,
            ],
        ];
        $question = Question::find($request->id);
        $question->update($data);
        return redirect()->back()->withErrors("updated successfully");
    }

    // Delete Question 
    public function deleteQuestion($id)
    {
        $question = Question::find($id);
        $question->delete();
        return redirect()->back()->withErrors("deleted successfully");
    }

    // add question to sub
    public function question_to_sub($id)
    {
        $sub = Sub::with('questions')->find($id);
        $questions = Question::all();
        return view('dashboard.questions.sub-question',[
            'sub' => $sub,
            'questions' => $questions
        ]);
    }

    // save_question_to_sub
    public function save_question_to_sub(Request $request)
    {
        $sub = Sub::with('questions')->find($request->id);
        $sub->questions()->sync($request->questions);
        
        return redirect()->back()->withErrors("Added successfully");
    }
    // delete_sub_question
    public function delete_sub_question($sub_id,$question_id)
    {
        QuestionSub::where('sub_id',$sub_id)->where('question_id',$question_id)->delete();
        return redirect()->back()->withErrors("Deleted successfully");
    }
}
