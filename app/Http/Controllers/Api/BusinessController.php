<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sub;
use App\Models\Main;
class BusinessController extends Controller
{
    // get main business and sub business 
    public function main_business()
    {
        $mains = Main::with('subs')->get();
        return response()->json([
            'details' => $mains
        ]);
    }

    // get questions from sub id 
    public function questions(Request $request)
    {
        $questions = Sub::with('questions.answers')
        ->where('id',$request->sub_id)
        ->get();
        return response()->json([
            'details' => $questions
        ]);
    }
}
