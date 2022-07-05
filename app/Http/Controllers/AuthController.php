<?php

namespace App\Http\Controllers;

use App\Mail\VerifyMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use BeyondCode\EmailConfirmation\Traits\AuthenticatesUsers;
use BeyondCode\EmailConfirmation\Traits\RegistersUsers;
use BeyondCode\EmailConfirmation\Traits\SendsPasswordResetEmails;
use App\Models\VerifyUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //this method adds new users
    public function createAccount(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email|unique:users,email',
            'phone' => 'required|string|unique:users,phone|max:255',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::create([
            'email' => $attr['email'],
            'phone' => $attr['phone'],
            'password' => bcrypt($attr['password']),
        ]);

        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => str::random(40)
        ]);
       Mail::to($user->email)->send(new VerifyMail($user));
        if (Mail::failures()) {
            return response()->Fail('Sorry! Please try again latter');
        }
        echo('Great! Successfully send in your mail');
        $this->registered($request, $user);
            return new Response([
                'user' => $user,
                'token' => $user->createToken('tokens')->plainTextToken
            ]);
    } 


    //use this method to signin users
    public function signin(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        //Check email
        $user = User::where('email', $fields['email'])->first();

        //check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        if(!$this->authenticated($request, $user))  {
            return response(
                ['message' => 'authetifiez vous']
            );
        }
        return response($response, 201); 
    } 


    public function profile(Request $request)
    {
        return $request->user();
    }

    // this method signs out users by removing tokens
     public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response()->json(['message' => 'User successfully signed out']);
    }


    protected function registered(Request $request, $user)
    {
        $this->logout($request);
        return('We sent you an activation code. Check your email and click on the link to verify.');
    }


     public function verifyUser($token)
     {
         $verifyUser = VerifyUser::where('token', $token)->first();
         if(isset($verifyUser) ){
             $user = $verifyUser->user;
             if(!$user->verified) {
                 $verifyUser->user->verified = 1;
                 $verifyUser->user->save();
                 $status = "Your e-mail is verified. You can now login.";
             }else{
                 $status = "Your e-mail is already verified. You can now login.";
             }
         }else{
             return with('warning', "Sorry your email cannot be identified.");
         }
         echo('votre email a été verified');
         return $status;
     }
     public function authenticated(Request $request, $user)
     {
         if (!$user->verified) {
             auth()->logout($request);
             return false;
         }
         return true;
     }
     
}
