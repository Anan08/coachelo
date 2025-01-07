<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\CoachDetail;
use App\Models\Game;
use App\Models\Session;
use App\Models\Transaction;
use App\Models\User;
use Error;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function store_cv(Request $request) {
        try {

            $validated = $request->validate([
                'tags' => 'required|int',
                'cv' => 'required|mimes:pdf,docx,doc|max:2048',
            ]);

            // dd(session()->get('id'));
            if ($request->hasFile('cv')) {
                $filepath = $request->file('cv')->store('cvs', 'public');
                
                $model = CoachDetail::create([
                    'game_id' => $validated['tags'],
                    'user_id' => session()->get('id'), // Use authenticated user ID
                    'desc' => 'Default description',
                    'price' => 0,
                    'cv' => $filepath,
                    'status' => 'unverified',
                ]);

                User::where('id', session()->get('id'))->update(['role' => 'coach']);
                session()->put('role', 'coach'); 

                // dd($model);
        
                return back()->with('success', 'CV submitted successfully!');
            }
        
            return back()->with('error', 'Error submitting CV');
           
        } catch (Error $e) {
            \Log::error('Error : ', $e);
        }
    }

    public function get_applicances() {
        $applicances = CoachDetail::with('user')->get();
        // dd($applicances);
        return view('applicances', ['applicances' => $applicances]);
    }
    

    public function update_status(Request $request, $id) {
        $validated = $request->validate([
            'status' => 'required|in:verified,unverified'
        ]);

        $coach = CoachDetail::findOrFail($id);
        $coach->status = $validated['status'];
        $coach->save();


        return response()->json(['message' => 'Status updated successfully', 'status' => $coach->status], 200);
    }

    public function show($game_id) {
        $coaches = CoachDetail::with('user')->where('game_id', $game_id)->where('status', 'verified')->get();
        // $coaches = Coach::where('game_id', $game_id)->where('status', 'verified')->get();
        return view('games', ['coaches' => $coaches]);
}

    public function get_profile($coach_id) {
        $coach = CoachDetail::with('user')->where('id', $coach_id)->first();
        $sessions = Session::all(); 
        $game = Game::where('id', $coach->game_id)->first();
        return view('desc', ['coach' => $coach, 'sessions' => $sessions, 'game' => $game]);
    }

    public function update_coach(Request $req) {
        $req->validate([
            'profile_pic' => 'image|mimes:jpeg,png,jpg',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        $loggedId = session()->get('id');
        $user = User::find($loggedId);  
        // return dd($user);


        if ($req->hasFile('profile_pic')) {
            $filepath = $req->file('profile_pic')->store('profile_pic', 'public');

            $user->update([
                'profile_pic' => $filepath,
            ]);

            session()->put([
                'profile_pic' => $filepath,
            ]);
            
        }

        $CoachDetail = CoachDetail::where('user_id', $loggedId)->first();
        if ($CoachDetail) {
            $CoachDetail->update([
                'price' => $req->price,
                'desc' => $req->description,
            ]);
        }

        return redirect()->back();

    }


    function check_orders() {
        $loggedIn = session()->get('id');
        $transaction = Transaction::where('coach_id', $loggedIn)
        ->with(['buyer', 'coach.user', 'session', 'game'])
        ->get();
        // dd($transaction);
        return view('orders', ['transactions' => $transaction]);
    }
    
}
