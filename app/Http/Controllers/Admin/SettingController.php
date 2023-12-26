<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //  all setting
    public function setting()
    {
        $setting = Setting::first();
        return view('dashboard.setting.setting',[
            'setting' => $setting
        ]);
    }
    // change Setting
    public function change_setting(Request $request)
    {
        $setting = Setting::first();
        $setting->title = $request->title;
        $setting->save();
        return redirect()->back()->withErrors("Changed successfully");
    }
}
