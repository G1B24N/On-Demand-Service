<?php

namespace App\Http\Controllers\Auth;

// use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
    // protected $redirectTo = '/home';
    
    // protected $redirectTo = '/dashboard_seller';{
    // //     if(Auth::user()->role == 'seller')
    // // }
        
    
    public function redirectTo()
    {
        switch(Auth::user()->role){
            case 'customer':
                return "home";
            return $this->redirectTo;
                break;
            case 'Seller':
                // return "dashboard_seller";
                $this->redirectTo = '/dashboard_seller';
                return $this->redirectTo;
                break;
            case 'Driver':
                // return "dashboard_seller";
                $this->redirectTo = '/dashboard_driver';
                return $this->redirectTo;
                break;
            case 'admin':
                // return "dashboard_seller";
                $this->redirectTo = '/dashboard_admin.dashboard';
                return $this->redirectTo;
                break;
            // default:
            //     $this->redirectTo = '/login';
            //     return $this->redirectTo;  
            return $next($request);  
        }
         
        // return $next($request);
    } 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function logout(Request $request) 
    {
        Auth::logout();
        return redirect('/login');
    }
}

    
