@extends('adminlte::page')
@section('title', 'Profile settings')
@section('content_header')
        <h1>
            User Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url("admin")}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">User profile</li>
        </ol>
@stop
@section('content')
    <style>
        .profile-user-img {
            margin: 0 auto;
            width: 98% !important;
            padding: 1px !important;
            border: 2px solid #d2d6de !important;
            border-radius: 0 !important;
        }
    </style>
    @include("dashboard.layouts.messages")
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="{{url($user->image)}}" alt="User profile picture">

                            <h3 class="profile-username text-center">{{ $user->name }}</h3>
                            <p class="text-muted text-center">
                                @admin
                                    Admin
                                @else
                                    Editor
                                 @endadmin
                            </p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Posts</b> <a class="pull-right">{{$user->posts()->count()}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Member since : </b> <a class="pull-right">{{ $user->created_at }}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    <div class="box box-primary">
                        <div class="box-body box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title">Change profile picture</h3>
                            </div>
                            <form method="post" action="{{url("admin/settings/image")}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="image"></label>
                                    <input type="file" class="form-control-file" name="image" id="image">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block"><b>Upload</b></button>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
                <!-- /.col -->

                <div class="col-md-9">

                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Modify Information</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="POST">

                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter name" value="{{$user->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="bio">Bio</label>
                                    <textarea name="bio" id="bio" cols="30" rows="10" class="form-control">{{$user->bio}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{$user->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Confirm password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Enter your password">
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
@stop
