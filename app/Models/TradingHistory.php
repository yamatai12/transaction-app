<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TradingHistory extends Model
{
    protected $fillable = ['sender_id', 'receiver_id', 'trading_amount'];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
