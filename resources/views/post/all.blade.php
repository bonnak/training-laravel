@extends('_layouts.master')

@section('content')
    <ul class="list-group">
        @foreach($posts as $post)
          <li class="list-group-item">
            <a href="{{ route('post.show', [ 'id' => $post->id ]) }}">{{ $post->title }}</a>
            <div class="d-flex">
                @if(Gate::allows('post-update'))
                <a class="btn btn-primary" href="{{ route('post.edit', [ 'id' => $post->id ]) }}">Edit</a>
                @endif

                @if(Gate::allows('post-delete'))
                <form method="post" action="{{ route('post.delete', [ 'id' => $post->id ])}}">
                    {!! csrf_field() !!}
                    {!! method_field('delete') !!}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                @endif
            </div>
          </li>
        @endforeach
    </ul>
@stop