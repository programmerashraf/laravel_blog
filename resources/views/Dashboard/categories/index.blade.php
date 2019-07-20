@extends('adminlte::page')

@section('title', 'Create category')

@section('content_header')
    <h1>All categories</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">All categories</h3>

        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <a class="btn btn-primary" href="{{ url("admin/categories/create") }}">Create category</a>
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="dataTables_length" id="example1_length">
                                </div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascendingrt column descending" style="width: 5px;">id</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style" aria-label="Rendering engine: activate to so="width: 203px;">name</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 100px;">action</th></tr>
                            </thead>
                            <tbody>
                                <?php $id = 1; ?>
                                @forelse($categories as $category)
                                    <tr>
                                        <td>{{ $id }}</td>
                                        <td>
                                            {{ $category->name }}
                                        </td>
                                        <td>
                                            <a href="{{ url("admin/categories/delete/".$category->id) }}" class="label label-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <?php $id++; ?>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop