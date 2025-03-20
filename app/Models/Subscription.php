<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'plan', 'status'];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Query Scope for Active Subscriptions
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
