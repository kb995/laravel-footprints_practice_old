<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use App\Models\Day;
use App\Models\Log;
use App\User;


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
    protected function redirectTo() {
        // 普通にlogsメソッドにすればいいのでは
        $user = User::find(Auth::id());
        $day = $user->day()->orderBy('created_at', 'desc')->first();
        $logs = $day->logs()->get();

        return route('logs', compact('day', 'logs'));
     }
    protected function loggedOut(\Illuminate\Http\Request $request)
    {
        return redirect()->route('login');
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
}
