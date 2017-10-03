<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Blog extends Model
{
    protected $fillable = [
        'user_id', 'title', 'content'
    ];

    public function comments ()
    {
        return $this->hasMany(Comment::class, 'blog_id', 'id');
    }
}
