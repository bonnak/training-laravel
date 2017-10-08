<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class PostController extends Controller
{
    public function index ()
    {
        $posts = Post::all();

        return view('post.all', compact('posts'));
    }

    public function show ($id)
    {
        $post = Post::with('comments')->find($id);
        // $comments = Comment::where('post_id', $post->id)->get();

        return view('Post.show', compact('post'));
        // return view('post.show', [
        //     'post' => $post,
        //     'comments' => $comments,
        // ]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $post = Post::create([
            'user_id' => auth()->user()->id,
            'title' => request()->title,
            'content' => request()->content,
        ]);

        return redirect()->route('post.show', [ 'id' => $post->id ]);
    }

    public function edit ($id)
    {
        $post = Post::find($id);

        return view('post.edit', [ 'post' => $post ]);
    }

    public function update ($id)
    {
        $post = Post::find($id);
        $post->title = request()->title;
        $post->content = request()->content;
        $post->save();

        return redirect()->route('post.show', [ 'id' => $post->id ]);
    }

    public function destroy ($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->back();
    }
}
