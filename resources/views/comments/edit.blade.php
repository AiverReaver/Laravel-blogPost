@extends('layouts.app') 
@section('content')
    <h3>Edit Comment</h3>
    <form action="/comments/{{$comment->id}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <input type="text" name="message" value="{{$comment->message}}" class="form-control">
        </div>
        <input type="submit" value="Save" class="btn btn-primary">
    </form>
@endsection