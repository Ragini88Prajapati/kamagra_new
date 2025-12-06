<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

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

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
    }

    function show_login_form()
    {
        $cart_data = CartController::get_cart_details();
        $data['cart_data']=$cart_data;

        if (Auth::check()) {
            return redirect()->route('home.index');
        } else {
            return view('client2.login',$data);
        }
    }


    function login_client($postdata =  array())
    {

        $validator = request()->validate([
            'email'     => 'required',
            'password'  => 'required|min:8',
        ]);

        if (Auth::attempt(['email' => $validator['email'], 'password' => $validator['password']])) {

            $redirect_to = request()->input('redirect_to', '');

            // cart product cookies_to_database
            CartController::cookies_to_database();

            if ($redirect_to != '') {
                return redirect($redirect_to);
            } else {
                return redirect()->route('home.index');
            }
        } else {
            return back()->withInput(request()->only('email', 'remember'))->with('error', 'Email id or password incorrect');
        }
    }
    function ajax_login_client(Request $request)
    {
        // print_r(Auth::user());exit;
        $validator = request()->validate([
            'email'     => 'required',
            'password'  => 'required|min:8',
        ]);
        
        if (Auth::attempt(['email' => $validator['email'], 'password' => $validator['password']])) {
            
            $redirect_to = request()->input('redirect_to', '');

            // cart product cookies_to_database
            CartController::cookies_to_database();

            if ($redirect_to != '') {
                return redirect($redirect_to);
            } else {
                return redirect(route('home.checkout_form'));
                // echo '1';exit;
            }
        } else {
            return redirect(route('home.checkout_form'));
            // echo '2';exit;
        }
    }

    function admin_show_login_form(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        } else {
            return view('admin.login');
        }
    }

    function admin_login_user(Request $request)
    {
        $validator = $request->validate([
            'email'     => 'required',
            'password'  => 'required|min:6',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->route('admin.dashboard');
        } else {
            return back()->withInput($request->only('email', 'remember'));
        }
    }
}
