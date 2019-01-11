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
        <br><br>
        <h3>Comments</h3>
        <form action="/posts/{{ $post->id }}/comments" method="post">
            @csrf
            <div class="form-group">
                <textarea name="message" cols="30" rows="3" class="form-control" placeholder="Type Something here"></textarea>
            </div>
            <input type="submit" value="Comment" class="btn btn-primary">
        </form>
        <br><br>
    @else
    Login To comment
        <br><br>
       
    @endif
    @if (count($post->comments) > 0)
    @foreach ($post->comments as $comment) 
        <div class="card mb-3">
            <div class="card-header">
                <h5 style="display:inline; font-weight: bold" class="mr-2">{{ ucwords($comment->username) }}</h5> 
                <small>{{ $comment->created_at }}</small>
            </div>
            <div class="card-body">
                <p>{{ $comment->message }}</p>
                @if (!Auth::Guest())
                    @if (Auth::user()->id == $comment->user_id)
                        <a href="/comments/{{$comment->id}}" style="float:left" class="btn btn-primary">Edit</a>
                        <form action="/comments/{{$comment->id}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" style="float:right" value="delete" class="btn btn-danger">
                        </form>
                    @endif
                @endif
                
            </div>
        </div>
    @endforeach 
    @else
        <br>
        Be First to comment on this post
    @endif

@endsection