<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table = 'wallet';

    protected $fillable = [
        'currency',
        'amount',
        'customer_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
