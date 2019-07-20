@extends('adminlte::page')
@section('title', 'Profile settings')
@section('content_header')
    <h1>
        Create user
    </h1>

@stop
@section('content')

    <div class="row">
        <!-- /.col -->
        <div class="col-md-9">
            @include("dashboard.layouts.messages")


            <div class="box box-danger">
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputName">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <textarea name="bio" id="bio" cols="30" rows="3" class="form-control" placeholder="Bio"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Enter password">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword">Retype Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword" placeholder="Retype password">
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="admin" id="role" class="form-control">
                                <option value="0">Editor</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@stop
