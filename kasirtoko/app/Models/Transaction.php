<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\TransactionDetail;

class Transaction extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the transaction.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the transaction detail for the transaction.
     */
    public function transaction_detail()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
