<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class NotificationController extends Controller
{
    // get user notifications with user token 
    public function notifications(Request $request)
    {
        $user_id = JWTAuth::authenticate($request->token)->id;
        $nots = Notification::where('user_id',$user_id)->get();
        return response()->json([
            'details' => $nots
        ]);
    }
}
