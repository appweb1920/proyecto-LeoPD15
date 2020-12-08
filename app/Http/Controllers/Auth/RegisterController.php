<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo;


    protected function validator(array $data)
    {   
        
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'rol' => ['required', 'string', 'max:255'],
        ]);
    }

    protected function create(array $data)
    {
        
        if(Auth::user()->rol == 'administrador'){
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'rol' => $data['rol'],
            ]);

        }
        return Auth::user();
        
    }

    public function redirectTo(Type $var = null)
    {
        $redirectTo = '/inicio';
        return $redirectTo;
    }
}
