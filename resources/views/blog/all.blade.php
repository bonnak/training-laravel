@extends('_layouts.master')

@section('content')
    <ul class="list-group">
        @foreach($blogs as $blog)
          <li class="list-group-item">
            {{ $blog->title }}
            <div>
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