<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/biodata/create';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'name' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:users',
            // 'password' => 'required|string|min:6|confirmed',
            'email' => 'required',
            'password' => 'required',
            'name' => 'required',
            'role'      => '',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // return $data;

        // return User::create([
        //     'username'  => $data['name'],
        //     'email'     => $data['email'],
        //     'role'      => 'user',
        //     'password'  => bcrypt($data['password']),
        // ]);

        $user = new User;
        $user->username     = $data['name'];
        $user->email        = $data['email'];
        $user->password     = bcrypt($data['password']);
        $user->role         = 'user';
        $user->save();

        return $user;
    }

    public function showRegistrationForm() 
    {
        return view('auth.register');
    }
}
