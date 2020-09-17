<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin') }}/images/client.png">
    <title>@yield('title')</title>

    <!-- chartist CSS -->
    <link href="{{ asset('admin') }}/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="{{ asset('admin') }}/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="{{ asset('admin') }}/libs/morris.js/morris.css" rel="stylesheet">
    <link href="{{ asset('admin') }}/extra-libs/c3/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('admin') }}/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="{{ asset('admin') }}/extra-libs/calendar/calendar.css" rel="stylesheet" />
    <link href="{{ asset('admin') }}/libs/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/libs/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/libs/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
    <link href="{{ asset('admin') }}/libs/toastr/build/toastr.min.css" rel="stylesheet">
    <!-- needed css -->
    <link href="{{ asset('admin') }}/css/style.min.css" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <!-- datatables css -->
    <link href="{{ asset('admin') }}/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    @yield('page_css')
</head>

<body>
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div id="main-wrapper">
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header border-right">
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                <a class="navbar-brand" href="{{ route('client.dashboard') }}">
                    <b class="logo-icon">
                        <img src="{{ asset('admin') }}/images/logos/client.png" alt="homepage" class="dark-logo" />
                    </b>
                    <span class="logo-text">
                        <img src="{{ asset('admin') }}/images/logos/client-text.png" alt="homepage" class="dark-logo" />
                    </span>
                </a>
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
            </div>
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <ul class="navbar-nav float-left mr-auto">
                    <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-18"></i></a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="font-18 mdi mdi-gmail"></i>
                            <div class="notify">
                                <span class="heartbit"></span>
                                <span class="point"></span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown" aria-labelledby="2">
                            <ul class="list-style-none">
                                <li>
                                    <div class="drop-title border-bottom">You have 4 new messanges</div>
                                </li>
                                <li>
                                    <div class="message-center message-body">
                                        <a href="javascript:void(0)" class="message-item">
                                            <span class="user-img"> <img src="{{ asset('admin') }}/images/users/1.jpg" alt="user" class="rounded-circle"> <span class="profile-status online pull-right"></span> </span>
                                            <span class="mail-contnet">
                                                <h5 class="message-title">Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </span>
                                        </a>
                                        <a href="javascript:void(0)" class="message-item">
                                            <span class="user-img"> <img src="{{ asset('admin') }}/images/users/2.jpg" alt="user" class="rounded-circle"> <span class="profile-status busy pull-right"></span> </span>
                                            <span class="mail-contnet">
                                                <h5 class="message-title">Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </span>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center link text-dark" href="javascript:void(0);"> <b>See all Notifications</b> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="">
                        <label class="checkbox-inline" style="margin: 10px 35px;">
                            <input type="checkbox" id="twoFaAuth" {{ auth()->user()->two_fa_auth == 1 ? 'checked':'' }} data-toggle="toggle"> <strong>Tow Factor Authentication</strong>
                        </label>
                    </li>
                </ul>

                <ul class="navbar-nav float-right">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if(auth()->user()->profile_photo)
                                <img src="{{ asset('media/profile/'.auth()->user()->profile_photo) }}" class="rounded-circle" width="36">
                            @else
                                <img src="{{ asset('admin') }}/images/avatar.png" alt="user" class="rounded-circle" width="36">
                            @endif
                            <span class="ml-2 font-medium">Junior</span><span class="fas fa-angle-down ml-2"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                            <div class="d-flex no-block align-items-center p-3 mb-2 border-bottom">
                                <div class="">
                                    @if(auth()->user()->profile_photo)
                                        <img src="{{ asset('media/profile/'.auth()->user()->profile_photo) }}" class="rounded" width="80">
                                    @else
                                        <img src="{{ asset('admin') }}/images/avatar.png" alt="user" class="rounded" width="80">
                                    @endif
                                </div>
                                <div class="ml-2">
                                    <h4 class="mb-0">{{ auth()->user()->name }}</h4>
                                    <p class=" mb-0 text-muted">{{ auth()->user()->email }}</p>
                                    <p class=" mb-0 text-muted">Junior</p>
                                    <a href="{{ route('client.profileView') }}" class="btn btn-sm btn-custom text-white mt-2 btn-rounded">View Profile</a>
                                </div>
                            </div>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user mr-1 ml-1"></i> My Profile</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet mr-1 ml-1"></i> My Balance</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email mr-1 ml-1"></i> Inbox</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings mr-1 ml-1"></i> Account Setting</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="javascript:void(0)"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                            <form id="logout-form" action="{{ route('client.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="left-sidebar">
        <div class="scroll-sidebar">
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark profile-dd" href="javascript:void(0)" aria-expanded="false">
                            @if(auth()->user()->profile_photo)
                                <img src="{{ asset('media/profile/'.auth()->user()->profile_photo) }}" class="rounded-circle ml-2" width="30">
                            @else
                                <img src="{{ asset('admin') }}/images/avatar.png" class="rounded-circle ml-2" width="30">
                            @endif
                            <span class="hide-menu">{{ auth()->user()->name }} ({{auth()->user()->balance()}})</span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('client.profileView') }}" class="sidebar-link">
                                    <i class="ti-user"></i>
                                    <span class="hide-menu"> My Profile </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('client.profileEdit') }}" class="sidebar-link">
                                    <i class="ti-wallet"></i>
                                    <span class="hide-menu"> Edit Profile </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="javascript:void(0)" class="sidebar-link">
                                    <i class="ti-email"></i>
                                    <span class="hide-menu"> Inbox </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="javascript:void(0)" class="sidebar-link">
                                    <i class="ti-settings"></i>
                                    <span class="hide-menu"> Account Setting </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="javascript:void(0)" class="sidebar-link">
                                    <i class="fas fa-power-off"></i>
                                    <span class="hide-menu"> Logout </span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item {{ Request::routeIs( ['client.dashboard', 'client.RegionalVolume']) ? 'selected':'' }}">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Request::routeIs('client.dashboard') ? 'active':'' }}" href="{{ route('client.dashboard') }}" aria-expanded="false">
                            <i class="fa fa-home"></i>
                            <span class="hide-menu">Overview</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::routeIs('client.billing*') ? 'selected':'' }}">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="hide-menu">Billing</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('client.billingAddFunds') }}" class="sidebar-link">
                                    <i class="mdi mdi-cards-variant"></i>
                                    <span class="hide-menu">Add Funds</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('client.billingInvoices') }}" class="sidebar-link">
                                    <i class="mdi mdi-cards-variant"></i>
                                    <span class="hide-menu">Fund History</span>
                                </a>
                            </li>
                          {{--   <li class="sidebar-item">
                                <a href="{{ url('billing/fund-requests') }}" class="sidebar-link">
                                    <i class="mdi mdi-cards-variant"></i>
                                    <span class="hide-menu">Fund Requests</span>
                                </a>
                            </li> --}}
                        </ul>
                    </li>

                    <li class="sidebar-item {{ Request::routeIs('campaign*') ? 'selected':'' }}">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="fa fa-rocket"></i>
                            <span class="hide-menu">Campaigns</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('campaign.create') }}" class="sidebar-link">
                                    <i class="mdi mdi-cards-variant"></i>
                                    <span class="hide-menu">New Campaign</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('campaign.index') }}" class="sidebar-link">
                                    <i class="mdi mdi-cards-variant"></i>
                                    <span class="hide-menu">Campaigns</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item {{ Request::routeIs('client.accountSetting*') ? 'selected':'' }}">
                        <a href="{{ route('client.accountSetting') }}" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                            <i class="fa fa-user"></i>
                            <span class="hide-menu">Account Settings</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                            <i class="fa fa-wrench"></i>
                            <span class="hide-menu">API Documentation</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::routeIs('client.affiliate*') ? 'selected':'' }}">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="fa fa-globe"></i>
                            <span class="hide-menu">Affiliate program</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('client.affiliateOverview') }}" class="sidebar-link">
                                    <i class="mdi mdi-cards-variant"></i>
                                    <span class="hide-menu">Overview</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('client.affiliateReferrals') }}" class="sidebar-link">
                                    <i class="mdi mdi-cards-variant"></i>
                                    <span class="hide-menu">All Referrals</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item {{ Request::routeIs('client.support*') ? 'selected':'' }}">
                        <a href="{{ route('client.support') }}" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                            <i class="fa fa-life-ring"></i>
                            <span class="hide-menu">FAQ & Support</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="page-wrapper">
        <div class="page-breadcrumb border-bottom">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                    <h5 class="font-medium text-uppercase mb-0">@yield('page_title')</h5>
                </div>
                <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                    <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                        <ol class="breadcrumb mb-0 justify-content-end p-0">
                            <li class="breadcrumb-item"><a href="{{ route('client.dashboard') }}">Overview</a></li>
                            @yield('breadcrumb')
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        @yield('content')

        <footer class="footer text-center">
            All Rights Reserved by
            <a href="#">{{ env('APP_NAME') }}</a>.
        </footer>
    </div>
