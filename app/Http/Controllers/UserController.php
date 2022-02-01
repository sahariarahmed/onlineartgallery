<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function regForm(){
        return view('auth.register');
    }

    public function regStore(Request $data){

        $data->validate([
            'name'=>'required',
            'email' => 'email:rfc,dns,strict,filter',
            'password'=>'required',
        ]);

        User::create([
            'name'=>$data->name,
            'email'=>$data->email,
            'password'=>bcrypt($data->password),
        ]);
        return redirect('/login')->with('reg', 'Successfully Registered. ');

    }

    public function login(){
        return view('auth.login');
    }

    public function loginStore(Request $data){

        if (Auth::attempt(['email'=>$data->email, 'password'=>$data->password])){
            if (Auth::user()->status=='block') {
                auth()->logout(Auth::user());
                return redirect()->back()->with('message', 'Sorry, You are blocked 😭');
            }
            if(Auth::user()->role=='admin'){
                return redirect('/admin')->with('admin', 'Admin login success. ');
            }
            else{
                 return redirect('/')->with('login', 'Successfully logged in. ');
            }
        }
        else{
            return redirect()->back()->with('error', 'Sorry, wrong Email or Password. Try Again! ');
        }
    }

    public function logout(){
        Auth::logout(Auth::user());

        return redirect('/')->with('login', 'Successfully logged out. ');
    }


    public function list(){
        $key=null;
        if(request()->search){
            $key=request()->search;
            $data = User::where('name','LIKE','%'.$key.'%')->get();
            return view('pages.users.list', compact('data','key'));
        }

        $data=User::where('role','!=','admin')->paginate(5);
        return view('pages.users.list', compact('data', 'key'));
    }

    public function block($id, Request $req){
        $user = User::where('id',$id);
        $user->update(['status'=>request('status')]);
        return redirect()->back();
    }


}
