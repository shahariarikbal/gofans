@extends('admin_user.layout')

@section('title')
    Admin | Administrator
@endsection

@section('page_title')
    Administrators
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Administrator</li>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">Administrator List</h3>
            </div>
            <div class="col-sm-12 col-md-6">
                <ul class="list-inline dl mb-0 float-left float-md-right">
                    <li class="list-inline-item text-info mr-3">
                        <a href="{{ route('admin-user.create') }}">
                            <button class="btn btn-circle btn-success text-white">
                                <i class="ti-plus"></i>
                            </button>
                            <span class="ml-2 font-normal text-dark">Add New</span>
                        </a>
                    </li>
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
                                    <th>Role</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Permission</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($data))
                                    @foreach($data as $key => $admin)
                                        @php
                                            $permissions = json_decode($admin->permission, true);
                                        @endphp
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $admin->role == 'super' ? 'Super Admin':'Admin' }}</td>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td> --
{{--                                            @foreach(getModule() as $module)--}}
{{--                                                @php $access = $permissions[$module['route_name']] @endphp--}}
{{--                                                @if(!empty($access))--}}
{{--                                                @foreach($access as $acc)--}}
{{--                                                    @if(isset($acc))--}}
{{--                                                        <span class="badge badge-pill badge-success font-medium text-white ml-1">{{ $acc }}</span>--}}
{{--                                                    @endif--}}
{{--                                                @endforeach--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin-user.edit', $admin->id) }}" class="btn btn-outline-info btn-circle btn-circle ml-2">
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
