<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Illuminate\Validation\Validator;


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
    // protected $redirectTo = RouteServiceProvider::HOME;

    // public function authenticated()
    // {
    //     if()
    //     {
    //         return redirect('admin/dashboard');
    //     }
    //
    //     {
    //         return redirect('/home');
    //     }
    //     else
    //     {
    //         return redirect('/');
    //     }
    // }

    protected $redirectTo = 'admin/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if(auth()->attempt(array('username' => $input['username'], 'password' => $input['password'])))
        {
            if (Auth::user()->status == 1 && Auth::user()->is_admin == 1)
            {
                session()->flash('message', 'Welcome Back '. auth::user()->name);
                return redirect('admin/dashboard');
            }
            elseif(Auth::user()->status == 1 && Auth::user()->is_admin == 0 )
            {
                session()->flash('message', 'Welcome Back '. auth::user()->name);
                return redirect('admin/dashboard');
            }
            elseif(Auth::user()->status == 0 ){
                Auth::logout();
                return redirect('login')
                ->with('error','Your account is not Activated! <br>
                Please Contact the Administrator');
            }
            else
            {
                return redirect('/');
            }
        }
        else
        {
            return redirect()->route('login')
                ->with('error','The Auth ID or Password you entered did not match our records. Please double-check and try again.');
        }

    }
}
