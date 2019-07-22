@extends('layouts.app')

@section("content")
@include('dashboard.layouts.messages')

    <form method="post">
        @csrf

        <div class="row">
            <div class="col-md-12 form-group">
                <input type="text" placeholder="Name" class="form-control" name="name">
            </div>
            <div class="col-md-12 form-group">
                <input type="email" placeholder="Email" class="form-control" name="email">
            </div>
            <div class="col-md-12 form-group">
                <input type="password" placeholder="Password" class="form-control" name="password">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <input type="submit" value="register" class="btn btn-primary">
            </div>
        </div>
    </form>@endsection