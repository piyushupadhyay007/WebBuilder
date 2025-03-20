<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['order_id','user_id', 'amount', 'status', 'transaction_id'];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
