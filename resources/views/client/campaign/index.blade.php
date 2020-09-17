@extends('client.layout')

@section('title')
    Client | Campaign | Create
@endsection

@section('page_title')
    Campaigns
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('campaign.index') }}">Campaigns</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
@endsection

@section('content')

    <div class="page-content container-fluid" id="app">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="card card-body">
                  <h3 class="font-light">Campaign Lists </h3> <span class="ml-1"> add new campaigns to advertise your apps</span>

                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="card card-body">
                <a class="btn btn-primary" style="width:150px" href="{{route('campaign.create')}}">Create <i class="fa fa-plus"></i> </a>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Campaign ID</th>
                                <th>Date</th>
                                <th>Service</th>
                                <th>Name</th>
                                <th>link</th>
                                <th>Bid Rate</th>
                                <th>Campaign Quantity</th>
                                <th>Total Budget</th>
                                <th>Campaign Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($campaigns as $campaign)
                            <tr>
                                <td>{{$campaign->id}}</td>
                                <td>{{$campaign->created_at}}</td>
                                <td>{{$campaign->service->name}}</td>
                                <td>{{$campaign->name}}</td>
                                <td>{{$campaign->link}}</td>
                                <td>{{$campaign->bid_amount}}</td>
                                <td>{{$campaign->quantity}}</td>
                                <td>{{$campaign->quantity * $campaign->bid_amount}}</td>
                                <td>
                                    @if ($campaign->status == 0)
                                        Pending
                                    @elseif($campaign->status == 1)
                                        Approved
                                    @elseif($campaign->status == 2)
                                        Running
                                    @elseif($campaign->status == 3)
                                       Paused
                                    @elseif($campaign->status == 4)
                                       Terminated
                                    @endif
                                </td>
                                <td>
                                <button @click="getCampaign({{$campaign->id}})" class="btn btn-sm btn-success">View Campaign</button>
                                {{-- <form action="{{route('campaign.destroy',$campaign->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"  class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                   </form> --}}
                                  </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>

        <!-- sample modal content -->
        <div class="modal fade campaignModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><i class="fab fa-android"></i> #@{{ campaign.identifier }} @{{ campaign.name }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="card bg-gradient-info">
                                    <div class="card-body">
                                        <div class="d-flex no-block align-items-center">
                                            <div class="text-white">
                                                <h2>577</h2>
                                                <h6>Impressions</h6>
                                            </div>
                                            <div class="ml-auto">
                                                <span class="text-white display-6"><i class="ti-eye"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="card bg-gradient-danger">
                                    <div class="card-body">
                                        <div class="d-flex no-block align-items-center">
                                            <div class="text-white">
                                                <h2>550</h2>
                                                <h6>Clicks</h6>
                                            </div>
                                            <div class="ml-auto">
                                                <span class="text-white display-6"><i class="ti-arrow-circle-right"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="card bg-gradient-success">
                                    <div class="card-body">
                                        <div class="d-flex no-block align-items-center">
                                            <div class="text-white">
                                                <h2>37</h2>
                                                <h6>Unique Traffic</h6>
                                            </div>
                                            <div class="ml-auto">
                                                <span class="text-white display-6"><i class="ti-rocket"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="card bg-gradient-primary">
                                    <div class="card-body">
                                        <div class="d-flex no-block align-items-center">
                                            <div class="text-white">
                                                <h2>16% &nbsp; 40%</h2>
                                                <h6>CTR/CR</h6>
                                            </div>
                                            <div class="ml-auto">
                                                <span class="text-white display-6"><i class="ti-bar-chart-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">

                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#Overview" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down"> Overview </span></a> </li>
                                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#Reporting" role="tab"><span class="hidden-sm-up"><i class="ti-info"></i></span> <span class="hidden-xs-down"> Reporting </span></a> </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content tabcontent-border p-4">
                                            <div class="tab-pane active" id="Overview" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="thumbnail">
                                                            <img class="img-fluid" src="https://lh3.googleusercontent.com/uXKSb0CRK3M6MvdbjLKZ3Cbr0tsrggZurJd1h-XXLf8mhBYQ8GjTtMoYsfbJ_RUCKg=w140">
                                                        </div>
                                                        <div>
                                                            <button class="btn btn-outline-success btn-block waves-effect waves-light" v-if="start_button_status" @click="changeStatus(2)" type="button">
                                                                <span class="btn-label"><i class="fa fa-play"></i></span> Start
                                                            </button>
                                                            <button class="btn btn-outline-success btn-block waves-effect waves-light"  type="button" disabled v-else>
                                                                <span class="btn-label"><i class="fa fa-play"></i></span> Start
                                                            </button>

                                                            <button class="btn btn-outline-warning btn-block waves-effect waves-light" v-if="pause_button_status" @click="changeStatus(3)" type="button">
                                                                <span class="btn-label"><i class="fa fa-pause"></i></span> Pause
                                                            </button>
                                                            <button class="btn btn-outline-warning btn-block waves-effect waves-light" disabled v-else type="button">
                                                                <span class="btn-label"><i class="fa fa-pause"></i></span> Pause
                                                            </button>

                                                            <button class="btn btn-outline-danger btn-block waves-effect waves-light" v-if="terminate_button_status" @click="changeStatus(4)" type="button">
                                                                <span class="btn-label"><i class="fa fa-stop"></i></span> Terminate
                                                            </button>

                                                            <button class="btn btn-outline-info btn-block waves-effect waves-light" type="button">
                                                                <span class="btn-label"><i class="fa fa-file-alt"></i></span> Receipt
                                                            </button>

                                                            <button class="btn btn-outline-info btn-block waves-effect waves-light" type="button">
                                                                <span class="btn-label"><i class="fa fa-file-excel"></i></span> CSV
                                                            </button>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-10">
                                                        <div class="row mb-2">
                                                            <div class="col-md-3">
                                                                <h4>Campaign Identifier:</h4>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <h5>@{{ campaign.name }}
                                                                    {{--<span class="ml-2 badge badge-pill text-white font-medium badge-info label-rouded">
                                                                        <a class="m-0 p-0">
                                                                            <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                                                                            Change
                                                                        </a>
                                                                    </span>--}}
                                                                </h5>

                                                            </div>
                                                        </div>

                                                        <div class="row mb-2">
                                                            <div class="col-md-3">
                                                                <h4>@{{campaign.service_link_view_name}}:</h4>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <a class="link" href="#">
                                                                    <h4>@{{ campaign.link }}</h4>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        {{--<div class="row mb-2">
                                                            <div class="col-md-3">
                                                                <h4>Package Name:</h4>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <h5>com.joinmetonight</h5>
                                                            </div>
                                                        </div>--}}

                                                        <div class="row mb-2">
                                                            <div class="col-md-3">
                                                                <h4>Tracking Method:</h4>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <h5>@{{ campaign.mode }} (goFans)</h5>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-2">
                                                            <div class="col-md-3">
                                                                <h4>Remaining Bid Quantity:</h4>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <h5>0 / @{{ campaignQty.quantity }}
                                                                    <span style="cursor: pointer;"@click="showQty" class="ml-2 badge badge-pill text-white font-medium badge-info label-rouded">
                                                                        <a class="m-0 p-0">
                                                                            <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                                                                            Change
                                                                        </a>
                                                                    </span>
                                                                </h5>

                                                              <form method="post" v-if="campaignQtyShow === 1" @submit.prevent="adjustCampaignBalance">
                                                                  <div class="row mb-3">
                                                                      <div class="col-md-6">
                                                                          <div class='input-group' >
                                                                              <input type='text' v-model="campaignQty.quantity" name="quantity" class="form-control">
                                                                          </div>
                                                                      </div>
                                                                      <div class="col-md-3">
                                                                          <button type="submit" id="qtyBtn" class="btn btn-warning">
                                                                              <i class="fa fa-save"></i> Update
                                                                          </button>
                                                                      </div>
                                                                  </div>
                                                              </form>


                                                            </div>
                                                        </div>

                                                        <div class="row mb-2">
                                                            <div class="col-md-3">
                                                                <h4>Bid Amount:</h4>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <h5>@{{ campaign.bid_amount }}
                                                                    <span style="cursor: pointer;"  @click="bid_amount_form = !bid_amount_form" class="ml-2 badge badge-pill text-white font-medium badge-info label-rouded">
                                                                        <a class="m-0 p-0">
                                                                            <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                                                                            Change
                                                                        </a>
                                                                    </span>
                                                                </h5>
                                                                <form method="post" v-if="bid_amount_form" @submit.prevent="adjustCampaignBalance">
                                                                    <div class="row mb-3">
                                                                        <div class="col-md-6">
                                                                            <div class='input-group' >
                                                                                <input type='text' v-model="bid_amount" name="bid_amount" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <button type="submit" id="bidAmntBtn" class="btn btn-warning">
                                                                                <i class="fa fa-save"></i> Update
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-md-3">
                                                                <h4>Remaining Budget:</h4>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <h5>$0 / $@{{ remaining_budget }}
                                                                </h5>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-2">
                                                            <div class="col-md-3">
                                                                <h4>Country Targeting:</h4>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <label class="form-inline">
                                                                    <div class="btn-circle" style="padding: 5px">
                                                                        <img class="img-fluid" src="{{ asset('admin/images/country/bd.png') }}">
                                                                    </div>
                                                                </label>

                                                            </div>
                                                        </div>

                                                        <div class="row mb-2">
                                                            <div class="col-md-3">
                                                                <h4>Conversion Cap:</h4>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <form @submit.prevent="updateCampaignDL()" method="post">
                                                                    <div class="row">
                                                                        <div class="col-md-5">
                                                                            <div class="input-group">
                                                                                <input type="number" v-model="campaignDL.day_limit" class="form-control">
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text">per day</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <button type="submit" id="dlBtn" class="btn btn-warning">
                                                                                <i class="fa fa-save"></i> Update
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <form @submit.prevent="updateCampaignDT()" method="post">
                                                        <div class="row mb-2">
                                                            <div class="col-md-3">
                                                                <h4>Start Date (UTC±0):</h4>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="row">
                                                                    <div class="col-md-7">
                                                                        <div class='input-group date' >
                                                                            <input type='text' id='date-start' v-model="campaignDates.start_date" name="start_date" class="form-control">
                                                                            <span class="input-group-btn">
                                                                            <button class="btn btn-light date-set" data-dtp="dtp_QqtVs" type="button"><i class="fa fa-calendar"></i></button>
                                                                        </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-md-3">
                                                                <h4>End Date (UTC±0):</h4>
                                                            </div>
                                                            <div class="col-md-9">

                                                                <div class="row">
                                                                    <div class="col-md-7">
                                                                        <div class='input-group date' >
                                                                            <input type='text' id='date-end' v-model="campaignDates.end_date" name="end_date" class="form-control">
                                                                            <span class="input-group-btn">
                                                                            <button  class="btn btn-light date-set" type="button"><i class="fa fa-calendar"></i></button>
                                                                        </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <button id="dtBtn" type="submit" class="btn btn-warning">
                                                                            <i class="fa fa-save"></i> Update
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        </form>

                                                        <div class="row mb-2">
                                                            <div class="col-md-3">
                                                                <h4>Created:</h4>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <h5>@{{ campaign.created_at }}</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="Reporting" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="goTable table table-bordered table-hover">
                                                                <thead>
                                                                <tr>
                                                                    <th>Date</th>
                                                                    <th>Impressions</th>
                                                                    <th>Clicks</th>
                                                                    <th>CTR (Click-Through-Rate)</th>
                                                                    <th>Installations</th>
                                                                    <th>CR (Conversion Rate)</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>2020-03-01</td>
                                                                    <td>171</td>
                                                                    <td>24</td>
                                                                    <td>14.04%</td>
                                                                    <td>9</td>
                                                                    <td>37.5%</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2020-02-29</td>
                                                                    <td>269</td>
                                                                    <td>45</td>
                                                                    <td>16.73%</td>
                                                                    <td>17</td>
                                                                    <td>37.78%</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2020-02-28</td>
                                                                    <td>137</td>
                                                                    <td>24</td>
                                                                    <td>17.52%</td>
                                                                    <td>11</td>
                                                                    <td>45.83%</td>
                                                                </tr></tbody>
                                                            </table>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </div>

    </div>


