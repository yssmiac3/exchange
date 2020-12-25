<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'currency_from',
      'currency_to',
      'amount_old',
      'amount_new',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getConvertedFromAttribute() {
        return $this->amount_old . ' ' . $this->currency_from;
    }

    public function getConvertedToAttribute() {
        return $this->amount_new . ' ' . $this->currency_to;
    }
}
