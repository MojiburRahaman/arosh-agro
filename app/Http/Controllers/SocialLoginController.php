<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Facades\Auth;

class SocialLoginController extends Controller
{
    public function GoogleRegister()
    {
        return Socialite::driver('google')->redirect();
    }
    public function GoogleLogin()
    {
        return Socialite::driver('google')->redirect();
    }
    public function GoogleCallbackUrlRegister()
    {
        $user_detail = Socialite::driver('google')->user();
        $users =   User::where('email', $user_detail->getEmail())->first();
        if ($users == '') {
            $user = new User();
            $user->name = $user_detail->getName();
            $user->email = $user_detail->getEmail();
            $user->email_verified_at = now();
            $user->password = bcrypt($user_detail->getEmail() . now());
            $user->save();


            $newsletter = new Newsletter;
            $newsletter->email = $user_detail->getEmail();
            $newsletter->save();

            $user->assignrole('Customer');
            Auth::login($user);

            return redirect('/');
        } else {
            Auth::login($users);
            return redirect('/');
        }
    }
}
