@extends('adminlte::page')
@section('title', 'Change password')
@section('content_header')
    <h1>
        Change password
    </h1>
@stop

@section('content')
    <div class="col-md-9">
        @include("dashboard.layouts.messages")
        <div class="box box-primary">
            <form role="form" method="POST">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="oldpassword">Current password</label>
                        <input type="password" name="current_password" class="form-control" id="oldpassword" placeholder="Current password">
                    </div>
                    <div class="form-group">
                        <label for="password">New password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="New password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">New password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm new password">
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
@stop
