@extends('admin.layout')

@section('title')
    Admin | Categories
@endsection

@section('page_title')
    Categories
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Category</li>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">Category List</h3>
            </div>
            <div class="col-sm-12 col-md-6">
                <ul class="list-inline dl mb-0 float-left float-md-right">
                    {{--<li class="list-inline-item text-info mr-3">
                        <a href="{{ route('category.create') }}">
                            <button class="btn btn-circle btn-success text-white">
                                <i class="ti-plus"></i>
                            </button>
                            <span class="ml-2 font-normal text-dark">Add New</span>
                        </a>
                    </li>--}}
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="material-card card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="goTable table table-striped border">
                                <thead>
                                <tr>
                                    <th>#S.No</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($data))
                                    @foreach($data as $key => $category)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            @if($category->status == 1)
                                                <button class="btn btn btn-rounded btn-outline-success mr-2 btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ti-check mr-1"></i> Active
                                                </button>
                                            @else
                                                <button class="btn-rounded btn btn-outline-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ti-close mr-1"></i> Inactive
                                                </button>
                                            @endif
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('category.active', $category->id) }}">Active</a>
                                                <a class="dropdown-item" href="{{ route('category.inactive', $category->id) }}">Inactive</a>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-outline-info btn-circle btn-circle ml-2">
                                                <i class="ti-pencil-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
