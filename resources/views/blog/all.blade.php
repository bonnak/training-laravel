@extends('_layouts.master')

@section('content')
    <ul class="list-group">
        @foreach($blogs as $blog)
          <li class="list-group-item">
            <a href="{{ route('blog.show', [ 'id' => $blog->id ]) }}">{{ $blog->title }}</a>
            <div>
                <a class="btn btn-primary" href="{{ route('blog.edit', [ 'id' => $blog->id ]) }}">Edit</a>
                <form method="post" action="{{ route('blog.delete', [ 'id' => $blog->id ])}}">
                    {!! csrf_field() !!}
                    {!! method_field('delete') !!}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
          </li>
        @endforeach
    </ul>
@stop