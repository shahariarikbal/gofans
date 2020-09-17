@extends('client.layout')

@section('title')
    Support
@endsection

@section('page_title')
    Faq Support
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Faq Support</li>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-8">
                <label class="form-inline">
                    <h3 class="font-light">Support </h3> <span class="ml-1"> consult our FAQ or contact us</span>
                </label>
            </div>
            <div class="col-sm-12 col-md-4">
                <ul class="list-inline dl mb-0 float-left float-md-right">
                    <li class="list-inline-item text-info mr-3">
                        <a href="{{ route('client.dashboard') }}">
                            <button class="btn btn-circle btn-info text-white">
                                <i class="ti-arrow-left"></i>
                            </button>
                            <span class="ml-2 font-normal text-dark">Back</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <div class="list-group" id="list-tab" role="tablist">
                    @if(!empty($data))
                        @foreach($data as $ck => $category)
                        <a class="list-group-item list-group-item-action {{ $ck == 0 ? 'active':'' }}" id="list-category{{ $category->id }}-list" data-toggle="list" href="#category{{ $category->id }}" role="tab" aria-controls="category{{ $category->id }}"><i class="fa fa-th-list"></i> {{ $category->name }} </a>
                        @endforeach
                    @else
                        <a class="list-group-item list-group-item-action active" data-toggle="list" role="tab"><i class="fa fa-question-circle"></i> Category Not found</a>
                    @endif
                </div>
            </div>
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            @foreach($data as $ck => $category)
                            <div class="tab-pane fade show {{ $ck == 0 ? ' active':'' }}" id="category{{ $category->id }}" role="tabpanel" aria-labelledby="list-category{{ $category->id }}-list">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="accordion" id="faqExample">
                                            @foreach($category->getFaq as $k => $question)
                                            <div class="card">
                                                <div class="card-header p-3 mb-2" id="qToa{{ $question->id }}">
                                                    <a class=" btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $question->id }}" aria-expanded="true" aria-controls="collapse{{ $question->id }}">
                                                        <h5 class="mb-0">
                                                            {{ ++$k }}. {{ $question->question }}
                                                        </h5>
                                                    </a>
                                                </div>

                                                <div id="collapse{{ $question->id }}" class="collapse" aria-labelledby="qToa{{ $question->id }}" data-parent="#faqExample">
                                                    <div class="card-body">
                                                        <p>{{ $question->answer }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_css')
    <style>
        .box_blue {
            border: 1px solid #7cacfa;
            border-top: 0;
        }

        .box_green {
            border: 1px solid #6ffaab;
            border-top: 0;
        }

        .list-group-item.active {
            padding-left: 35px;
            transition: 1s!important;
        }
    </style>
@endsection

@section('page_js')
<script>

</script>
@endsection
