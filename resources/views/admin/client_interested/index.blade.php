@extends('admin.layout')

@section('title')
    Admin | Client Interested
@endsection

@section('page_title')
    Client Interested
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Client Interested</li>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">Client Interested List</h3>
            </div>
            <div class="col-sm-12 col-md-6">
                <ul class="list-inline dl mb-0 float-left float-md-right">
                    <li class="list-inline-item text-info mr-3">
                        <button class="btn btn-circle btn-success text-white" data-toggle="modal" data-target="#clientInterestedModal">
                            <i class="ti-plus"></i>
                        </button>
                        <span class="ml-2 font-normal text-dark">Add New</span>
                    </li>
                </ul>
            </div>
        </div>

        <!---Create Modal--->
        @include('admin.client_interested.create')
        <!---Create Modal--->
        <!---edit Modal--->
        @include('admin.client_interested.edit')
        <!---edit Modal--->

        <div class="row">
            <div class="col-12">
                <div class="material-card card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="goTable table table-striped border">
                                <thead>
                                <tr>
                                    <th>#S.No</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($interesteds))
                                    @foreach($interesteds as $key => $interested)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $interested->title }}</td>
                                            <td>{!! substr($interested->description, 0, 80) !!}...</td>
                                            <td>
                                                @if($interested->status == 1)
                                                    <button class="btn btn btn-rounded btn-outline-success mr-2 btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti-check mr-1"></i> Active
                                                    </button>
                                                @else
                                                    <button class="btn-rounded btn btn-outline-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti-close mr-1"></i> Inactive
                                                    </button>
                                                @endif
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('interested.active', $interested->id) }}">Active</a>
                                                    <a class="dropdown-item" href="{{ route('interested.inactive', $interested->id) }}">Inactive</a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('interested.edit', $interested->id) }}" onclick="clientInterestedEdit(this)" data-id="{{ $interested->id }}" data-toggle="modal" data-target="#editClientInterestedModal" class="btn btn-outline-info btn-circle btn-circle ml-2">
                                                    <i class="ti-pencil-alt"></i>
                                                </a>
{{--                                                <a href="{{ route('interested.destroy', $interested->id) }}" class="btn btn-outline-danger btn-circle btn-circle ml-2">--}}
{{--                                                    <i class="ti-trash"></i>--}}
{{--                                                </a>--}}
{{--                                                <form id="delete-form-{{ $interested->id }}" action="{{ route('interested.destroy', $interested->id) }}" method="POST" style="display: none;">--}}
{{--                                                    @csrf--}}
{{--                                                    {{ method_field('DELETE') }}--}}
{{--                                                </form>--}}
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
