@extends('client.layout')

@section('title')
    Account Setting
@endsection

@section('page_title')
    Account Setting
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Account Setting</li>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light"> Account Setting</h3>
            </div>
            <div class="col-sm-12 col-md-6">
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
                    <a class="list-group-item list-group-item-action active" id="list-Overview-list" data-toggle="list" href="#Overview" role="tab" aria-controls="Overview"><i class="fa fa-cog"></i> Overview</a>
                    <a class="list-group-item list-group-item-action" id="list-ChangePassword-list" data-toggle="list" href="#ChangePassword" role="tab" aria-controls="ChangePassword"><i class="fa fa-lock"></i> Change Password </a>
                    <a class="list-group-item list-group-item-action" id="list-ResellerSettings-list" data-toggle="list" href="#ResellerSettings" role="tab" aria-controls="ResellerSettings"><i class="fa fa-building"></i> Reseller Settings (Tracking Referrer) </a>
                    <a class="list-group-item list-group-item-action" id="list-External-list" data-toggle="list" href="#External" role="tab" aria-controls="External"><i class="fa fa-exchange"></i> External Tracking Providers  </a>
                    <a class="list-group-item list-group-item-action" id="list-APISettings-list" data-toggle="list" href="#APISettings" role="tab" aria-controls="APISettings"><i class="fa fa-code"></i>  API Settings   </a>
                    <a class="list-group-item list-group-item-action" id="list-MailNotifications-list" data-toggle="list" href="#MailNotifications" role="tab" aria-controls="MailNotifications"><i class="fa fa-eye"></i>   Mail Notifications    </a>
                </div>
            </div>
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="Overview" role="tabpanel" aria-labelledby="list-Overview-list">
                                <div class="row">
                                    <div class="col-md-8">
                                        <form>
                                            <div class="form-group">
                                                <label>Account ID</label>
                                                <input type="text" class="form-control" value="#94044" disabled="">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" value="johnlinkonkhoksa5000@gmail.com" disabled="">
                                            </div>
                                            <div class="form-group">
                                                <label>Account Type</label>
                                                <input type="text" class="form-control" value="Private" disabled="">
                                            </div>
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" value="Bangladesh" disabled="">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card-header bg-gradient-cyan text-white">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <h4 class="card-title"><i class="fa fa-life-ring"></i>  FAQ</h4>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="text-right">
                                                        <i  class="fa fa-chevron-down" data-toggle="collapse" href="#VAT" role="button" aria-expanded="false" aria-controls="collapseExample"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="collapse box_blue show" id="VAT">
                                            <div class="card-body">
                                                <h4>Billing Settings</h4>
                                                <p>Your billing settings can be changed under <i>Billing > Settings.</i></p>
                                                <p>To go there, just click the button below:</p>

                                                <div class="text-right">
                                                    <button type="button" class="btn btn-success"><i class="fa fa-pencil-alt"></i>  Billing Settings</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="ChangePassword" role="tabpanel" aria-labelledby="list-ChangePassword-list">
                                <form>
                                    <div class="form-group">
                                        <label>Current Password</label>
                                        <input type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Retype New Password</label>
                                        <input type="password" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-success">Change Password</button>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="ResellerSettings" role="tabpanel" aria-labelledby="list-ResellerSettings-list">
                                <div class="row">
                                    <div class="col-md-8">
                                        <form>
                                            <div class="form-group">
                                                <label>Referrer String</label>
                                                <input type="text" class="form-control" value="">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-success">Change Reseller Settings</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card-header bg-gradient-cyan text-white">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <h4 class="card-title"><i class="fa fa-life-ring"></i>  FAQ</h4>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="text-right">
                                                        <i  class="fa fa-chevron-down" data-toggle="collapse" href="#setting" role="button" aria-expanded="false" aria-controls="collapseExample"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="collapse show box_blue" id="setting">
                                            <div class="card-body">
                                                <h4>Referrer String</h4>
                                                <p class="text-justify">Your referrer string identifies each install driven by our service.</p>
                                                <p class="text-justify">If you have clients and want to offer a white-label solution and brand your installs, simply change the referrer string to your company name.</p>
                                                <p class="text-justify">Tracking services like Google Analytics will automatically show your "Referrer String" as Campaign Source in the dashboard of the apps you promote.</p>
                                                <p class="text-justify"><strong>Hint:</strong> Save an empty referrer string to completly omit submitting Google Analytics referrer information.</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="External" role="tabpanel" aria-labelledby="list-External-list">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="card-header pb-3 bg-gradient-success text-white">
                                            <div class="row">
                                                <div class="col-md-11">
                                                    <h4 class="card-title"><i class="fa fa-bullseye"></i>  appsflyer</h4>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="text-right">
                                                        <i  class="fa fa-chevron-down" data-toggle="collapse" href="#item1" role="button" aria-expanded="false" aria-controls="collapseExample"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="collapse show box_green mb-3" id="item1">
                                            <div class="card-body">
                                                <h5>Prerequites for appsflyer:</h5>
                                                <ul>
                                                    <li>Create an appsflyer ad network account and get your adnetwork_id (e.g. networkname_pid)</li>
                                                    <li>Contact your appsflyer account manager to setup server 2 server postbacks for conversions</li>
                                                    <li>
                                                        Give the following URLs to your appsflyer account manager:
                                                        <strong>Redirect URL format:</strong> http://app.appsflyer.com/{app_id}?pid={adnetwork_id}&clickid={click_id}
                                                        <strong>Postback URL (Install Attribution):</strong> http://www.ayetstudios.com/s2s/callback/5df145/appsflyer/{clickid}?android_id={android_id}&imei={imei}&gaid={google_advertising_id}&gaid_limited={google_advertising_id_limited_tracking}&idfa={idfa}
                                                        <strong>Postback URL (In-App Event Attribution):</strong> http://www.ayetstudios.com/s2s/event/5df145/appsflyer/{clickid}?event_name={event-name}&event_type=event&event_quantity={monetary}&android_id={android_id}&imei={imei}&gaid={google_advertising_id}&gaid_limited={google_advertising_id_limited_tracking}&idfa={idfa}
                                                    </li>
                                                    <li>After setting up the postbacks, contact your ayetstudios account manager to verify it</li>
                                                </ul>
                                                <hr>

                                                <div class="form-group">
                                                    <label>Your appsflyer Ad Network ID / PID</label>
                                                    <input type="text" class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="card-header pb-3 bg-gradient-success text-white">
                                            <div class="row">
                                                <div class="col-md-11">
                                                    <h4 class="card-title"><i class="fa fa-bullseye"></i>  kochava_android</h4>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="text-right">
                                                        <i  class="fa fa-chevron-down" data-toggle="collapse" href="#item2" role="button" aria-expanded="false" aria-controls="collapseExample"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="collapse show box_green mb-3" id="item2">
                                            <div class="card-body">
                                                <h5>Prerequites for appsflyer:</h5>
                                                <ul>
                                                    <li>Create an appsflyer ad network account and get your adnetwork_id (e.g. networkname_pid)</li>
                                                    <li>Contact your appsflyer account manager to setup server 2 server postbacks for conversions</li>
                                                    <li>
                                                        Give the following URLs to your appsflyer account manager:
                                                        <strong>Redirect URL format:</strong> http://app.appsflyer.com/{app_id}?pid={adnetwork_id}&clickid={click_id}
                                                        <strong>Postback URL (Install Attribution):</strong> http://www.ayetstudios.com/s2s/callback/5df145/appsflyer/{clickid}?android_id={android_id}&imei={imei}&gaid={google_advertising_id}&gaid_limited={google_advertising_id_limited_tracking}&idfa={idfa}
                                                        <strong>Postback URL (In-App Event Attribution):</strong> http://www.ayetstudios.com/s2s/event/5df145/appsflyer/{clickid}?event_name={event-name}&event_type=event&event_quantity={monetary}&android_id={android_id}&imei={imei}&gaid={google_advertising_id}&gaid_limited={google_advertising_id_limited_tracking}&idfa={idfa}
                                                    </li>
                                                    <li>After setting up the postbacks, contact your ayetstudios account manager to verify it</li>
                                                </ul>
                                                <hr>

                                                <div class="form-group">
                                                    <label>Your Kochava Android Network ID</label>
                                                    <input type="text" class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-header pb-3 bg-gradient-success text-white">
                                            <div class="row">
                                                <div class="col-md-11">
                                                    <h4 class="card-title"><i class="fa fa-bullseye"></i>  kochava_ios</h4>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="text-right">
                                                        <i  class="fa fa-chevron-down" data-toggle="collapse" href="#item3" role="button" aria-expanded="false" aria-controls="collapseExample"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="collapse show box_green mb-3" id="item3">
                                            <div class="card-body">
                                                <h5>Prerequites for appsflyer:</h5>
                                                <ul>
                                                    <li>Create an appsflyer ad network account and get your adnetwork_id (e.g. networkname_pid)</li>
                                                    <li>Contact your appsflyer account manager to setup server 2 server postbacks for conversions</li>
                                                    <li>
                                                        Give the following URLs to your appsflyer account manager:
                                                        <strong>Redirect URL format:</strong> http://app.appsflyer.com/{app_id}?pid={adnetwork_id}&clickid={click_id}
                                                        <strong>Postback URL (Install Attribution):</strong> http://www.ayetstudios.com/s2s/callback/5df145/appsflyer/{clickid}?android_id={android_id}&imei={imei}&gaid={google_advertising_id}&gaid_limited={google_advertising_id_limited_tracking}&idfa={idfa}
                                                        <strong>Postback URL (In-App Event Attribution):</strong> http://www.ayetstudios.com/s2s/event/5df145/appsflyer/{clickid}?event_name={event-name}&event_type=event&event_quantity={monetary}&android_id={android_id}&imei={imei}&gaid={google_advertising_id}&gaid_limited={google_advertising_id_limited_tracking}&idfa={idfa}
                                                    </li>
                                                    <li>After setting up the postbacks, contact your ayetstudios account manager to verify it</li>
                                                </ul>
                                                <hr>

                                                <div class="form-group">
                                                    <label>Your Kochava iOS Network ID</label>
                                                    <input type="text" class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-success">Save Tracking Settings</button>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card-header bg-gradient-cyan text-white">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <h4 class="card-title"><i class="fa fa-life-ring"></i>  FAQ</h4>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="text-right">
                                                        <i  class="fa fa-chevron-down" data-toggle="collapse" href="#ExternalFAQ" role="button" aria-expanded="false" aria-controls="collapseExample"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="collapse show box_blue" id="ExternalFAQ">
                                            <div class="card-body">
                                                <h4>Custom Tracking Providers</h4>
                                                <p class="text-justify">If you run your own advertising agency and have ad-network accounts for any of the supported tracking providers on the left, you can fill in your account information and setup postback URLs as explained in the description.</p>
                                                <p class="text-justify">With that, you're able to create campaigns using your ad-network account as traffic source, allowing you to deliver campaigns with external tracking to your advertisers through your company's accounts.</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="APISettings" role="tabpanel" aria-labelledby="list-APISettings-list">
                                <div class="row">
                                    <div class="col-md-7">
                                        <form>
                                            <div class="form-group">
                                                <label>Account API Key</label>
                                                <input type="text" class="form-control" disabled value="a4917c45cee37fe3c1cb002808d0301c">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-success">Generate new API Key</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="card-header bg-gradient-cyan text-white">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <h4 class="card-title"><i class="fa fa-life-ring"></i>  FAQ</h4>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="text-right">
                                                        <i  class="fa fa-chevron-down" data-toggle="collapse" href="#setting" role="button" aria-expanded="false" aria-controls="collapseExample"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="collapse show box_blue" id="setting">
                                            <div class="card-body">
                                                <h4>API Key</h4>
                                                <p class="text-justify">To access our API and use it for various tasks such as creating campaigns, managing campaigns or fetching statistics remotely, you need your personal API key.</p>
                                                <p class="text-justify">Make sure to keep it as safe as your account password and don't hand it out to anyone not involved in your business.</p>
                                                <p class="text-justify">If you're looking for the API Documentation, have a look at <i>Account > API Documentation </i> or click the button below:</p>
                                                <div class="text-right">
                                                    <button type="button" class="btn btn-success"><i class="fa fa-pencil-alt"></i>  API Documentation</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="MailNotifications" role="tabpanel" aria-labelledby="list-MailNotifications-list">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="Notifications">
                                                <label class="custom-control-label" for="Notifications">Notifications</label>
                                            </div>
                                            <br>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ProductUpdates">
                                                <label class="custom-control-label" for="ProductUpdates">Product Updates</label>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-header bg-gradient-cyan text-white">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <h4 class="card-title"><i class="fa fa-life-ring"></i>  FAQ</h4>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="text-right">
                                                        <i  class="fa fa-chevron-down" data-toggle="collapse" href="#MailNotificationFaq" role="button" aria-expanded="false" aria-controls="collapseExample"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="collapse show box_blue" id="MailNotificationFaq">
                                            <div class="card-body">
                                                <h4>Important Notifications</h4>
                                                <p class="text-justify">If enabled, you will receive mails for important campaign updates. An example would be a campaign where the app you're currently promoting which is no longer available in the Play Store and which has been halted.</p>

                                                <h4>Completed Campaign Notifications</h4>
                                                <p class="text-justify">If enabled, you will receive mails for completed campaigns along with a direct link to download the receipt and CSV file.</p>

                                                <h4>General Notifications</h4>
                                                <p class="text-justify">If enabled, you will receive mails for:</p>
                                                <ul>
                                                    <li>Adding funds to your account</li>
                                                    <li>Campaign creation</li>
                                                    <li>Manually terminating campaigns</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

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
    </style>
@endsection

@section('page_js')
<script>

</script>
@endsection
