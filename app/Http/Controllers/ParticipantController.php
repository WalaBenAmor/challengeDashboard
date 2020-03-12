<?php

namespace App\Http\Controllers;

use App\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Guest;
use App\Challenge;
use Session;
use Illuminate\Support\Facades\Auth;


class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "Participant controller";
        return $data = Participant::find(1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "Create Participant function";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        echo "Store Participant function";
        try {
            // print_r($request->input());
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');
            // print_r($name);
            // Log::info($name);
            // Log::info($email);
            // Log::info($password);
            // echo DB::insert('INSERT INTO users(id, name, email, password) VALUES (?,?,?,?)',[null,$name,$email,$password]);
            $user = new User();
            $user->password = Hash::make($password);
            //$user->password = $password;
            $user->email = $email;
            $user->name = $name;
            $user->type =  'Guest';
            $user->save();
            // Creates a new Child instance 
            //$child = new Guest(['name' => 'mei']);

            // effectively sets $child->parent_id to 2 then saves the instance to the DB
            // $user->children()->save($child);
            return redirect('/login');
        } catch (\Illuminate\Database\QueryException $ex) {
            //dd($ex->getMessage());
            return redirect()->back()->withErrors([$ex->getMessage()]);
            // Note any method of class PDOException can be called on $ex.
        }
    }
    public function logs(Request $request)
    {
        echo "Login Participant function";
        // print_r($request->input());
        $email = $request->input('email');
        $password = $request->input('password');
        //$password = Hash::make($password);
        // print_r($email);
        // print_r($password);


        $user = User::where('email', '=', $email)->first();
        if (!$user) {
            // return response()->json(['success' => false, 'message' => 'Login Fail, please check email id']);

            return redirect()->back()->withErrors(["Login Fail, please check email id"]);
        }
        if (!Hash::check($password, $user->password)) {
            //return response()->json(['success' => false, 'message' => 'Login Fail, pls check password']);
            return redirect()->back()->withErrors(['Login Fail, pls check password']);
        }
        if ($user->type == 'Guest') {
            //return response()->json(['success' => true, 'message' => 'Your account is not active , Please wait for admin approval!', 'data' => $user]);
            session()->flash('message', 'Your account is not active , Please wait for admin approval!');
            return redirect()->back();
            //return redirect()->back()->with(['success', 'Your account is not active , Please wait for admin approval!']);
        }
        if ($user->type == 'Orginazer') {
            return redirect()->to('/create_challenge');
        }
        // return response()->json(['success'=>true,'message'=>'success', 'data' => $user]);
        if ($user->type == 'Participant') {
            $challenges = Challenge::where('status', 'ongoing')
                ->orderBy('id', 'desc')
                ->take(10)
                ->get();
            //return view('games', $challenges);
            return redirect()->to('/all_challenge')->with('data', $challenges);
        }
        // return redirect('/challenge_dashboard');

        // $user = User::where('email',  $email)
        //     ->where('password', $password)
        //     ->first();
        // if ($user === null) {
        //     return "user not found";
        // } else {
        //     $validCredentials = Hash::check($password, $user->getAuthPassword());

        //     if ($validCredentials) {
        //         return $user;
        //     }
        // }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participant $participant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        //
    }


    function doLogout()
    {
        Auth::logout(); // logging out user
        return redirect()->to('login'); // redirection to login screen
    }


    protected function guard()
    {
        return Auth::guard('guard-name');
    }
}
