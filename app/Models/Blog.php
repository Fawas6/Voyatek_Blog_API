<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'image',
        'article',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'blog_id', 'id');
    }
}
