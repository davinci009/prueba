<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description'
    ];

    public function user() :BelongsToMany
    {
        return $this->belongsToMany(\App\Models\User::class, 'post_users');
    }
}
