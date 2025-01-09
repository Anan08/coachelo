<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function show(Game $id) {
        return view('games');
    }

    public function add_game(Request $request) {
        $request->validate([
            'game_name' => 'required',
            'game_img' => 'required'
        ]);

        // dd(session()->get('id'));
        if ($request->hasFile('game_img')) {
            $filepath = $request->file('game_img')->store('game_img', 'public');
            
            // dd($filepath);
            
            Game::create([
                'game_name' => $request->input('game_name'),
                'game_image' => $filepath
            ]);


            return redirect('/add-game')->with('success', 'Game Successfully Added');
        } else {
            return redirect('/add-game')->with('error', 'Game Cannot be Added');
        }

    }
    


}
