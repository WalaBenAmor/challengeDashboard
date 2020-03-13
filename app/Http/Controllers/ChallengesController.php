<?php

namespace App\Http\Controllers;

use App\Challenge;
use App\Code;
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
        session()->flash('addChallenge', 'A new challenge is added successfully!');

        return redirect()->back();
    }
    /**
     * 
     * 
     */
    public function editChallenge(Request $request)
    {
        echo "Store Challenge function";
        //  print_r($request->input());
        $user = auth()->user();
        print_r($user);
        $id = $request->input('id');
        $title = $request->input('title');
        $status = $request->input('status');

        $description = $request->input('description');
        $startDate  = $request->input('startDate');
        $finishDate  = $request->input('finishDate');
        $challenge = Challenge::find($id);

        if ($challenge) {
            // $challenge = new Challenge();
            // $challenge->id = $id;
            $challenge->title = $title;
            $challenge->status = $status;


            $challenge->description =  $description;
            $challenge->startDate = $startDate;
            $challenge->finishDate =  $finishDate;
            $challenge->organizer_id = $user->id;

            $challenge->save();


            // return response()->json(['success' => true, 'message' => 'A new challenge is created!']);
            session()->flash('editChallenge', 'A new challenge is edited successfully!');
        }



        return redirect()->back();
    }

    /**
     * 
     * 
     */
    public function submitCode(Request $request)
    {
        echo "Submit code function";
        //  print_r($request->input());
        $user = auth()->user();
        print_r($user);
        $text = $request->input('myCode');
        $challenge_id = $request->input('challenge_id');
        $code = new Code();
        $code->content = $text;
        $code->participant_id = $user->id;
        $code->challenge_id = $challenge_id;
        $code->save();
        session()->flash('submitCode', 'Your code is submitted successfully!');
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
