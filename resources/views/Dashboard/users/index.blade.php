@extends('adminlte::page')

@section('title', 'Create user')

@section('content_header')
    <h1>All users</h1>
@stop

@section('content')
    @include("dashboard.layouts.messages")

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">All users</h3>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <a class="btn btn-primary" href="{{ url("admin/users/create") }}">Create user</a>
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="dataTables_length" id="example1_length">
                        </div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascendingrt column descending" style="width: 5px;">id</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 120px;">role</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 120px;">created at</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 100px;">action</th></tr>
                            </thead>
                            <tbody>
                            <?php $id = 1; ?>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $id }}</td>
                                    <td>
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="{{ url($user->image) }}" alt="user image">
                                            <span class="username">
                                            <a href="#">{{ $user->name }}</a>
                                                </span>
                                            <span class="description">Joined : {{ $user->created_at }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        @if($user->admin)
                                            Admin
                                        @else
                                            Editor
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <a href="{{ url("admin/users/edit/".$user->id) }}" class="label label-info">Edit</a>
                                        <a href="{{ url("admin/users/delete/".$user->id) }}" class="label label-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php $id++ ?>
                            @empty
                                <td colspan="5" class="text-center">There is no users available</td>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop