<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    
    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Override the login method to check against admins table first
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // Check if login is rate limited
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        // First check if the user exists in the admins table
        $admin = DB::table('admins')->where('email', $request->email)->first();
        
        if ($admin && Hash::check($request->password, $admin->password)) {
            // Admin login is successful - create a session
            Auth::loginUsingId($admin->id);
            
            return redirect('/dashboard');
        }

        // If not an admin, try the regular user authentication
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // Increment failed login attempts
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Handle where to redirect users after login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        // Check if this admin exists in the admins table
        $isAdmin = DB::table('admins')->where('email', $user->email)->exists();
        
        if ($isAdmin) {
            return redirect('/dashboard');
        }
        
        return redirect('/');
    }
}