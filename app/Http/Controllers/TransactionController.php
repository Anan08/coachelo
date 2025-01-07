<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function buy(Request $req) {

        $validated = $req->validate([
            'amount' => 'required|numeric',
            'coach_id' => 'required|integer',
            'date' => 'required|date',
            'sessions' => 'required|integer',
            'game_id' => 'required|integer',
        ]);

        Transaction::create(
            [
                'amount' => $req->amount,
                'coach_id' => $req->coach_id,
                'session_date' => $req->date,
                'buyer_id' => session()->get('id'),
                'isFinished' => false,
                'isPaid' => false,
                'game_id' => $req->game_id,
                'status' => 'pending',
                'transaction_date' => now(),
                'session_id' => $req->sessions,
            ]
        );
        // $transaction->amount = $req->amount;
        // $transaction->buyer_id = session()->get('id');
        // $transaction->coach_id = $req->coach_id;
        // $transaction->status = 'pending';
        // $transaction->isFinished = false;
        // $transaction->isPaid = false;
        // $transaction->transaction_date = now();
        // $transaction->session_date = $req->date;
        // $transaction->session_id = $req->sessions;
        // $transaction->game_id = $req->game_id;
        // $transaction->save();

        return redirect('/coaches/'.$req->coach_id)->with('success', 'Transaction created successfully');
        
    }

    public function update_status(Request $request) {
        $validated = $request->validate([
            'status' => 'required|in:accepted,declined',
            'id' => 'required'
        ]);

        $transaction = Transaction::findOrFail($validated['id']);
        $transaction->status = $validated['status'];
        $transaction->save();
        return response()->json(['message' => 'Status updated successfully', 'status' => $transaction['status']], 200);

    }
}
