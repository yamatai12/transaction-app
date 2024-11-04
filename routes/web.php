<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB; // DBファサードをインポート
use App\Models\Account;
use App\Models\TradingHistory;

Route::get('/', function () {
    $amount = 1000;

    try {
        // トランザクションを開始
        DB::transaction(function () use ($amount) {
            $sender = Account::where('id', 1)->first();
            $receiver = Account::where('id', 2)->first();

            // 残高の更新
            $sender->balance -= $amount;
            $receiver->balance += $amount;

            // 更新を保存
            $sender->save();
            throw new \Exception();
            $receiver->save();

            // 取引履歴の作成
            TradingHistory::create([
                'sender_id' => $sender->id,
                'receiver_id' => $receiver->id,
                'trading_amount' => $amount,
            ]);
        });
    } catch (\Exception $e) {
        // トランザクションが失敗した場合の処理
    }

    return view('welcome');
});
