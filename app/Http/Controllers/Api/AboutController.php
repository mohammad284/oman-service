<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\PrivacyTerm;
class AboutController extends Controller
{
    // get about info
    public function aboutUs()
    {
        $about = AboutUs::first();
        return response()->json([
            'details' => $about
        ]);
    }
    // get privacy info 
    public function PrivacyTerm()
    {
        $privacy = PrivacyTerm::first();
        return response()->json([
            'details' => $privacy
        ]);
    }
}
