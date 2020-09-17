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
    <link href="{{ asset('admin') }}/libs/toastr/build/toastr.min.css" rel="stylesheet">
    <!-- needed css -->
    <link href="{{ asset('admin') }}/css/style.min.css" rel="stylesheet">
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
                    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
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
                                                <span class="user-img"> <img src="{{ asset('admin') }}/images/avatar.png" alt="user" class="rounded-circle"> <span class="profile-status online pull-right"></span> </span>
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
                    </ul>

                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('admin') }}/images/avatar.png" alt="user" class="rounded-circle" width="36">
                                <span class="ml-2 font-medium">{{ explode(' ', auth()->user()->name)[0] }}</span><span class="fas fa-angle-down ml-2"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <div class="d-flex no-block align-items-center p-3 mb-2 border-bottom">
                                    <div class=""><img src="{{ asset('admin') }}/images/avatar.png" alt="user" class="rounded" width="80"></div>
                                    <div class="ml-2">
                                        <h4 class="mb-0">{{ auth()->guard('admin')->user()->name }}</h4>
                                        <p class=" mb-0 text-muted">{{ auth()->guard('admin')->user()->email }}</p>
                                        <a href="{{ route('admin.profileView') }}" class="btn btn-sm btn-custom text-white mt-2 btn-rounded">View Profile</a>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user mr-1 ml-1"></i> My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet mr-1 ml-1"></i> My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email mr-1 ml-1"></i> Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings mr-1 ml-1"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"  onclick="event.preventDefault(); document.getElementById('adminLogout').submit();" href="javascript:void(0)"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                                <form id="adminLogout" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
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
                                <img src="{{ asset('admin') }}/images/avatar.png" class="rounded-circle ml-2" width="30">
                                <span class="hide-menu">{{ auth()->guard('admin')->user()->name }} </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.profileView') }}" class="sidebar-link">
                                        <i class="ti-user"></i>
                                        <span class="hide-menu"> My Profile </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.profileEdit') }}" class="sidebar-link">
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
                                    <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('adminLogout').submit();" class="sidebar-link">
                                        <i class="fas fa-power-off"></i>
                                        <span class="hide-menu"> Logout </span>
                                    </a>
                                    <form id="adminLogout" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item {{ Request::routeIs('admin.dashboard') ? 'selected':'' }}">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Request::routeIs('admin.dashboard') ? 'active':'' }}" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                                <i class="fa fa-home"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ Request::routeIs('category*') ? 'selected':'' }}">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Request::routeIs('category') ? 'active':'' }}" href="{{ route('category.index') }}" aria-expanded="false">
                                <i class="fa fa-cubes"></i>
                                <span class="hide-menu">Categories</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Request::routeIs('client/interested*') ? 'selected':'' }}">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Request::routeIs('client/interested') ? 'active':'' }}" href="{{ route('interested.index') }}" aria-expanded="false">
                                <i class="fa fa-cubes"></i>
                                <span class="hide-menu">Client Interested</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Request::routeIs('service*') ? 'selected':'' }}">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Request::routeIs('service') ? 'active':'' }}" href="{{ route('service.index') }}" aria-expanded="false">
                                <i class="fa fa-cubes"></i>
                                <span class="hide-menu">Services</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ Request::routeIs('administrator*') ? 'selected':'' }}">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('administrator.index') }}">
                                <i class="fa fa-key"></i>
                                <span class="hide-menu">Administrator</span>
                            </a>
                        </li>


                        <li class="sidebar-item {{ Request::routeIs('admin.client*') ? 'selected':'' }}">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="fa fa-user-circle"></i>
                                <span class="hide-menu">Clients</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.clientList') }}" class="sidebar-link">
                                        <i class="mdi mdi-cards-variant"></i>
                                        <span class="hide-menu">Clients List</span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a href="{{ route('admin.clientCampaign') }}" class="sidebar-link">
                                        <i class="mdi mdi-cards-variant"></i>
                                        <span class="hide-menu">Campaign history</span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a href="{{ route('admin.clientTransaction') }}" class="sidebar-link">
                                        <i class="mdi mdi-cards-variant"></i>
                                        <span class="hide-menu">Transaction History</span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a href="{{ route('admin.clientTransaction') }}" class="sidebar-link">
                                        <i class="mdi mdi-cards-variant"></i>
                                        <span class="hide-menu">Log History</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="sidebar-item {{ Request::routeIs('admin.client*') ? 'selected':'' }}">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="fa fa-user-circle"></i>
                                <span class="hide-menu">Accounts</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('funds.index') }}" class="sidebar-link">
                                        <i class="mdi mdi-cards-variant"></i>
                                        <span class="hide-menu">Funds</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.fundRequests') }}" class="sidebar-link">
                                        <i class="mdi mdi-cards-variant"></i>
                                        <span class="hide-menu">Fund Requests (12)</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item {{ Request::routeIs('admin.audience*') ? 'selected':'' }}">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Request::routeIs('admin.audience*') ? 'active':'' }}" href="{{ route('admin.audienceList') }}" aria-expanded="false">
                                <i class="fa fa-user-circle"></i>
                                <span class="hide-menu">Audiences</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ Request::routeIs('admin.contactClient') ? 'selected':'' }}">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.contactClient') }}">
                                <i class="fa fa-address-book"></i>
                                <span class="hide-menu">Client Contact</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ Request::routeIs('faq-category*') || Request::routeIs('client-faq*')  ? 'selected':'' }}">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="fa fa-life-ring"></i>
                                <span class="hide-menu">Faq</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">

                                <li class="sidebar-item {{ Request::routeIs('faq-category*') ? 'active':'' }}">
                                    <a href="{{ route('faq-category.index') }}" class="sidebar-link {{ Request::routeIs('faq-category*') ? 'active':'' }}">
                                        <i class="mdi mdi-cards-variant"></i>
                                        <span class="hide-menu">Category</span>
                                    </a>
                                </li>

                                <li class="sidebar-item {{ Request::routeIs('client-faq*') ? 'active':'' }}">
                                    <a href="{{ route('client-faq.index') }}" class="sidebar-link {{ Request::routeIs('client-faq*') ? 'active':'' }}">
                                        <i class="mdi mdi-cards-variant"></i>
                                        <span class="hide-menu">Question</span>
                                    </a>
                                </li>


                            </ul>
                        </li>


                        <li class="sidebar-item {{ Request::routeIs('admin.settings*') || Request::routeIs('admin.contactSetting*') ? 'selected':'' }}">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="fa fa-cogs"></i>
                                <span class="hide-menu">Settings</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.contactSetting') }}" class="sidebar-link">
                                        <i class="mdi mdi-cards-variant"></i>
                                        <span class="hide-menu">Contact</span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a href="eco-products.html" class="sidebar-link">
                                        <i class="mdi mdi-cards-variant"></i>
                                        <span class="hide-menu">Website</span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a href="eco-products.html" class="sidebar-link">
                                        <i class="mdi mdi-cards-variant"></i>
                                        <span class="hide-menu">Profile</span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a href="eco-products.html" class="sidebar-link">
                                        <i class="mdi mdi-cards-variant"></i>
                                        <span class="hide-menu">Reports</span>
                                    </a>
                                </li>

                            </ul>
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
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
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
    <!-- This Page JS -->
    <script src="{{ asset('admin') }}/libs/chartist/dist/chartist.min.js"></script>
    <script src="{{ asset('admin') }}/js/pages/chartist/chartist-plugin-tooltip.js"></script>
    <script src="{{ asset('admin') }}/extra-libs/c3/d3.min.js"></script>
    <script src="{{ asset('admin') }}/extra-libs/c3/c3.min.js"></script>
    <script src="{{ asset('admin') }}/libs/raphael/raphael.min.js"></script>
    <script src="{{ asset('admin') }}/libs/morris.js/morris.min.js"></script>
    <script src="{{ asset('admin') }}/js/pages/dashboards/dashboard1.js"></script>
    <script src="{{ asset('admin') }}/libs/moment/min/moment.min.js"></script>
    <script src="{{ asset('admin') }}/libs/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="{{ asset('admin') }}/js/pages/calendar/cal-init.js"></script>
    <script src="{{ asset('admin') }}/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin') }}/js/pages/datatable/datatable-basic.init.js"></script>
    <script src="{{ asset('admin') }}/libs/toastr/build/toastr.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        $('#calendar').fullCalendar('option', 'height', 650);
        $('.goTable').DataTable();
        // toastr alert
        $(function() {
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
        });
    </script>
    @yield('page_js')
</body>
</html>
