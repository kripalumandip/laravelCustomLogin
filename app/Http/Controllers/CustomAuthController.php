<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class CustomAuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }
    public function registration(){
        return view("auth.registration");
    }
    public function registerUser(Request $request)
    {
        $request->validate([
            'email' => "unique:users"
        ]);
        $user = new User();
        $user->name = $request->name; 
        $user->email = $request->email; 
        $user->pass = Hash::make($request->pass);
        $res = $user->save();
        if($res){
            return back()->with('success','You have registered successfully');
        }else{
            return back()->with('fail','Something wrong');
        } 
    }
    public function loginUser(Request $request){
        
        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->pass,$user->pass)){
                $request->session()->put('loginID', $user->id);
                return redirect("dashboard");
            }
            else{
                return back()->with('fail','Password not matching.');
            }
        }else{
            return back()->with('fail','This email is not registered');
        }
    }
    public function dashboard()
    {
        $data = array();
        if(Session::has("loginID")){
            $data = User::where('id','=',Session::get('loginID'))->first();
        }
        return view('dashboard',compact('data'));
    }
    public function logout(){
        if(Session::has("loginID")){
            Session::pull('loginID');
            return redirect('login');
        }
    }
}
