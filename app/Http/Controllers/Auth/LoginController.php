<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

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

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);
        if($this->guard()->user()->user_type == 1)
        {
            $this->redirectTo = '/admin/home';
        }
        else if($this->guard()->user()->user_type == 2)
        {
            $this->redirectTo = '/mufti/home';
        }
        else if($this->guard()->user()->user_type == 3)
        {
            $this->redirectTo = '/users/home';
        }
        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($this->redirectPath());
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($service)
    {
        session(['userRequestData' => $service]);

        return Socialite::driver($service)->redirect();

    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $platform = session("userRequestData");

        $login_user = Socialite::driver($platform)->user();

        $user = $this->userFindOrCreate($login_user);
        Auth::login($user, true);

        return redirect($this->redirectTo);

    }

    public function userFindOrCreate($login_user){


        $user = User::where('provider_id',$login_user->id)->first();

        if(!$user){
            $user = new User;
            $user->name = $login_user->getName();
            $user->username = $login_user->getName();
            $user->email = $login_user->getEmail();
            $user->provider_id = $login_user->getid();
            $user->email_verified_at = Carbon::now('Asia/Karachi');
            $user->save();
            $user->assignRole('user');
        }

        return $user;
    }
}
