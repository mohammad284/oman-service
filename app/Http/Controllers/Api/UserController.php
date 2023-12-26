<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\User;
use App\Models\Gallery;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Validator;
use Image;
class UserController extends Controller
{
    // get user from jwt token 
    public function user($token){
        $user = JWTAuth::authenticate($token);
        return $user;
    }
    public function images($request){
        $user = $this->user($request->token);
        if($request->file('image')){
            $path = 'images/gallery/';
            $files=$request->file('image');

            foreach($files as $file) {
                $input['image'] = $file->getClientOriginalName();
                $destinationPath = 'images/gallery/';

                $img = Image::make($file->getRealPath());
                $img->resize(800, 750, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path.$input['image']);
                $name = $path.$input['image'];
                Gallery::insert( [
                    'image'=>  $name,
                    'provider_id'=> $user->id,
                ]);
            }
        }
    }
    // upload provider files
    public function uploadFile(Request $request)
    {
        $user = $this->user($request->token);
        if($request->hasFile('file')){
            
            $file=$request->file('file');
            $input['file'] = $file->getClientOriginalName();
            $path = 'files';
            $path=$file->storeAs($path.'/'.time(),$input['file']);
            $name = $path;
           $data['file'] =  $name;
        }else{
            return response()->json();
        }
        Certificate::insert( [
            'certificate' => $data['file'],
            'provider_id' => $user->id,
            'type' => $request->type, // 1 : CR , 2 : Professional certificate
        ]);
        return response()->json([
            'details' => 'added successfully',
        ]);
    }
    // deleted files 
    public function deleteFile(Request $request)
    {
        $user = $this->user($request->token);
        $file = Certificate::where('provider_id',$user->id)->where('id',$request->id)->delete();
        return response()->json([
            'details' => 'deleted successfully',
        ]);
    }
    // upload provider gallery 
    public function uploadGallery(Request $request)
    {
        $image = $this->images($request);
        return response()->json([
            'details' => 'added successfully',
        ]);
    }
    // delete image from gallery 
    public function deleteImage(Request $request){
        $user = $this->user($request->token);
        Gallery::where('id',$request->id)->where('provider_id',$user->id)->delete();
        return response()->json([
            'details' => 'deleted successfully',
        ]);
    }
    // edit profile
    public function myProfile(Request $request)
    {
        $user = $this->user($request->token);
        $user = User::with('mains','gallery','certificates')->find($user->id);
        return response()->json([
            'details' => $user
        ]);
    }
    // Edit profile 
    public function editProfile(Request $request)
    {
        $user = $this->user($request->token);
        $user = User::with('mains','gallery','certificates')->find($user->id);

        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone'      => ['required', 'unique:users,phone,'.$user->id],
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user->update([
            'first_name' => $request['first_name'],
            'last_name'  => $request['last_name'],
            'email'      => $request['email'],
            'phone'      => $request['phone'],
            'address'    => $request->address,
        ]);
        return response()->json([
            'details' => $user
        ]);
    }
    // update password 
    public function updatePassword(Request $request){
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password'   => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = JWTAuth::authenticate($request->token);
        $hashedPassword = $user->password;
        if (\Hash::check($request->old_password , $hashedPassword )) {
            $user->password = bcrypt($request->password);
            User::where( 'id' , $user->id)->update( array( 'password' =>  $user->password));
            return response()->json([
                'details' => 'password updated successfully',
                'status' => 200
            ],200);
        }else{
            return response()->json(['error' => 'old password doesnt matched','status' => 202], 202);
            
        }
    }
    // forget password
    public function forgetPassword() {
        $credentials = request()->validate(['email' => 'required|email']);
        $user = User::where('email',$credentials['email'])->first();
        if($user ==null){
            return response()->json('Email is not registered');
        }
        Password::sendResetLink($credentials);
        return response()->json(["msg" => 'Reset password link sent on your email id.']);
    }
}
