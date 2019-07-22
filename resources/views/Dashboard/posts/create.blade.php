@extends('adminlte::page')

@section('title', 'Create post')

@section('content_header')
    <h1>New post</h1>
@stop
@section("css")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">
@stop
@section("js")
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
@stop
@section('content')
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

    <div class="col-lg-8">
        @include("dashboard.layouts.messages")
        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Post title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Post title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="body">Post content</label>
                <textarea name="body" id="body">{{ old("bio") }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Post image</label>
                <input type="file" name="image" class="form-control-file" value="{{ old("image") }}">
            </div>
            <div class="form-group">
                <label for="category">Post category</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <input type="text" value="" data-role="tagsinput" class="form-control" name="tags" value="{{ old('tags') }}">
            </div>
            <div class="form-group">
                <input type="submit" class="form-control btn btn-facebook" value="Publish">
            </div>
        </form>
    </div>

    <script>
        CKEDITOR.replace( 'body' );
    </script>
@stop
