<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class ReviewController extends Controller
{
    public function userReviews(Request $request)
    {
        $user_id = JWTAuth::authenticate($request->token)->id;
        $reviews = Review::where('user_id',$user_id)->get();
        return response()->json([
            'details' => $reviews
        ]);
    }
}