@endsection

@section('page_css')
    <style>
        h4, h5{
            font-size: 17px;
        }
        .thumbnail {
            display: block;
            padding: 4px;
            margin-bottom: 20px;
            line-height: 1.42857143;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            -webkit-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
        }
    </style>
@endsection

@section('page_js')
    <!-- For Vue Js cdn -->
    <script src="{{ asset('js/vue.js') }}"></script>
    <script src="{{ asset('js/vue.resource.js') }}"></script>

    <script type="text/javascript">
        var app = new Vue({
            el: '#app',
            data: {
                campaign: [],
                bid_amount_form:false,
                bid_amount:0,
                start_button_status:false,
                pause_button_status:false,
                terminate_button_status:true,
                campaignDL:{
                    _token: "{{ csrf_token() }}",
                    day_limit: null,
                },

                campaignDates:{
                    _token: "{{ csrf_token() }}",
                    start_date: '',
                    end_date: '',
                },

                campaignQty:{
                    _token: "{{ csrf_token() }}",
                    quantity: null,
                },
                campaignQtyShow:0

            },

            mounted() {
            },
            created() {
            },

            methods: {
                getCampaign(campaignId){
                    let _this = this;
                    this.$http.get('/get-single-campaign/' + campaignId).then(function (resp) {
                        if(resp.data.status === 200){
                            $('.campaignModal').modal('show');
                            _this.campaign = resp.data.data;
                            _this.bid_amount = _this.campaign.bid_amount;
                            _this.campaignDL.day_limit = _this.campaign.day_limit;
                            _this.campaignDates.start_date = _this.campaign.start_date;
                            _this.campaignDates.end_date = _this.campaign.end_date;
                            _this.campaignQty.quantity = _this.campaign.quantity;
                            if(_this.campaign.status === 2)
                            {
                                _this.pause_button_status = true;
                            }
                            else if(_this.campaign.status === 3)
                            {
                                _this.start_button_status = false;
                            }
                            else
                            {
                                _this.pause_button_status = false;
                                _this.start_button_status =false;
                            }
                        }
                    }).catch(function (resp) {
                        toastr.error("Campaign not found.", 'Error.. !!', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "progressBar": true,
                            timeOut: 3000
                        });
                    });
                },

                updateCampaignDL(){
                    let _this = this;
                    var newCampaign = _this.campaignDL;
                    var dlBtn ='<i class="fas fa-spinner fa-spin"></i> Updating...';
                    $("#dlBtn").html(dlBtn);

                    this.$http.post('/campaign-update/' + _this.campaign.identifier, newCampaign).then(function (resp) {
                        if (resp.data.status === 200){
                            var dlBtn ='<i class="fa fa-save"></i> Update';
                            $("#dlBtn").html(dlBtn);
                            toastr.success(resp.data.message, 'Successful.. !!', {
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                "progressBar": true,
                                timeOut: 3000
                            });
                        }
                    }).catch(function (resp) {
                        var dlBtn ='<i class="fa fa-save"></i> Update';
                        $("#dlBtn").html(dlBtn);
                        $("#dlBtn").html("Update");
                        toastr.error(resp.data.message, 'Error.. !!', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "progressBar": true,
                            timeOut: 3000
                        });
                    });

                },

                showQty(){
                    let _this = this;
                    if (_this.campaignQtyShow === 0){
                        _this.campaignQtyShow = 1;
                    }else{
                        _this.campaignQtyShow = 0;
                    }
                },
                updateFields(url,obj,callback)
                {
                    let _this = this;
                    fetch(url,{
                        headers:{
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                        credentials: "same-origin",
                        method:"POST",
                        body: JSON.stringify(obj)
                    })
                    .then(res=>res.json())
                    .then(res=>{
                        callback(res);
                    });
                },
                changeStatus(statustype){
                    //console.log(statustype);
                    let obj = {
                        status: statustype
                    }
                    let route = '/campaign-update/' + _this.campaign.identifier;
                    this.updateFields(route,obj,res=>{
                        if(res.status ===  200)
                        {
                            toastr.success(res.message, 'Successful.. !!', {
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                "progressBar": true,
                                timeOut: 3000
                            });
                            if(statustype == 2)
                            {
                                this.pause_button_status = true;
                                this.start_button_status = false;
                            }
                            else if(statustype == 3)
                            {
                                this.start_button_status = true;
                                this.pause_button_status = false;
                            }
                        }
                        else
                        {
                            toastr.error(res.message, 'Error.. !!', {
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                "progressBar": true,
                                timeOut: 3000
                            });
                        }
                    });
                },
                adjustCampaignBalance(){
                    let _this = this;
                    var newBidAmount = _this.bid_amount;
                    var newQuantity = _this.campaignQty.quantity;
                    let route = '/campaign-price-adjust/' + _this.campaign.identifier;
                    let obj = {
                        amount: newBidAmount,
                        quantity: newQuantity
                    }
                    var qtyBtn ='<i class="fas fa-spinner fa-spin"></i> Updating...';
                    $("#bidAmntBtn").html(qtyBtn);
                    this.updateFields(route,obj,res=>{
                        if(res.status ===  200)
                        {
                            var qtyBtn ='<i class="fa fa-save"></i> Update';
                            $("#bidAmntBtn").html(qtyBtn);
                            toastr.success(res.message, 'Successful.. !!', {
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                "progressBar": true,
                                timeOut: 3000
                            });
                        }
                        else
                        {
                            var qtyBtn ='<i class="fa fa-save"></i> Update';
                             $("#bidAmntBtn").html(qtyBtn);
                            toastr.error(res.message, 'Error.. !!', {
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                "progressBar": true,
                                timeOut: 3000
                            });
                        }
                    });

                },
                updateCampaignQty(){
                    let _this = this;
                    var newCampaignQty = _this.campaignQty;
                    var qtyBtn ='<i class="fas fa-spinner fa-spin"></i> Updating...';
                    $("#qtyBtn").html(qtyBtn);

                    this.$http.post('/campaign-update/' + _this.campaign.identifier, newCampaignQty).then(function (resp) {
                        if (resp.data.status === 200){
                            var qtyBtn ='<i class="fa fa-save"></i> Update';
                            $("#qtyBtn").html(qtyBtn);
                            toastr.success(resp.data.message, 'Successful.. !!', {
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                "progressBar": true,
                                timeOut: 3000
                            });
                        }
                    }).catch(function (resp) {
                        var qtyBtn ='<i class="fa fa-save"></i> Update';
                        $("#qtyBtn").html(qtyBtn);
                        toastr.error(resp.data.message, 'Error.. !!', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "progressBar": true,
                            timeOut: 3000
                        });
                    });

                },

                updateCampaignDT(){
                    let _this = this;
                    var newCampaignDT = _this.campaignDates;
                    var dtBtn ='<i class="fas fa-spinner fa-spin"></i> Updating...';
                    $("#dtBtn").html(dtBtn);

                    this.$http.post('/campaign-update/' + _this.campaign.identifier, newCampaignDT).then(function (resp) {
                        if (resp.data.status === 200){
                            var dtBtn ='<i class="fa fa-save"></i> Update';
                            $("#dtBtn").html(dtBtn);
                            toastr.success(resp.data.message, 'Successful.. !!', {
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                "progressBar": true,
                                timeOut: 3000
                            });
                        }
                    }).catch(function (resp) {
                        var dtBtn ='<i class="fa fa-save"></i> Update';
                        $("#dtBtn").html(dtBtn);
                        toastr.error(resp.data.message, 'Error.. !!', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "progressBar": true,
                            timeOut: 3000
                        });
                    });
                }

            },
            computed: {
                remaining_budget()
                {
                    return this.campaignQty.quantity * this.bid_amount;
                }
            },
        });
    </script>

@endsection
