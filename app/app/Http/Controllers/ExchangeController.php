<?php

namespace App\Http\Controllers;
use AshAllenDesign\LaravelExchangeRates\Classes\ExchangeRate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\ExchangeRequest;

class ExchangeController extends Controller
{
    public function index() {
        $exchangeRates = new ExchangeRate();
        $params['currencies'] = $exchangeRates->currencies();
        $user = auth()->user();
        $data = $user->wallet;
        $params['users_currencies'] = $user->wallet->pluck('currency');
        $records =[];
        foreach ($data as $item) {
            $records[] = $item->only(['id', 'currency', 'amount', 'updated_at']);
        }
        $params['records'] = $records;

        return view('exchange.index', $params);
    }

    public function doExchange(ExchangeRequest $request) {
        if ($request->amount == 0) {
            return redirect()->back()->with('warning', 'Can`t exchange 0');
        }
        $max = auth()->user()->wallet->where('currency', $request->currency_from)->first()->amount;
        if ($request->amount > $max && $request->amount < 0) {
            return redirect()->back()->with('warning', 'not enough money');
        }
        $user = auth()->user();
        $exchangeRates = new ExchangeRate();
        $result = $exchangeRates->convert($request->amount, $request->currency_from, $request->currency_to, Carbon::now());
        $wallet_from = $user->wallet()->where('currency', $request->currency_from)->first();
        $wallet_from->update([
            'amount' => $wallet_from->amount - $request->amount
        ]);
        if ($wallet_to = $user->wallet()->where('currency', $request->currency_to)->first()) {
            $wallet_to->update([
                'amount' => $wallet_to->amount + $result
            ]);
        }
        else {
            $user->wallet()->create([
               'currency' => $request->currency_to,
               'amount' => $result
            ]);
        }
        if (auth()->user()->transactions()->create([
            'currency_from' => $request->currency_from,
            'amount_old' => (float) $request->amount,
            'currency_to' => $request->currency_to,
            'amount_new' => $result
            ])) {
            return redirect()->route('exchange');

        }
        else return 'warning';
    }
}
