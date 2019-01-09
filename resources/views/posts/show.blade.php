@extends('layouts.app') 
@section('content')
<h1>{{$post->title}}</h1>
<img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}" alt="{{$post->cover_image}}">
<div>
    {{$post->body}}
</div>
@if (!Auth::Guest())
@if (Auth::user()->id == $post->user_id)
    <a href="/posts/{{ $post->id }}/edit" class="btn btn-secondary">Edit</a>
    <form action="/posts/{{ $post->id }}" method="POST" class="float-right">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" class="btn btn-danger" value="Delete Post">
    </form>
@endif
<br>
@else
Login To comment
@endif

@endsection