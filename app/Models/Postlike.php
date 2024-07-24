<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postlike extends Model
{
    use HasFactory;

    protected $table = 'post_like';

    protected $fillable = [
        'user_id',
        'post_id',
    ];
}
