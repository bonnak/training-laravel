<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function index ()
    {
        return Comment::with('blog')->get();
    }

    public function store($blog_id)
    {
        Comment::create([
            'user_id' => auth()->user()->id,
            'blog_id' => $blog_id,
            'body' => request()->body,
        ]);

        return redirect()->back();
    }
}
