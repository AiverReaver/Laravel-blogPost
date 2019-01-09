@extends('layouts.app') 
@section('content')
<h3>Posts</h3>
@if (count($posts) > 0) 
    @foreach ($posts as $post) 
        <div class="card bg-light card-body mb-3">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}" alt="{{$post->cover_image}}"> 
                </div>
                <div class="col-md-8 col-sm-8">
                    <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                    <small>Written on {{ $post->created_at }}</small>
                </div>
            </div>
        </div>
    @endforeach 
@else
    <p>No Post Found.</p>
@endif
@endsection