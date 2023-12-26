<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // about us
    public function aboutUs()
    {
        $about = AboutUs::first();
        return view('dashboard.about-us',[
            'about' => $about
        ]);
    }
    // changeAbout
    public function changeAbout(Request $request)
    {
        $about = AboutUs::first();
        $data = [
            'faceBook' => $request->faceBook,
            'insta'    => $request->insta,
            'linked'   => $request->linked,
            'website'  => $request->website,
            'phone'    => $request->phone,
            'address'  => $request->address,
        ];
        $about->update($data);
        return redirect()->back()->withErrors("changed successfully");
    }
}
