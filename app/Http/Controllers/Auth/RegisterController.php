<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        return User::create([
            'name' => $data['firstname'],
            'last_name' => $data['lastname'],
            'email' => $data['email'],
            'fax' => $data['fax'],
            'mobile_number' => $data['telephone'],
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make($data['pass']),
        ]);
    }

    public function register_client_user(Request $request)
    {
        $validator = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email'     => 'required|unique:users,email',
            'telephone' =>  'required|min:10|max:12',
            'fax' =>  'required',
            'pass'  => 'required|min:8',
        ]);

        $user = $this->create($validator);

        if (Auth::attempt(['email' => $validator['email'], 'password' => $validator['pass']])) {

            $redirect_to = request()->input('redirect_to', '');

            // cart product cookies_to_database
            CartController::cookies_to_database();

            if ($redirect_to != '') {
                return redirect($redirect_to);
            } else {
                return redirect()->route('home.index');
            }
        } else {
            return back()->withInput(request()->only('email', 'name', 'mobile_number'))->with('error', 'Something  went wrong');
        }
    }
}
