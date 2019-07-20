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
        <div class="col-md-12">
            @if( !empty($category))
            <h2 class="mb-4">Posts from category : {{ $category->name }}</h2>
            @endif
        </div>
    </div>

    <div class="row row-eq-height">
        @if( !empty($posts))
            @forelse($posts as $post)
                <div class="col-md-6">
                    <a class="blog-entry element-animate" data-animate-effect="fadeIn" href="{{url("/post/".$post->slug."/".$post->id)}}">
                        <img src="{{ url($post->image) }}" alt="{{ $post->title }}">
                        <div class="blog-content-body">
                            <div class="post-meta">
                                <span class="author mr-2"><img src="{{url($post->user->image)}}" alt="Colorlib"> {{ $post->user->name }}</span>&bullet;
                                <span class="mr-2">{{ $post->created_at }}</span> &bullet;
                                <span class="ml-2"><span class="fa fa-comments"></span> {{$post->comments->count()}}</span>
                            </div>
                            <h2>{{ $post->title }}</h2>
                        </div>
                    </a>
                </div>
            @empty
            <h4 class="text-center">There are no posts from this category</h4>
            @endforelse
        @else
            <h4 class="text-center">There are no posts from this category</h4>
        @endif
    </div>


@endsection