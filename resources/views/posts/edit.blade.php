@extends('layouts.app') 
@section('content')
<h3>Edit Post</h3>
<form action="/posts/{{$post->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
        <input type="text" placeholder="Your Title goes here" name="title" value="{{$post->title}}" class="form-control">
    </div>
    <div class="form-group">
        <textarea name="body" cols="30" rows="10" placeholder="Your Post Goes Here" class="form-control">{{$post->body}}</textarea>
    </div>
    <div class="form-group">
        <input type="file" name="cover_image">
    </div>
    <input type="submit" value="Save" class="btn btn-primary">
</form>
@endsection