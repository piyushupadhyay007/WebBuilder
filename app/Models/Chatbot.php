<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chatbot extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'messages'];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
