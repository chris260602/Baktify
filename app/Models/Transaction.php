<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['address', 'user_id', 'totalItem'];
    public function TransactionDetail()
    {
        return $this->belongsTo(TransactionDetail::class);
    }
}
