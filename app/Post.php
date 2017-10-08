<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'title', 'content'
    ];

    public function comments ()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
