<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'body', 'image', 'user_id', 'category', 'section', 'type',
        'price', 'meta_title', 'meta_description', 'meta_keywords', 'slug', 'username',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
