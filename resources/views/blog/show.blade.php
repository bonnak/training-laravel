@extends('_layouts.master')

@section('content')
    {{ $blog->title }} <br>
    {{ $blog->content }}
@stop