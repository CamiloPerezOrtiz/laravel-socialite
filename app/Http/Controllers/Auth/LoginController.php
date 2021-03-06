<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Socialite;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        $facebook = Socialite::driver('facebook')->user();
        $find = User::whereEmail($facebook->email)->first();
        if($find){
            \Auth::login($find);
            return redirect('/home');
        }
        else{
            $user = new User;
            $user->name = $facebook->name;    
            $user->email = $facebook->email;
            $user->password = bcrypt(12345678);
            $user->save();;
            return redirect('/');
        }
    }

    public function googleRedirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleHandleProviderCallback()
    {
        $google = Socialite::driver('google')->user();
        
        $find = User::whereEmail($google->email)->first();
        if($find){
            \Auth::login($find);
            return redirect('/home');
        }
        else{
            $user = new User;
            $user->name = $google->name;    
            $user->email = $google->email;
            $user->password = bcrypt(12345678);
            $user->save();;
            return redirect('/');
        }
        
    }
}
