<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'name', 'email', 'phone', 'status'];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
