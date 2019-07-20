@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>Dashboard</h1>
@stop
@section('content')
    @include("dashboard.layouts.messages")
<div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-newspaper-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Posts</span>
                <span class="info-box-number">{{$data['posts']->count()}}</span>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Users</span>
                <span class="info-box-number">{{$data['users']->count()}}</span>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Comments</span>
                <span class="info-box-number">{{$data['comments']->count()}}</span>
            </div>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-lg-5">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Recently Added Posts</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="products-list product-list-in-box">
                    <?php $count = 0; ?>
                    @forelse($data["posts"] as $post )
                        <?php if($count == 5) break; ?>
                            <li class="item">
                                <div class="product-img">
                                    <img src="{{url($post->image)}}" alt="Product Image">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">{{$post->title}}
                                        <span class="label label-warning pull-right">
                                            <i class="fa fa-comments-o"></i>
                                            {{$post->comments->count()}}
                                        </span></a>
                                    <span class="product-description">
                                        Published by : {{$post->user->name}}
                                    </span>
                                </div>
                            </li>
                        <?php $count++; ?>
                    @empty
                        <h5 class="text-center">there are no posts</h5>
                        @endforelse
                    </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="{{url("/admin/posts")}}" class="uppercase">View All posts</a>
                </div>
                <!-- /.box-footer -->
            </div>

        </div>
        <div class="col-lg-7">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Recently Added Comment</h3>
                </div>
                @if(!empty($data["latestComment"]))
                <div class="box-header with-border">
                    <div class="user-block">
                        <img class="img-circle" src="{{ url($data["latestComment"]->post->image) }}" alt="User Image">
                        <span class="username"><a href="#">{{$data["latestComment"]->post->title}}</a></span>
                        <span class="description">By : {{ $data["latestComment"]->post->user->name }}</span>
                    </div>
                </div>

                <!-- /.box-header -->
                <div class="box-footer box-comments">
                    <div class="box-comment">
                        <img class="img-circle img-sm" src="{{ url(config("defaults.image")) }}" alt="User Image">
                        <div class="comment-text">
                      <span class="username">
                        {{ $data["latestComment"]->username }}
                        <span class="text-muted pull-right">
                            {{ $data["latestComment"]->created_at }}
                        </span>
                      </span>
                            {{ $data["latestComment"]->content }}
                        </div>
                    </div>
                </div>
                @else
                    <p class="text-center box-header">No comemnts</p>
                @endif

            </div>
        </div>
    </div>
<script src="https://adminlte.io/themes/AdminLTE/bower_components/chart.js/Chart.js"></script>
@stop
