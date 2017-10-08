<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function index ()
    {
        return Comment::with('post')->get();
    }

    public function store($post_id)
    {
        Comment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post_id,
            'body' => request()->body,
        ]);

        return redirect()->back();
    }
}