</div>

<script src="{{ asset('admin') }}/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('admin') }}/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="{{ asset('admin') }}/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- apps -->
<script src="{{ asset('admin') }}/js/app.min.js"></script>
<script src="{{ asset('admin') }}/js/app.init.js"></script>
<script src="{{ asset('admin') }}/js/app-style-switcher.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('admin') }}/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="{{ asset('admin') }}/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="{{ asset('admin') }}/js/waves.js"></script>
<!--Menu sidebar -->
<script src="{{ asset('admin') }}/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="{{ asset('admin') }}/js/custom.min.js"></script>
<script src="{{ asset('admin') }}/libs/chartist/dist/chartist.min.js"></script>
<script src="{{ asset('admin') }}/js/pages/chartist/chartist-plugin-tooltip.js"></script>
<script src="{{ asset('admin') }}/extra-libs/c3/d3.min.js"></script>
<script src="{{ asset('admin') }}/extra-libs/c3/c3.min.js"></script>
<script src="{{ asset('admin') }}/libs/raphael/raphael.min.js"></script>
<script src="{{ asset('admin') }}/libs/morris.js/morris.min.js"></script>
<script src="{{ asset('admin') }}/libs/moment/min/moment.min.js"></script>
<script src="{{ asset('admin') }}/libs/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="{{ asset('admin') }}/js/pages/calendar/cal-init.js"></script>

