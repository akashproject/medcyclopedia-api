<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Cookie;


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
    protected $redirectTo = '/';

    protected $myAttempts ;
    protected function redirectPath()
    {
        if (Auth::user()->hasAnyRole(['Administrator'])) {
            return 'admin/dashboard';
        }else{
            return 'home';
        }
    }
    protected function validateLogin(Request $request)
    {


        session()->put('login.attempts', $this->limiter()->attempts($this->throttleKey($request)));

		$arr = [
			$this->username() => 'required',
			'password' => 'required',
			'g-recaptcha-response' => 'required|recaptcha'
		];


        $this->validate($request, $arr);
    }

   /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated($request, $user)
    {

        if (Auth::user()->hasAnyRole(['Administrator'])) {
           return redirect('admin/dashboard');
        }else{
            return redirect('/home');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('guest')->except('logout');
        //$this->myAttempts = $this->limiter()->attempts($this->throttleKey($request));

    }

     protected function sendLoginResponse(Request $request) {
     $customRememberMeTimeInMinutes = 300;
     $rememberTokenCookieKey = Auth::getRecallerName();
     Cookie::queue($rememberTokenCookieKey, Cookie::get($rememberTokenCookieKey), $customRememberMeTimeInMinutes);
     $request->session()->regenerate();
     $this->clearLoginAttempts($request);
     session()->forget('login.attempts'); // clear attempts

     return $this->authenticated($request, $this->guard()->user())
         ?: redirect()->intended($this->redirectTo());
     }


     public function logout () {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/');
    }

}
