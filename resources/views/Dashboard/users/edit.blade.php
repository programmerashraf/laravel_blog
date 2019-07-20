@extends('adminlte::page')

@section('title', 'Create post')

@section('content_header')
    <h1>Edit user </h1>

@stop
@section('content')

    <div class="col-lg-8">

        @include("dashboard.layouts.messages")
        <div class="user-block">
            <img class="img-circle img-bordered-sm" src="{{ url($user->image) }}" alt="user image">
            <span class="username">
            <a href="#">{{$user->name}}</a>
         </span>
            <span class="description">Joined : {{ $user->created_at }}</span>
        </div>
        <form method="POST">
            @csrf
            <div class="form-group">
                <label for="role">Role</label>
                <select name="admin" id="role" class="form-control">
                    <option selected>Choose Role</option>
                    <option value="0">Editor</option>
                    <option value="1">Admin</option>
                </select>
            </div>
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="form-group">
                <input type="submit" class="form-control btn btn-facebook" value="Update">
            </div>
        </form>
        @if($errors)
            @foreach($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        @endif
    </div>
@stop
