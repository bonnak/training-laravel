<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    public function index ()
    {
        $blogs = Blog::all();

        return view('blog.all', compact('blogs'));
    }

    public function show ($id)
    {
        $blog = Blog::find($id);

        return view('blog.show', compact('blog'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store()
    {
        $blog = Blog::create([
            'user_id' => auth()->user()->id,
            'title' => request()->title,
            'content' => request()->content,
        ]);

        return redirect()->route('blog.show', [ 'id' => $blog->id ]);
    }

    public function edit ($id)
    {
        $blog = Blog::find($id);

        return view('blog.edit', [ 'blog' => $blog ]);
    }

    public function update ($id)
    {
        $blog = Blog::find($id);
        $blog->title = request()->title;
        $blog->content = request()->content;
        $blog->save();

        return redirect()->route('blog.show', [ 'id' => $blog->id ]);
    }

    public function destroy ($id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        return redirect()->back();
    }
}
