<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Certificate;
use Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // users 
    public function users()
    {
        $users = User::where('type','user')->get();
        return view('dashboard.users.users',[
            'users' => $users
        ]);
    }

    ######################
    // providers
    public function providers()
    {
        $providers = User::where('type','provider')->where('status','1')
        ->latest()->paginate(10);
        return view('dashboard.providers.providers',[
            'providers' => $providers
        ]);
    }
    // provider Details
    public function providerDetails($id)
    {
        $provider = User::with('mains','gallery','certificates')->where('id',$id)->first();
        // return $provider ;
        return view('dashboard.providers.details-provider',[
            'provider' => $provider
        ]);
    }
    // Providers Request 
    public function providersRequest()
    {
        $providers = User::with('mains')->where('type','provider')->where('status','0')
        ->latest()->paginate(10);
        return view('dashboard.providers.request-providers',[
            'providers' => $providers
        ]);
    }
    // providersBlock
    public function providersBlock()
    {
        $providers = User::where('type','provider')->where('status','2')
        ->latest()->paginate(10);

        return view('dashboard.providers.block-providers',[
            'providers' => $providers
        ]);
    }

    // download files
    public function downloadFile($id)
    {
        $certificate_path = Certificate::find($id);
        $filePath = public_path($certificate_path->certificate);
        $headers = ['Content-Type: application/pdf'];
        $fileName = time().'.pdf';

        return response()->download($filePath, $fileName, $headers);
    }
    // providerAccept
    public function providerAccept(Request $request)
    {
        $provider = User::with('mains')->find($request->id);
        $provider->mains()->sync($request->license);
        $provider->update(['status'=>1]);
        return redirect()->back()->withErrors("accepted successfully");
    }
    
}
