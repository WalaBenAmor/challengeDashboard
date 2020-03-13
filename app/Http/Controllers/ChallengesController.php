<?php

namespace App\Http\Controllers;

use App\Challenge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ChallengesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "Wala:challenge:: it's my first laravel project <br>";
        $data = Challenge::find(1);
        if ($data === null) {
            return "No data for this challenge.";
        } else {
            return $data->comments;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }
    /**
     * 
     * 
     */
    public function storeChallenge(Request $request)
    {
        echo "Store Challenge function";
        //  print_r($request->input());
        $user = auth()->user();
        print_r($user);
        $title = $request->input('title');
        $status = $request->input('status');

        $description = $request->input('description');
        $startDate  = $request->input('startDate');
        $finishDate  = $request->input('finishDate');


        $challenge = new Challenge();

        $challenge->title = $title;
        $challenge->status = $status;


        $challenge->description =  $description;
        $challenge->startDate = $startDate;
        $challenge->finishDate =  $finishDate;
        $challenge->organizer_id = $user->id;

        $challenge->save();


        // return response()->json(['success' => true, 'message' => 'A new challenge is created!']);
        // return redirect('/login');
        session()->flash('message', 'A new challenge is added successfully!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * 
     * 
     * 
     */
    public function ongoingChallenges()

    {
        $challenges = Challenge::where('status', 'ongoing')
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();
        return view('challenge_dashboard', ['challenges' => $challenges], ['status' => 'ongoing']);
        //return redirect()->to('/challenge_dashboard')->with('data', $challenges);
    }
    /**
     * 
     * 
     * 
     */
    public function allChallenges()

    {
        $challenges = Challenge::all();
        return view('challenge_dashboard', ['challenges' => $challenges], ['status' => 'allStatus']);
        //return redirect()->to('/challenge_dashboard')->with('data', $challenges);
    }
}
