<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Storage;
use Str;

class UserController extends Controller
{
    public function login(Request $req) {
        try {
            $req->validate(
                [
                    'username' => 'required|string',
                    'password' => 'required|string',
                ]
                );
            $userFound = User::where('username', $req->username)->where('password', $req->password)->first();
        //    dd($userFound); 
            if ($userFound) {
                session()->put(
                    [
                        'id' => $userFound['id'],
                        'username' => $userFound['username'],
                        'email' => $userFound['email'],
                        'role' => $userFound['role'],
                        'profile_pic' => $userFound['profile_pic'],
                    ]
                );
                // dd(session()->get('id'));
                return redirect('/')->with('success', 'Login Success');

            } else {
                return redirect('/login')->with('error', 'Invalid username or password');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        
        
    }

    public function logout() {
        session()->flush();
        return redirect('/')->with('logout', 'Logout Success');
        
    }


    public function register(Request $req) {

        $validate = $req->validate([
            'username' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
        ]);
        if ($validate) {
            $username = $req->input('username');
            $password = $req->input('password');
            $email = $req->input('email');
            $name = $req->input('name');

            User::create(
                [
                    'username' => $username,
                    'password' => $password,
                    'email' => $email,
                    'desc' => null,
                    'profile_pic' => 'profile_pic/placeholder.png',
                    'name' => $name,
                    'role' => 'user'
                ]
            );
        };

        return redirect('/')->with('success', 'Account created successfully');
    }
    
    public function index( ) {
        $loggedId = session()->get('id');
        if ($loggedId) {
            $games = Game::get();
            return view('home', ['games' => $games]);
        } else {
            return view('landing'); 
        }
    }

    public function show_profile($id) {
        $user = User::with('coachDetails')->find($id);
        // dd($user);
        return view('profile', ['user' => $user]);
    }

    

    public function update_user(Request $req) {
        $req->validate([
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $loggedId = session()->get('id');
        $user = User::find($loggedId);  

        if ($req->hasFile('profile_pic')) {
            $filepath = $req->file('profile_pic')->store('profile_pic', 'public');

            $user->update([
                'profile_pic' => $filepath,
            ]);

            session()->put([
                'profile_pic' => $filepath,
            ]);

            return redirect()->back();
            
        }

    }

    public function get_orders() {
        $loggedIn = session()->get('id');
        $transaction = Transaction::where('buyer_id', $loggedIn)
        ->with(['buyer', 'coach.user', 'session', 'game'])
        ->get();
        // dd($transaction);
        return view('trolley', ['transactions' => $transaction]);
    }
        
    public function get_user() {
        $users = User::get();
        return view('users', ['users' => $users]);
    }

}
