@extends('user.layout')

@section('title')
    FAQ
@endsection

@section('page_title')
    FAQ
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Faq </li>
@endsection


@section('content')
    <div class="page-content container-fluid">
        <div id="accordion" class="accordion">
            <div class="card mb-0">
                @php $i = 1 @endphp
                @foreach($data as $kay => $faq)
                <div class="card-header collapsed" data-toggle="collapse" href="#collapse{{ $kay }}">
                    <a class="card-title">{{ $i++ }}. {{ $faq->question }} </a>
                </div>
                <div id="collapse{{ $kay }}" class="card-body collapse" data-parent="#accordion">
                    <p class="m-0">{{ $faq->answer }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('page_css')
<style>
    .card-header {
        padding: .75rem 1.25rem;
        margin-bottom: 0;
        background-color: rgba(0, 0, 0, 0);
        border-bottom: 1px solid rgba(0,0,0,.125);
        cursor: pointer;
    }
</style>
@endsection
@section('page_js')

@endsection
