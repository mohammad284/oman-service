<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // all notification 
    public function notifications()
    {
        $nots = Notification::with('user')->get();
        return view('dashboard.notifications',[
            'nots' => $nots
        ]);
    }
}
