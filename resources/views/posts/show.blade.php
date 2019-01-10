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
        <form action="/comments" method="post">
            @csrf
            <div class="form-group">
                <textarea name="commnet" cols="30" rows="3" class="form-control" placeholder="Type Something here"></textarea>
            </div>
            <input type="submit" value="Comment" class="btn btn-primary">
        </form>
        <br><br>
        @if (count($comments) > 0)
            @foreach ($comments as $comment) 
                <div class="card bg-light card-body mb-3">
                    <div class="row">
                        <div>
                            <h6 style="font-weight:bold">{{ ucwords($comment->username) }} </h6> <span>{{ $comment->created_at }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <p>{{ $comment->message }}</p>
                    </div>
                </div>
            @endforeach 
        @else
        <br>
            Be First to comment on this post
        @endif
    @else
        Login To comment
    @endif

@endsection