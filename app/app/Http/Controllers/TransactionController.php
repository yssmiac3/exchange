<?php
namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;

class TransactionController extends Controller
{
    public function index() {
        $data = [];
        foreach (Transaction::all() as $transaction) {
            $data[] = [
                'id' => $transaction->id,
                'user_id' => $transaction->user_id,
                'name' => User::find($transaction->user_id)->name,
                'converted_from' => $transaction->converted_from,
                'converted_to' => $transaction->converted_to,
                'date' => $transaction->created_at
            ];
        }
        $params['transactions'] = $data;
        return view('history.index', $params);
    }
}
