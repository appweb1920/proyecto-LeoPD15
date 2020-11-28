<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo;

    public function username(Type $var = null)
    {
        return 'name';
    }

    public function redirectTo(Type $var = null)
    {
        $user = Auth::user();
        
        if(is_null($user->rol))
            $redirectTo = '/loginLU';
        else
            $redirectTo = '/inicio';
        return $redirectTo;
    }


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    
}
