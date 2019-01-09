@extends('layouts.app') 
@section('content')
    <h3>Create New Post</h3>
    <form action="/posts" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <input type="text" placeholder="Your Title goes here" name="title"  class="form-control">
        </div>
        <div class="form-group">
            <textarea name="body" cols="30" rows="10" placeholder="Your Post Goes Here" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input type="file" name="cover_image">
        </div>
        <input type="submit" value="Create" class="btn btn-primary">
    </form>
@endsection