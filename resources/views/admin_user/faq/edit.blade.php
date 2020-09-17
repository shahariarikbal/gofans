@extends('admin_user.layout')

@section('title')
    Admin | Faq | Edit
@endsection

@section('page_title')
    Faq Edit
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('faq.index') }}">Faq</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">Faq Edit</h3>
            </div>
            <div class="col-sm-12 col-md-6">
                <ul class="list-inline dl mb-0 float-left float-md-right">
                    <li class="list-inline-item text-info mr-3">
                        <a href="{{ route('faq.index') }}">
                            <button class="btn btn-circle btn-info text-white">
                                <i class="fa fa-arrow-left"></i>
                            </button>
                            <span class="ml-2 font-normal text-dark">Back</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <form  method="post" action="{{ route('faq.update', $data->id) }}" novalidate>
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-xs-12">
                            @include('admin_user.faq._form')
                        </div>
                    </div>

                    <div class="text-xs-right">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <button type="reset" class="btn btn-inverse">Reset</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
