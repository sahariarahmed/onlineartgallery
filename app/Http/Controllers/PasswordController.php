<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
    public function send(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'mail'=>'required'
        ]);
        if (User::where('email',$request->mail)->exists()) {
            Mail::to($request->mail)->send(new ForgotPasswordMail($request));
            return redirect()->back()->with('email','An email has sent to your email');
        }
        else
        {
            return redirect()->back()->with('email','Email address invalid');
        }
    }

    public function resetView($token, $mail)
    {
        return view('auth.reset_password',compact('token','mail'));
    }

    public function resetPassword()
    {
        $user = User::whereEmail(request()->mail)->first();
        $user->update([
            'password'=>bcrypt(request()->password)
        ]);
        return redirect()->route('login')->with('reg','Password changed successfully. ');
    }
}
