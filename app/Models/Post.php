<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'body', 'image', 'user_id', 'category', 'type', 'section',
        'price', 'meta_title', 'meta_description', 'meta_keywords', 'slug', 'username',
    ];

    protected $attributes = [
        'section' => 'development',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected static function booted()
    {
        static::addGlobalScope('development', function (Builder $builder) {
            $builder->where('section', 'development');
        });
    }
}
