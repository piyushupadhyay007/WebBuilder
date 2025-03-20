<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MediaLibrary extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'file_path', 'file_type'];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
