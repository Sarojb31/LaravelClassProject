<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Admin;


class AdminLoginController extends Controller
{

	/*

    |--------------------------------------------------------------------------

    | AdminLoginController

    |--------------------------------------------------------------------------

    |

    | This controller handles authenticating admins for the application and

    | redirecting them to AdminDAshboard screen. The controller uses a trait

    | to conveniently provide its functionality to your applications.

    |

    */



    use AuthenticatesUsers;

    protected $guard='admin';

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function ashowLoginForm()

    {

        return view('auth.adminLogin');

    }


    public function alogin(Request $request)

    {
        // Validate the form data
         $this->validate($request, [
         'email' => 'required|email',
         'password' => 'required|min:6'
         ]);


        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

           // if successful, then redirect to their intended location
             return redirect()->intended(route('admin.dashboard'));

        }

 

        return back()->withErrors(['email' => 'Email or password are wrong.']);

    }

        public function alogout()
     {
     Auth::guard('admin')->logout();
     return redirect('/');
     }
}
