<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Notifications\UserRegisteredNotification;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

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
    protected $redirectTo = '/';

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
        $data["email"] = $_POST["email"] = $data["number"]."@student.uma.pt";
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users' ]
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
        $_POST["password"] = substr(sha1(rand()), 0, 10);
        return User::create([
            'name' => 'Aluno '.$data["number"],
            'email' => $_POST["email"],
            'password' => Hash::make($_POST['password']),
            'userType' => 2,
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }    

    protected function registered(Request $request, $user) {
        $data = array('email' => $_POST["email"], 'password' => $_POST["password"]);
        \Mail::send('mail.register', $data, function ($message) {

            $message->from('noreply@umabnb.pt', 'UMaBnB');
    
            $message->to($_POST["email"])->subject('Bem vindo ao UMaBnB!');
    
        });
    }
}
