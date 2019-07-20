@extends('layouts.app')

@section("content")
    <h1 class="mb-4">{{$post->title}}</h1>
    <img src="{{url($post->image)}}" alt="Image" class="img-fluid mb-5">
    <div class="post-meta">
        <span class="author mr-2">
            <img src="{{url($post->user->image)}}" alt="Colorlib" class="mr-2">{{$post->user->name}}</span>&bullet;
        <span class="mr-2">{{$post->created_at}} </span> &bullet;
        <span class="ml-2"><span class="fa fa-comments"></span> {{$post->comments->count()}}</span>
        <a class="category mb-5" href="{{url("category/".$post->category->name)}}">{{$post->category->name}}</a>

    </div>
    <div class="post-content-body">
        {!! trim($post->body, " \t.") !!}
    </div>
    <div class="pt-5">
        Tags:
        @foreach($post->tags as $tag)
            <a href="{{ url("tag/".$tag->name) }}">#{{$tag->name}}</a>,
        @endforeach
    </div>

    @include("layouts.comments")
@endsection