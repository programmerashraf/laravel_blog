@extends('layouts.app')

@section("content")
    <style>
        .row{
            overflow: hidden !important;
        }

        [class*="col-"]{
            margin-bottom: -99999px !important;
            padding-bottom: 99999px  !important;
        }
    </style>
    <div class="row">
        <div class="col-md-6">
            <h2 class="mb-4">Latest Posts</h2>
        </div>
    </div>

        <div class="row row-eq-height">

        @forelse($posts as $post)
            <div class="col-md-6">
                <a class="blog-entry element-animate" data-animate-effect="fadeIn" href="{{url("/post/".$post->slug."/".$post->id)}}">
                    <img src="{{ $post->image }}" alt="{{ $post->title }}">
                    <div class="blog-content-body">
                        <div class="post-meta">
                            <span class="author mr-2"><img src="{{$post->user->image}}" alt="Colorlib"> {{ $post->user->name }}</span>&bullet;
                            <span class="mr-2">{{ $post->created_at }}</span> &bullet;
                            <span class="ml-2"><span class="fa fa-comments"></span> {{$post->comments->count()}}</span>
                        </div>
                        <h2>{{ $post->title }}</h2>
                    </div>
                </a>
            </div>
        @empty

        @endforelse

    </div>

    {{ $posts->links() }}

@endsection