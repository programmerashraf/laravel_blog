@extends('layouts.app')

@section("content")
@include('dashboard.layouts.messages')
    <form method="post">
        @csrf
        <div class="row">
            <div class="col-md-12 form-group">
                <input type="email" id="email" class="form-control" name="email" placeholder="Email Address">
            </div>
            <div class="col-md-12 form-group">
                <input type="password" id="password" class="form-control" name="password" placeholder="Password">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <input type="submit" value="Login" class="btn btn-primary">
            </div>
        </div>
    </form>
@endsection