<script src="{{ asset('admin') }}/libs/moment/moment.js"></script>
<script src="{{ asset('admin') }}/libs/daterangepicker/daterangepicker.js"></script>
<script src="{{ asset('admin') }}/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('admin') }}/libs/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker-custom.js"></script>
<script src="{{ asset('admin') }}/libs/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
<script src="{{ asset('admin') }}/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin') }}/js/pages/datatable/datatable-basic.init.js"></script>
<script src="{{ asset('admin') }}/libs/toastr/build/toastr.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script>
    $('.goTable').DataTable();
    $('#calendar').fullCalendar('option', 'height', 650);
    $('.datetime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY h:mm A'
        }
    });

    $(function() {
        $('#date-end').bootstrapMaterialDatePicker(
            { weekStart: 0,format: 'DD-MM-YYYY',time: false }
            );
        $('#date-start').bootstrapMaterialDatePicker(
            {
                 weekStart: 0,
                 format: 'DD-MM-YYYY',
                 time: false,
                 clearButton:true,
                }
            ).on('change', function(e, date) {
            $('#date-end').bootstrapMaterialDatePicker('setMinDate', date, {format: 'DD-MM-YYYY'});
        });

        @if (session('success'))
        toastr.success("{{ session('success') }}", 'Successful.. !!', {
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "progressBar": true,
            timeOut: 3000
        });
        @elseif(session('error'))
        toastr.error("{{ session('error') }}", 'Error.. !!', {
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "progressBar": true,
            timeOut: 3000
        });
        @elseif(session('warning'))
        toastr.error("{{ session('warning') }}", 'Warning.. !!', {
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "progressBar": true,
            timeOut: 3000
        });
        @endif


        $(document).on('change', '#twoFaAuth', function() {
            if(this.checked) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('client.twoFaAuthActive') }}",
                    success: function(data){
                        if (data.status === 200){
                            toastr.success(data.message, 'Successful.. !!', {
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                "progressBar": true,
                                timeOut: 3000
                            });
                        }else{
                            toastr.error(data.message, 'Error.. !!', {
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                "progressBar": true,
                                timeOut: 3000
                            });
                        }
                    }
                });
            }else{
                $.ajax({
                    type: "GET",
                    url: "{{ route('client.twoFaAuthInactive') }}",
                    success: function(data){
                        if (data.status === 200){
                            toastr.warning(data.message, 'Warning.. !!', {
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                "progressBar": true,
                                timeOut: 3000
                            });
                        }else{
                            toastr.error(data.message, 'Error.. !!', {
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                "progressBar": true,
                                timeOut: 3000
                            });
                        }
                    }
                });
            }
        });

    });
</script>
@yield('page_js')
</body>
</html>
