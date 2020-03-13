<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Challenge;

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
    use AuthenticatesUsers {
        logout as performLogout;
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->isAdmin()) { // do your magic here
            // $challenges = Challenge::all();
            // return view('/challenge_dashboard', ['challenges' => $challenges], ['status' => 'allStatus']);
            session()->flash('loginMessage', 'Admin');
            return redirect('/welcome');
        } elseif ($user->isGuest()) { // do your magic here
            return view('guest');
        } elseif ($user->isParticipant() ) {
            // $challenges = Challenge::where('status', 'ongoing')
            //     ->orderBy('id', 'desc')
            //     ->take(10)
            //     ->get();
            // return view('challenge_dashboard', ['challenges' => $challenges], ['status' => 'ongoing']);
            session()->flash('loginMessage', 'Participant');
            return redirect('/welcome');
        } elseif ($user->isOrganizer()) {
            // $challenges = Challenge::where('status', 'ongoing')
            //     ->orderBy('id', 'desc')
            //     ->take(10)
            //     ->get();
            // return view('challenge_dashboard', ['challenges' => $challenges], ['status' => 'ongoing']);
            session()->flash('loginMessage', 'Orginazer');
            return redirect('/welcome');
        }

        return redirect('/welcome');
    }
    /**
     * 
     * 
     */
    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect()->route('login');
    }
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
        $this->middleware('guest')->except('logout');
    }
}
