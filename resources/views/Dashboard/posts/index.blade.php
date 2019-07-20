@extends('adminlte::page')

@section('title', 'Create post')

@section('content_header')
    <h1>All posts</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">All posts</h3>

        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <a class="btn btn-primary" href="{{ url("admin/posts/create") }}">Create post</a>
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="dataTables_length" id="example1_length">
                                </div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascendingrt column descending" style="width: 5px;">id</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Post</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 150px;">Author</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 100px;">Action</th></tr>
                            </thead>
                            <tbody>
                                <?php $id = 1; ?>
                                @forelse($posts as $post)
                                    <tr>
                                        <td>{{ $id }}</td>
                                        <td>
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="{{ url($post->image) }}" alt="user image">
                                                <span class="username">
                                            <a href="{{url("/post/".$post->slug."/".$post->id)}}">{{ $post->title }}</a>
                                                </span>
                                                <span class="description">Created : {{ $post->created_at }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="{{ url($post->user->image) }}" alt="user image">
                                                    <span class="username">
                                                    <a>{{ $post->user->name }}</a>
                                                </span>
                                                <span class="description">Joined : {{ $post->user->created_at }}</span>
                                            </div>
                                        </td>
                                        <td>

                                         <a href="{{ url("admin/posts/delete/".$post->id) }}" class="btn btn-danger" style="height: 100%">Delete</a>
                                        @if(auth()->user() == $post->user)
                                            <a href="{{ url("admin/posts/edit/".$post->id) }}" class="btn btn-info">Edit</a>
                                        @endif
                                        </td>
                                    </tr>
                                    <?php $id++ ?>
                                @empty
                                    <td colspan="5" class="text-center">There is no posts available</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop