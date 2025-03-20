<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['website_id', 'title', 'content'];

    // Relationship with Website
    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}
