@extends('adminlte::page')

@section('title', 'Create post')

@section('content_header')
    <h1>New category</h1>
@stop
@section('content')

    <div class="col-lg-8">
        @include("dashboard.layouts.messages")
        <form method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Category name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Category name">
            </div>
            <div class="form-group">
                <input type="submit" class="form-control btn btn-facebook" value="Create">
            </div>
        </form>

    </div>
@stop
