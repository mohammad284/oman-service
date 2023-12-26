<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Main;
use App\Models\Sub;
use App\Models\MainSub;
use Validator;
class BusinessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // main business
    public function main_business()
    {
        $mains = Main::all();
        return view('dashboard.business.main',[
            'mains' => $mains
        ]);
    }
    // add main business
    public function add_main(Request $request)
    {
        $data = [
            'en' => [
                'name' => $request -> name_en,
            ],
            'ar' => [
                'name' => $request -> name_ar,
            ],
        ];
        Main::create($data);
        return redirect()->back()->withErrors("added successfully");
    }
    // update main business
    public function update_main(Request $request)
    {
        $data = [
            'en' => [
                'name' => $request -> name_en,
            ],
            'ar' => [
                'name' => $request -> name_ar,
            ],
        ];
        $main = Main::find($request->id);
        $main->update($data);
        return redirect()->back()->withErrors("updated successfully");
    }
    // deleted main business
    public function delete_main(Request $request)
    {
        $main = Main::find($request->id);
        $main->delete();
        return redirect()->back()->withErrors("deleted successfully");
    }
    // add sub to main
    public function add_sub_to_main($id)
    {
        $main = Main::with('subs')
        ->where('id',$id)
        ->first();
        $subs = Sub::all();
        return view('dashboard.business.sub-main',[
            'main' => $main,
            'subs' => $subs
        ]);
    }
    public function delete_main_sub($main_id,$sub_id)
    {
        $main_sub = MainSub::where('main_id',$main_id)->where('sub_id',$sub_id)->delete();
        return redirect()->back();
    }
    ############################
    // sub business
    public function sub_business()
    {
        $subs = Sub::all();
        return view('dashboard.business.sub',[
            'subs' => $subs
        ]);
    }
    // add sub business
    public function add_sub(Request $request)
    {
        $data = [
            'en' => [
                'name' => $request -> name_en,
            ],
            'ar' => [
                'name' => $request -> name_ar,
            ],
        ];
        Sub::create($data);
        return redirect()->back()->withErrors("added successfully");
    }
    // update sub business
    public function update_sub(Request $request)
    {
        $data = [
            'en' => [
                'name' => $request -> name_en,
            ],
            'ar' => [
                'name' => $request -> name_ar,
            ],
        ];
        $sub = Sub::find($request->id);
        $sub->update($data);
        return redirect()->back()->withErrors("updated successfully");
    }
    // deleted sub business
    public function delete_sub(Request $request)
    {
        $sub = Sub::find($request->id);
        $sub->delete();
        return redirect()->back()->withErrors("deleted successfully");
    }
    // save sub to main
    public function save_sub_to_main(Request $request)
    {
        $main = Main::with('subs')->find($request->id);

        $main->subs()->sync($request->subs);
        
        return redirect()->back();
    }
    
}
