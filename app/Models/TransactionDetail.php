<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Transaction;

class TransactionDetail extends Model
{
    use HasFactory;

    /**
     * Get the transaction that owns the transaction detail.
     */
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
