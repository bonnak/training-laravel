@extends('_layouts.master')

@section('content')
    <h3>{{ $post->title }}</h3>
    <p>{{ $post->content }}</p>

    <div class="card">
      <ul class="list-group list-group-flush">
        @foreach($post->comments as $comment)
        <li class="list-group-item">{{ $comment->body }} </li>
        @endforeach
      </ul>
    </div>
    <form method="post" action="{{ route('comment.create', [ 'post_id' => $post->id ]) }}">
          {!! csrf_field() !!}
        <div class="form-group">
          <input type="text" class="form-control" name="body" id="body">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
      </form>
@stop