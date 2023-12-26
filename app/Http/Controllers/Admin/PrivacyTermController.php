<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrivacyTerm;
class PrivacyTermController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // privacy and Term page
    public function privacy()
    {
        $data = PrivacyTerm::first();
        return view('dashboard.term-privacy',[
            'data' => $data
        ]);
    }

    // change Privacy
    public function changePrivacy(Request $request)
    {
        $privacy = PrivacyTerm::first();
        $data = [
            'en' => [
                'privacy' => $request->privacy_en,
                'term' => $request->term_en,
            ],
            'ar' => [
                'privacy' => $request->privacy_ar,
                'term' => $request->term_ar,
            ],
        ];
        $privacy->createOrupdate($data);
        return redirect()->back()->withErrors("changed successfully");
    }
}
