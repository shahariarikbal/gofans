<form  method="post" @submit="formSubmit" action="{{ route('campaign.store') }}" id="campaignForm">
    @csrf
    <div class="row">
        <div class="col-md-9">
            <div class="row">

                {{-- campaign category --}}
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-gradient-primary text-white">
                            <h4 class="card-title"><i class="fa fa-rocket"></i> 1. Select Campaign Category</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                            <label>Category<span class="asteric"> * </span> </label>
                                <select class="form-control" name="category_id" id="campaign-category" onchange="Campaign.poplateServices(this)">
                                    @if(!empty($cate))
                                        @foreach($cate as  $category)
                                            <option value="{{$category['id']}}">{{$category['name']}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <small style="color:red" v-if="category_id === null">(Category is mandatory)</small>
                            </div>
                            <div class="d-flex source-traffic" v-if="traffic_source.visible">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="android" @change="traffic_source_android" id="android" name="traffic_source_android"  v-model="traffic_source.android">
                                <label class="custom-control-label" for="android">Android</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="ios" @change="traffic_source_ios" id="ios" name="traffic_source_ios" v-model="traffic_source.ios">
                                    <label class="custom-control-label" for="ios">IOS</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="desktop" @change="traffic_source_desktop" id="desktop" name="traffic_source_desktop" v-model="traffic_source.desktop">
                                    <label class="custom-control-label" for="desktop">Desktop</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox"  class="custom-control-input" id="all" @change="allTraffic_source" v-model="all_traffic_source">
                                <label class="custom-control-label" for="all">All</label>
                                </div>
                            </div>
                            <small v-if='!traffic_source_err && traffic_source.visible'  style="color:red">(Select one of these)</small>
                            <div class="d-flex source-traffic" v-if="traffic_source.podcast_visible">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" v-model="traffic_source.podcast" id="traffic_source_google_store" name="traffic_source_podcast" value="google_store">
                                <label class="custom-control-label" for="traffic_source_google_store">Google Play Store</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" v-model="traffic_source.podcast" id="traffic_source_apple_store" name="traffic_source_podcast" value="apple_store">
                                    <label class="custom-control-label" for="traffic_source_apple_store">iTune Store</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- campaign service --}}
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-gradient-primary text-white">
                            <h4 class="card-title"><i class="fa fa-rocket"></i> 2. Select Campaign Service</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                            <label>Service Name</label>
                                <select class="form-control" name="service_id" id="campaign-service" @change="populateServiceDetails">
                                </select>
                            </div>
                            <div class="platform hidden-forms">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" v-model="platform" id="android" name="platform" value="android">
                                <label class="custom-control-label" for="android">Android</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" v-model="platform" id="ios" name="platform" value="ios">
                                <label class="custom-control-label" for="ios">IOS</label>
                                </div>
                                <div class="custom-control-inline"> <small v-if="!platform_err" style="color:red">(Choose an option)</small> </div>
                            </div>
                            <div class="app-type hidden-forms" id="app-type-variation">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" v-model="pay_mode" id="free_app" name="app_type" value="free">
                                <label class="custom-control-label" for="free_app">Free App</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" v-model="pay_mode" id="paid_app" name="app_type" value="paid">
                                    <label class="custom-control-label" for="paid_app">Paid App</label>
                                </div>
                                <div class="custom-control-inline"> <small v-if="!pay_mode_err" style="color:red">(Choose an option)</small> </div>
                            </div>
                            <div class="track-album-play-list hidden-forms">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="trac_track" name="trac_album_playlist" value="customEx">
                                    <label class="custom-control-label" for="trac_track">Track</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="trac_album" name="trac_album_playlist" value="customEx">
                                    <label class="custom-control-label" for="trac_album">Album</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline playlists hidden-forms">
                                    <input type="radio" class="custom-control-input" id="trac_playlist" name="trac_album_playlist" value="customEx">
                                    <label class="custom-control-label" for="trac_playlist">Playlist</label>
                                </div>
                            </div>
                            <div class='form-group price-box' v-if="pay_mode =='paid'">
                                <label for="">Price</label>
                                <input type="text" class="form-control" v-model="app_type_price" name="app_type_price" placeholder="Price">
                            </div>
                        </div>
                        <div class="categoryInfo">
                            <div class="alert alert-info m-0 text-justify">
                                <i class="fa fa-info-circle"></i>
                                <p id="services-text"></p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- app link --}}
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-gradient-primary text-white">
                            <h4 class="card-title"><i class="fa fa-play"></i> 3. <span id="app-link-text"></span></h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                            <label>Campaign Name</label>
                                <input type="text" class="form-control" name="campaign_name">
                            </div>
                            <div class="form-group">
                                <label id="app-label-text">App Link</label>
                                <div class="input-group">
                                    <input type="text" v-model="app_link" name="app_link" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                    <div class="input-group-append">
                                        <button class="btn btn-info" style="background-color:#5ca455!important" v-on:click='validate_app_link()' type="button"> Validate! &nbsp;&nbsp; <i class="fa fa-check" v-if="youtube_video_validated"></i>  <i class="fa fa-times" style="color:#dc0b0b" v-if="youtube_video_validated==false"></i> </button>
                                    </div>
                                </div>
                                <div class="loader" v-if="loader"></div>
                                <small style="color:red;font-size:16px;font-weight:400" v-if="youtube_video_validation_msg!=''">@{{youtube_video_validation_msg}}</small>
                                <div class="channel-info-container" v-if="youtube_channel_info!=''" v-html='youtube_channel_info'> </div>
                                <div id="youtube_video_frame" style="margin-top: 10px;"></div>
                            </div>
                            <div class="form-group keyword-option hidden-forms">
                                <label for="">keywords</label>
                                <input type="text" class="form-control" name="keywords" placeholder="enter keyword i.e a,b">
                            </div>
                        </div>
                    </div>
                </div>
                {{-- service mode --}}
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-gradient-primary text-white">
                        <h4 class="card-title"><i class="fa fa-exclamation-triangle"></i> 4.<span id="tracking-method-label"></span></h4>
                        </div>
                    <input type="hidden" name="service_mode" v-model="service_mode">
                        <div class="card-body">
                            <div class="form-group tracking-mode hidden-forms">
                                <label>Tracking</label>
                                <select class="form-control" name="service_mode_value"  id="tracking-type" v-model="service_mode">
                                    <option value="standard">Standard (no required)</option>
                                    <option value="tracking">Allow Tracking Link</option>
                                </select>
                            </div>

                            <div class="form-group timing-mode hidden-forms">
                            <label >Timing @{{times}} @{{service_mode}}</label>
                                <select class="form-control" name="service_mode_value" id="timing-type" v-model="times">
                                </select>
                            </div>
                            <div class="form-group verifying-mode hidden-forms">
                                <label>Verifying</label>
                                <select class="form-control" name="service_mode_value" id="verifying-type" v-model="verifying_type">
                                </select>
                            </div>
                            <small v-if="timing_section_validation_err" style="color:red">(Mandatory field)</small>
                            <div class="form-group" v-if="service_mode == 'tracking'">
                                <label>Tracking Link</label>
                                <input type="text" name="traciking_link" class="form-control" v-model="traciking_link">
                            </div>
                            <small v-if="tracking_link_validation_err" style="color:red">(Tracking Link required)</small>
                        </div>
                    </div>
                </div>

                {{-- select country tracking --}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-gradient-primary text-white">
                            <h4 class="card-title"><i class="fa fa-globe"></i> 5. Select Country Tracking</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <select class="js-example-basic-multiple form-control"
                                name="countries[]" id="countrrry" multiple="true">
                                    <option value="AF">Afghanistan</option>
                                    <option value="AX">Åland Islands</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BY">Belarus</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BZ">Belize</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BT">Bhutan</option>
                                    <option value="BO">Bolivia, Plurinational State of</option>
                                    <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                    <option value="BA">Bosnia and Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BV">Bouvet Island</option>
                                    <option value="BR">Brazil</option>
                                    <option value="IO">British Indian Ocean Territory</option>
                                    <option value="BN">Brunei Darussalam</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="KH">Cambodia</option>
                                    <option value="CM">Cameroon</option>
                                    <option value="CA">Canada</option>
                                    <option value="CV">Cape Verde</option>
                                    <option value="KY">Cayman Islands</option>
                                    <option value="CF">Central African Republic</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CX">Christmas Island</option>
                                    <option value="CC">Cocos (Keeling) Islands</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comoros</option>
                                    <option value="CG">Congo</option>
                                    <option value="CD">Congo, the Democratic Republic of the</option>
                                    <option value="CK">Cook Islands</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="CI">Côte d'Ivoire</option>
                                    <option value="HR">Croatia</option>
                                    <option value="CU">Cuba</option>
                                    <option value="CW">Curaçao</option>
                                    <option value="CY">Cyprus</option>
                                    <option value="CZ">Czech Republic</option>
                                    <option value="DK">Denmark</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="DO">Dominican Republic</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egypt</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="GQ">Equatorial Guinea</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="EE">Estonia</option>
                                    <option value="ET">Ethiopia</option>
                                    <option value="FK">Falkland Islands (Malvinas)</option>
                                    <option value="FO">Faroe Islands</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finland</option>
                                    <option value="FR">France</option>
                                    <option value="GF">French Guiana</option>
                                    <option value="PF">French Polynesia</option>
                                    <option value="TF">French Southern Territories</option>
                                    <option value="GA">Gabon</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GE">Georgia</option>
                                    <option value="DE">Germany</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GI">Gibraltar</option>
                                    <option value="GR">Greece</option>
                                    <option value="GL">Greenland</option>
                                    <option value="GD">Grenada</option>
                                    <option value="GP">Guadeloupe</option>
                                    <option value="GU">Guam</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GG">Guernsey</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GW">Guinea-Bissau</option>
                                    <option value="GY">Guyana</option>
                                    <option value="HT">Haiti</option>
                                    <option value="HM">Heard Island and McDonald Islands</option>
                                    <option value="VA">Holy See (Vatican City State)</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HK">Hong Kong</option>
                                    <option value="HU">Hungary</option>
                                    <option value="IS">Iceland</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IR">Iran, Islamic Republic of</option>
                                    <option value="IQ">Iraq</option>
                                    <option value="IE">Ireland</option>
                                    <option value="IM">Isle of Man</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italy</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japan</option>
                                    <option value="JE">Jersey</option>
                                    <option value="JO">Jordan</option>
                                    <option value="KZ">Kazakhstan</option>
                                    <option value="KE">Kenya</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="KP">Korea, Democratic People's Republic of</option>
                                    <option value="KR">Korea, Republic of</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="KG">Kyrgyzstan</option>
                                    <option value="LA">Lao People's Democratic Republic</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LB">Lebanon</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libya</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lithuania</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MO">Macao</option>
                                    <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="MV">Maldives</option>
                                    <option value="ML">Mali</option>
                                    <option value="MT">Malta</option>
                                    <option value="MH">Marshall Islands</option>
                                    <option value="MQ">Martinique</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="MU">Mauritius</option>
                                    <option value="YT">Mayotte</option>
                                    <option value="MX">Mexico</option>
                                    <option value="FM">Micronesia, Federated States of</option>
                                    <option value="MD">Moldova, Republic of</option>
                                    <option value="MC">Monaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="ME">Montenegro</option>
                                    <option value="MS">Montserrat</option>
                                    <option value="MA">Morocco</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="MM">Myanmar</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Nauru</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NL">Netherlands</option>
                                    <option value="NC">New Caledonia</option>
                                    <option value="NZ">New Zealand</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Niger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="NU">Niue</option>
                                    <option value="NF">Norfolk Island</option>
                                    <option value="MP">Northern Mariana Islands</option>
                                    <option value="NO">Norway</option>
                                    <option value="OM">Oman</option>
                                    <option value="PK">Pakistan</option>
                                    <option value="PW">Palau</option>
                                    <option value="PS">Palestinian Territory, Occupied</option>
                                    <option value="PA">Panama</option>
                                    <option value="PG">Papua New Guinea</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Peru</option>
                                    <option value="PH">Philippines</option>
                                    <option value="PN">Pitcairn</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="QA">Qatar</option>
                                    <option value="RE">Réunion</option>
                                    <option value="RO">Romania</option>
                                    <option value="RU">Russian Federation</option>
                                    <option value="RW">Rwanda</option>
                                    <option value="BL">Saint Barthélemy</option>
                                    <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                    <option value="KN">Saint Kitts and Nevis</option>
                                    <option value="LC">Saint Lucia</option>
                                    <option value="MF">Saint Martin (French part)</option>
                                    <option value="PM">Saint Pierre and Miquelon</option>
                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                    <option value="WS">Samoa</option>
                                    <option value="SM">San Marino</option>
                                    <option value="ST">Sao Tome and Principe</option>
                                    <option value="SA">Saudi Arabia</option>
                                    <option value="SN">Senegal</option>
                                    <option value="RS">Serbia</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leone</option>
                                    <option value="SG">Singapore</option>
                                    <option value="SX">Sint Maarten (Dutch part)</option>
                                    <option value="SK">Slovakia</option>
                                    <option value="SI">Slovenia</option>
                                    <option value="SB">Solomon Islands</option>
                                    <option value="SO">Somalia</option>
                                    <option value="ZA">South Africa</option>
                                    <option value="GS">South Georgia and the South Sandwich Islands</option>
                                    <option value="SS">South Sudan</option>
                                    <option value="ES">Spain</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="SD">Sudan</option>
                                    <option value="SR">Suriname</option>
                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                    <option value="SZ">Swaziland</option>
                                    <option value="SE">Sweden</option>
                                    <option value="CH">Switzerland</option>
                                    <option value="SY">Syrian Arab Republic</option>
                                    <option value="TW">Taiwan, Province of China</option>
                                    <option value="TJ">Tajikistan</option>
                                    <option value="TZ">Tanzania, United Republic of</option>
                                    <option value="TH">Thailand</option>
                                    <option value="TL">Timor-Leste</option>
                                    <option value="TG">Togo</option>
                                    <option value="TK">Tokelau</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad and Tobago</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="TR">Turkey</option>
                                    <option value="TM">Turkmenistan</option>
                                    <option value="TC">Turks and Caicos Islands</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UA">Ukraine</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option value="GB">United Kingdom</option>
                                    <option value="US">United States</option>
                                    <option value="UM">United States Minor Outlying Islands</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UZ">Uzbekistan</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VE">Venezuela, Bolivarian Republic of</option>
                                    <option value="VN">Viet Nam</option>
                                    <option value="VG">Virgin Islands, British</option>
                                    <option value="VI">Virgin Islands, U.S.</option>
                                    <option value="WF">Wallis and Futuna</option>
                                    <option value="EH">Western Sahara</option>
                                    <option value="YE">Yemen</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabwe</option>
                                </select>
                            </div>
                            <small v-if="country_validation" style="color:red">(country is required)</small>

                            <div class="row">
                                <label class="col-md-12 control-label">Targeting Groups:</label>

                                <div class="col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="EnglishSpeaking">
                                        <label class="custom-control-label" for="EnglishSpeaking">English Speaking</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Asia" >
                                        <label class="custom-control-label" for="Asia">Asia</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="AustraliaPacific" >
                                        <label class="custom-control-label" for="AustraliaPacific">Australia / Pacific</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="NorthAmerica" >
                                        <label class="custom-control-label" for="NorthAmerica">North America</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="TierI" >
                                        <label class="custom-control-label" for="TierI"> Tier I</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="SpanishSpeaking" >
                                        <label class="custom-control-label" for="SpanishSpeaking"> Spanish Speaking</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Africa" >
                                        <label class="custom-control-label" for="Africa"> Africa</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Europe" >
                                        <label class="custom-control-label" for="Europe"> Europe</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="SouthAmerica" >
                                        <label class="custom-control-label" for="SouthAmerica"> South America</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="TierII" >
                                        <label class="custom-control-label" for="TierII">  Tier II</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- campaign schedule --}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-gradient-primary text-white">
                            <h4 class="card-title"><i class="fa fa-calendar"></i> 6. Campaign Schedule</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-4">Start Date (UTC±0, optional)</label>
                                    <div class="col-lg-8">
                                        <div class='input-group date' >
                                            <input type='text' id='date-start' name="start_date" class="form-control" />
                                            <span class="input-group-btn">
                                                <button class="btn btn-light date-reset" type="button"><i class="fa fa-times"></i></button>
                                            </span>
                                            <span class="input-group-btn">
                                                <button class="btn btn-light date-set" data-dtp="dtp_QqtVs" type="button"><i class="fa fa-calendar"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-4">End Date (UTC±0, optional)</label>
                                    <div class="col-lg-8">
                                        <div class='input-group date' >
                                            <input type='text' id='date-end' name="end_date" class="form-control" />
                                            <span class="input-group-btn">
                                                <button class="btn btn-light date-reset" type="button"><i class="fa fa-times"></i></button>
                                            </span>
                                            <span class="input-group-btn">
                                                <button class="btn btn-light date-set" type="button"><i class="fa fa-calendar"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- campaign bid and budget --}}
                <div class="col-md-12" >
                    <div class="card">
                        <div class="card-header bg-gradient-primary text-white">
                            <h4 class="card-title"><i class="fa fa-cubes"></i> 7. Campaign Bid & Budget</h4>
                        </div>
                        <div class="card-body" :class="[bid_budget_content===false?'bid-budget-content':'']" >
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-3">Bid (USD)</label>
                                    <div class="col-lg-7">
                                        <input type="range"  :min="_bidMin" :max="_bidMax" :step="bidstep" v-model.number="each_bid" class="slider" id="BidPerInstall">
                                    </div>
                                    <div class="col-lg-2 d-flex">
                                        <input id="BidPerInstallVal" @blur="bid_limit" class="form-control" type="text" :value="_cost_per_test" name="BidPerInstall" />
                                        <div class="buttonHolder">
                                            <button v-on:click="bid_per_install('+')" class="btn btn-primary cntl-btn" type="button">+</button>
                                            <button v-on:click="bid_per_install('-')" class="btn btn-primary cntl-btn" type="button">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                <label class="col-lg-3">Campaign Quantity</label>
                                    <div class="col-lg-7">
                                        <input type="range"  min="100" max="10000000" v-model.number="bid_quantity" step="5" class="slider" id="campign_quantity">
                                    </div>
                                    <div class="col-lg-2 d-flex">
                                        <input id="CampaignBudgetVal" class="form-control" @blur='quantityKey' type="text" :value="bid_quantity"  name="campign_quantity" />
                                        <div class="buttonHolder">
                                            <button v-on:click="bid_quantity+=10" class="btn btn-primary cntl-btn" type="button">+</button>
                                            <button v-on:click="bid_quantity-=10" class="btn btn-primary cntl-btn" type="button">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-3">Daily Limit</label>
                                    <div class="col-lg-7">
                                        <select class="form-control" name="day_limit" id="installs-per-day">
                                            <option value="1000000">Unlimited</option>
                                            <option value="25">25 conversions / day</option>
                                            <option value="50">50 conversions / day</option>
                                            <option value="100">100 conversions / day</option>
                                            <option value="200">200 conversions / day</option>
                                            <option value="400">400 conversions / day</option>
                                            <option value="500">500 conversions / day</option>
                                            <option value="750">750 conversions / day</option>
                                            <option value="1000">1000 conversions / day</option>
                                            <option value="1500">1500 conversions / day</option>
                                            <option value="2000">2000 conversions / day</option>
                                            <option value="5000">5000 conversions / day</option>
                                            <option value="10000">10000 conversions / day</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- finish campaign creation --}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-gradient-primary text-white">
                            <h4 class="card-title"><i class="fa fa-flag-checkered"></i> 8. Finish Campaign Creation</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <table>
                                        <tr>
                                            <td>Campaign Budget </td>
                                            <td> : </td>
                                        <td> <i class="fa fa-dollar-sign"></i> @{{_campaign_budget}}</td>
                                        </tr>
                                        <tr>
                                            <td>Cost Per Test </td>
                                            <td> : </td>
                                        <td> <i class="fa fa-dollar-sign"></i>  @{{_cost_per_test}}</td>
                                        </tr>
                                        <tr v-if="app_type_price!==null">
                                            <td>App Price </td>
                                            <td> : </td>
                                        <td> <i class="fa fa-dollar-sign"></i>  @{{app_type_price}}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-6">
                                    <table>
                                        <tr>
                                            <td>Campaign Quantity </td>
                                            <td> : </td>
                                        <td> <i class="fa fa-dollar-sign"></i> @{{bid_quantity}}</td>
                                        </tr>
                                        <tr>
                                            <td>Targeted Countries </td>
                                            <td> : </td>
                                        <td> <i class="fa fa-globe"></i>  @{{_selectedCountry}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-gradient-info text-white">
                    <h3 class="card-title"><i class="fa fa-cogs"></i> Additional Information</h3>
                </div>
                <div class="card-body" >
                    <p id="category-description"></p>
                </div>
            </div>
        </div>
        <div class="text-xs-right">
            <button type="submit" class="btn btn-info">Submit</button>
            <button type="reset" class="btn btn-inverse">Reset</button>
        </div>
    </div>
</form>



@section('page_css')
    <style>
        *{
        margin:0;
        padding:0;
        box-sizing: border-box;
        }
        .cntl-btn{
            padding: 0;
            height: 50%;
            width: 2em;
        }
        .channel-info-container{
        width:100%;
        display:flex;
        margin-top: 10px;
        }
        .image-cotainer{
            height: 100px;
            max-width: 106px;
            border-radius: 50%;
        }
        .image-cotainer img{
            height:100%;
            width: 100%;
            border-radius:50%;
            object-fit: contain;
        }
        .content-container{
            line-height: 0.5;
            padding: 10px;
        }
        .content-container h4{
            color: #5CA455 !important;
        }
        .content-container p{
            margin-left:10px;
        }
        #myApp{
            scroll-behavior: smooth;
        }
        .asteric{
            color: red;
        }
        .bid-budget-content {
            pointer-events: none;
            opacity: 0.4;
        }
        .slider {
            -webkit-appearance: none;
            width: 100%;
            height: 15px;
            border-radius: 5px;
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: #4CAF50;
            cursor: pointer;
        }

        .slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: #4CAF50;
            cursor: pointer;
        }
        .source-traffic div{
            margin-right: 18px;
        }
        .source-traffic div .custom-control-label{
            vertical-align: middle !important;
        }
        .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        margin:0 auto;
        margin-top: 10px;
        border-top: 16px solid #3498db;
        width: 100px;
        height: 100px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
        }

    /* Safari */
    @-webkit-keyframes spin {
    0% { -webkit-transform: rotate(0deg); }
    100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
    }
    </style>
@endsection
@section('page_js')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <script>
        let l = console.log;
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

        $('.hidden-forms').hide();  //initialize the fields

        const compute = (function(){
            "use strict"
            return {
                _bidMin()
                {
                    return this.bidMin;
                },
                _bidMax()
                {
                    return this.bidMax;
                },
                _cost_per_test(){
                    return  parseFloat(this.each_bid).toFixed(2);
                },
                _campaign_budget(){
                    let totalBudget = 0;
                    if(this.app_type_price !==null)
                    {
                        let d = this.each_bid + this.app_type_price;
                        totalBudget = this.bid_quantity * d;
                    }
                    else
                    {
                        totalBudget = this.bid_quantity * this.each_bid;
                    }
                    //totalBudget = (this.bid_quantity * this.eachBid);
                    return totalBudget.toFixed(2);
                    //return  totalBudget;
                },
                _selectedCountry(){
                    return this.selectedCountries.map(sc=>sc.text).join(",");
                },
            }
        })();

        const watcher = (function() {
            "use strict"
            return {
                minMax()
                {

                },
                platform(newval,oldval)
                {
                        let price = this._bidRangePopulate();
                        l('platform wather return',price);
                         if(price !==undefined)
                         {
                             this.bidMin = price.min_price;
                             this.bidMax = price.max_price;
                             this.each_bid = price.min_price;
                             this.bid_budget_content=true;
                         }
                         if(newval!=null)
                         {
                            this.platform_err = true;
                            removeErroMessage(2);
                         }
                },
                pay_mode(newval,oldval){
                    let price = this._bidRangePopulate();
                        l('pay_mode watcher return',price);
                         if(price !==undefined)
                         {
                             this.bidMin = price.min_price;
                             this.bidMax = price.max_price;
                              this.each_bid = price.min_price;
                             this.bid_budget_content=true;
                         }
                         if(newval!=null)
                         {
                            this.pay_mode_err = true;
                            removeErroMessage(3);
                         }

                },
                service_mode(){
                    let price = this._bidRangePopulate();
                        l('service_mode watcher return',price);
                         if(price !==undefined)
                         {
                             this.bidMin = price.min_price;
                             this.bidMax = price.max_price;
                              this.each_bid = price.min_price;
                             this.bid_budget_content=true;
                         }
                },
                required_day(){
                    let price = this._bidRangePopulate();
                        l('required_day watcher return',price);
                         if(price !==undefined)
                         {
                             this.bidMin = price.min_price;
                             this.bidMax = price.max_price;
                              this.each_bid = price.min_price;
                             this.bid_budget_content=true;
                         }
                },
                times(newval,oldval){
                    let price = this._bidRangePopulate();
                        l('time watcher return',price);
                         if(price !==undefined)
                         {
                             this.bidMin = price.min_price;
                             this.bidMax = price.max_price;
                              this.each_bid = price.min_price;
                             this.bid_budget_content=true;
                         }

                    if(newval !='')
                    {
                        this.timing_section_validation_err = false;
                        removeErroMessage(7);
                    }
                },
                app_link(newval,oldval)
                {
                    console.log('mn',newval);

                    if(newval !='')
                    {
                        this.youtube_video_validation_msg='';
                        removeErroMessage(4);
                    }

                },
                verifying_type(newval,oldval)
                {
                    console.log(newval,oldval);
                    if(newval !=null)
                    {
                        this.timing_section_validation_err  =false;
                        removeErroMessage(6);
                    }

                },
                traciking_link(newval,oldval)
                {
                    if(newval!='')
                    {
                        this.tracking_link_validation_err =false;
                        removeErroMessage(8);
                    }
                },
                selectedCountries(newval,oldval)
                {
                    console.log(newval,oldval,'coutries');
                    if(newval.length > 0)
                    {
                        this.country_validation = false;
                        removeErroMessage(9);
                    }
                }
            }

        })();

        const dataVar  =   {
                loader:false,
                allservices:null,
                category_id:null,
                campaign_name:null,
                campaign_link:null,
                campaign_keywords:null,
                start_date:null,
                end_date:null,
                app_link:'',
                traciking_link:'',
                youtube_video_validated:null,
                youtube_video_validation_msg:'',
                youtube_channel_info:'',
                bidMin : 500,
                bidMax :1000,
                each_bid:0.00,
                bidstep :0.01,
                service_id:null,
                platform:null,
                platform_err:true,
                pay_mode:null,
                pay_mode_err:true,
                service_mode:null,
                required_day:null,
                times:null,
                verifying_type:null,
                timing_section_validation_err:false,
                tracking_link_validation_err:false,
                bid_quantity:100,
                day_limit:null,
                app_type_price:null,
                service_mode_value:null,
                bid_budget_content:false,
                selectedCountries:[],
                country_validation:false,
                all_traffic_source:false,
                traffic_source_err:true,
                traffic_source:{
                    visible:false,
                    podcast_visible:false,
                    podcast:"",
                    android:false,
                    ios:false,
                    desktop:false,
                },
                errors:[],
        };
        /* window.addEventListener('scroll',function(){
            console.log('scroll',window.scrollY);

        }); */
        const mthd = (function(){
            "use strict"
            return {
                bid_limit(event){
                    let perbid = parseInt(event.target.value);
                    if(perbid>=dataVar.bidMin && perbid <= dataVar.bidMax)
                    {
                        dataVar.each_bid = perbid;
                    }
                    else
                    {
                        alert(`Limit outbound min:${dataVar.bidMin}, max:${dataVar.bidMax}`);
                        dataVar.each_bid = dataVar.bidMin;
                        event.target.value = dataVar.bidMin;
                    }
                },
                quantityKey(event){
                    let keyUpQuantity = parseInt(event.target.value);
                    if(keyUpQuantity>=100 && keyUpQuantity <= 10000000)
                    {
                        dataVar.bid_quantity = keyUpQuantity;
                    }
                    else
                    {
                        alert('Limit outbound min:100, max:10000000');
                        dataVar.bid_quantity = 100;
                        event.target.value = 100;
                    }
                },
                bid_per_install(sign)
                {
                    if(sign == "+")
                    {
                        dataVar.each_bid =   parseFloat(dataVar.each_bid);
                        dataVar.each_bid +=  parseFloat(dataVar.bidstep);
                    }
                    else if(sign == "-")  dataVar.each_bid -=  parseFloat(dataVar.bidstep);
                },
                displayValidationMessage()
                {
                    if(this.errors[0] !== undefined)
                    {
                        window.scrollTo({
                            top: this.errors[0].window_scroll,
                            left: 0,
                            behavior: 'smooth'
                        });
                    }
                },
                formSubmit(e){
                    //console.log('click');
                    if(this.category_id === null)
                    {

                    }

                    if(this.traffic_source.visible && (!this.traffic_source.android && !this.traffic_source.ios && !this.traffic_source.desktop))
                    {
                        this.traffic_source_err = false;
                        this.errors.push({
                            error_id:1,
                            window_scroll:132,
                            message:'Traffic source fields are requried',
                        });
                    }
                    if(this.category_id == 1 && this.platform === null)
                    {
                        this.platform_err=false;
                        this.errors.push({
                            error_id:2,
                            window_scroll:132,
                            message:'choosing platform is required',
                        });
                    }

                    if(this.category_id == 1 && this.pay_mode === null)
                    {
                        this.pay_mode_err = false;
                        this.errors.push({
                            error_id:3,
                            window_scroll:132,
                            message:'choosing pay mode is required',
                        });
                    }

                    if(this.app_link == '')
                    {
                        this.youtube_video_validation_msg ='Link is required';
                        this.errors.push({
                            error_id:4,
                            window_scroll:500,
                            message:'Link is required',
                        });
                    }

                    if(this.app_link != '' &&  !this.youtube_video_validated)
                    {
                        this.youtube_video_validation_msg ='Link has to be validated';
                        this.errors.push({
                            error_id:5,
                            window_scroll:500,
                            message:'Link has to be validated',
                        });
                    }

                    if(this.service_mode =='verify' && this.verifying_type ==null)
                    {
                        this.timing_section_validation_err =true;
                        this.errors.push({
                            error_id:6,
                            window_scroll:500,
                            message:'select a verify',
                        });
                    }
                    if(this.service_mode =='timing' && this.times ==null)
                    {
                        this.timing_section_validation_err =true;
                        this.errors.push({
                            error_id:7,
                            window_scroll:500,
                            message:'select a timing',
                        });
                    }
                    if(this.service_mode =='tracking' && this.traciking_link =='')
                    {
                        this.tracking_link_validation_err =true;
                        this.errors.push({
                            error_id:8,
                            window_scroll:500,
                            message:'provide tracking link',
                        });
                    }


                    if(this.selectedCountries.length == 0)
                    {
                        this.country_validation =true;
                        this.errors.push({
                            error_id:9,
                            window_scroll:800,
                            message:'select a country',
                        });
                    }
                    if(this.errors.length == 0) return true;
                    e.preventDefault();
                    this.displayValidationMessage();
                },
                initValue:()=>{
                    console.log(dataVar.allservices);
                },
                populateServiceDetails:(evt)=>{
                    let servic = dataVar.allservices.find(d=>d.id == $(evt.target).val());
                    l(dataVar.service_id);
                    dataVar.service_id = $(evt.target).val();
                    _serviceDetailsHelper(servic);
                },
                _bidRangePopulate:()=>
                {
                        let ss = dataVar.allservices.find(d => d.id == dataVar.service_id);
                        return ss.service_price.find(d=> d.service_id == dataVar.service_id
                                                && d.service_mode == dataVar.service_mode
                                                && d.platform == dataVar.platform
                                                && d.pay_mode == dataVar.pay_mode
                                                && d.required_days == dataVar.required_day
                                                && d.times == dataVar.times
                                                );
                },
                allTraffic_source:()=>{
                    if(dataVar.all_traffic_source ===true)
                    {
                        dataVar.traffic_source.android = true;
                        dataVar.traffic_source.ios = true;
                        dataVar.traffic_source.desktop = true;
                        dataVar.traffic_source_err = true;
                        removeErroMessage(1);
                    }
                    else
                    {
                        dataVar.traffic_source.android = false;
                        dataVar.traffic_source.ios = false;
                        dataVar.traffic_source.desktop = false;
                        dataVar.traffic_source_err = false;
                    }
                },
                traffic_source_android:()=>{
                    if(dataVar.all_traffic_source === true)
                    {
                        dataVar.all_traffic_source = !dataVar.all_traffic_source;
                    }

                    if(traffic_source.android === true)
                    {
                        dataVar.traffic_source_err = true;
                        removeErroMessage(1);
                    }

                },
                traffic_source_ios:()=>{
                    if(dataVar.all_traffic_source ===true)
                    dataVar.all_traffic_source = !dataVar.all_traffic_source;

                    if(dataVar.traffic_source.ios === true){
                        dataVar.traffic_source_err = true;
                        removeErroMessage(1);
                    }
                },
                traffic_source_desktop:()=>{
                    if(dataVar.all_traffic_source ===true)
                    dataVar.all_traffic_source = !dataVar.all_traffic_source;

                    if(dataVar.traffic_source.desktop === true){
                        dataVar.traffic_source_err = true;
                        console.log(this);
                        removeErroMessage(1);
                    }
                },
                validate_app_link()
                {

                    this.loader = true;
                    if(this.category_id == 1)
                    {

                        if(this.service_id == 1 || this.service_id == 2 || this.service_id == 3)
                        {
                            //console.log('something to happen',this.service_id);
                            if(this.platform !=='ios')
                            {
                                fetch("{{url('validate-android-app')}}",{
                                    headers:{
                                        "Content-Type": "application/json",
                                        "Accept": "application/json",
                                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                    },
                                    method:'post',
                                    credentials:'same-origin',
                                    body:JSON.stringify({
                                        app_type:"android",
                                        app_link:this.app_link
                                    }),
                                })
                                .then(res=>{
                                    if(res.ok)
                                    {
                                        return res.json();
                                    }
                                    else
                                    {
                                        this.loader = false;
                                        this.youtube_video_validated = false;
                                        this.youtube_video_validation_msg='Unable to validate urll, please try again';
                                        this.youtube_channel_info =``;
                                    }
                                })
                                .then(res=>{
                                    if(typeof res !=='string' && typeof res !=='undefined')
                                    {
                                        this.loader = false;
                                        this.youtube_video_validated = true;
                                        removeErroMessage(5);
                                        this.youtube_channel_info = `
                                        <div class='image-cotainer'>
                                            <img src='${res.app_icon}' />
                                        </div>
                                        <div class="content-container">
                                            <h4> ${res.app_name}</h4>
                                            <p>No. of installs = ${res.number_of_installs}</p>
                                        </div>
                                        `;
                                        this.youtube_video_validation_msg='';
                                    }
                                    else
                                    {
                                        this.loader = false;
                                        this.youtube_video_validated = false;
                                        this.youtube_video_validation_msg='unable to validate app url, please try again';
                                        this.youtube_channel_info =``;
                                    }
                                });
                            }
                            else if(this.platform ==='ios')
                            {
                                fetch("{{url('validate-android-app')}}",{
                                    headers:{
                                        "Content-Type": "application/json",
                                        "Accept": "application/json",
                                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                    },
                                    method:'post',
                                    credentials:'same-origin',
                                    body:JSON.stringify({
                                        app_type:"ios",
                                        app_link:this.app_link
                                    }),
                                })
                                .then(res=>{
                                    if(res.ok)
                                    {
                                        return res.json();
                                    }
                                    else
                                    {
                                        this.loader = false;
                                        this.youtube_video_validated = false;
                                        this.youtube_video_validation_msg='unable to validate app url, please try again';
                                        this.youtube_channel_info =``;
                                    }
                                })
                                .then(res=>{
                                    if(typeof res !=='string')
                                    {
                                        this.loader = false;
                                        this.youtube_video_validated = true;
                                        removeErroMessage(5);
                                        this.youtube_channel_info = `
                                        <div class='image-cotainer'>
                                            <img src='${res.app_icon}' />
                                        </div>
                                        <div class="content-container">
                                            <h4> ${res.app_name}</h4>
                                            <p>App has ${res.number_of_installs}</p>
                                        </div>`;
                                        this.youtube_video_validation_msg='';
                                    }
                                    else
                                    {
                                        this.loader = false;
                                        this.youtube_video_validated = false;
                                        this.youtube_video_validation_msg='unable to validate app url, please try again';
                                    }
                                });
                            }
                        }
                    }
                    else if(this.category_id == 2)
                    {
                        if(this.service_id == 4)
                        {
                            let myUrl = new URL(this.app_link);
                            let api_key = 'AIzaSyAcaHyOS6cKHwXQSZheB7JiBdJAVmCMzF0';
                            if(myUrl.pathname.includes('channel'))
                            {
                                let channel_id = myUrl.pathname.split('/')[2];
                                let api_url = "https://www.googleapis.com/youtube/v3/channels?part=snippet,contentDetails,statistics&id=" +channel_id+ "&key=" +api_key;

                                fetch(api_url).then(res=>res.json())
                                .then(res=>{
                                    if(res.pageInfo.totalResults == 1)
                                    {
                                        this.loader = false;
                                        this.youtube_video_validated=true;
                                        removeErroMessage(5);
                                        this.youtube_channel_info = `
                                        <div class="image-cotainer">
                                            <img src='${res.items[0].snippet.thumbnails.default.url}' class='img-rounded'   width="50" height="40" />
                                        </div>
                                        <div class="content-container">
                                            <h4> ${res.items[0].snippet.title}</h4>
                                            <p>Total videos = ${res.items[0].statistics.videoCount}</p>
                                            <p>Total views = ${res.items[0].statistics.viewCount}</p>
                                        </div>
                                        `;
                                        this.youtube_video_validation_msg='';
                                    }
                                    else
                                    {
                                        this.loader = false;
                                        this.youtube_video_validated=false;
                                        this.youtube_video_validation_msg='Invalid Url';
                                    }
                                });
                            }

                            //alert('hello world');
                        }
                        else if(this.service_id== 5 || this.service_id == 6)
                        {
                            if(this.app_link !='')
                            {
                                //parsing url
                                let myurl = new URL(this.app_link);
                                let search_results = myurl.search.split('&');
                                let video_id ='';
                                let video_index = null;
                                for (let index = 0; index < search_results.length; index++) {
                                    if(search_results[index].includes('v='))
                                    {
                                        //let inn = search_results[index].indexOf('v=');
                                        video_id = search_results[index].split('v=')[1];
                                        break;
                                    }
                                }
                                if(video_id != '')
                                {
                                    let api_key = 'AIzaSyAcaHyOS6cKHwXQSZheB7JiBdJAVmCMzF0';
                                    let api_url = "https://www.googleapis.com/youtube/v3/videos?part=id&id=" +video_id+ "&key=" +api_key;
                                    fetch(api_url).then(res=>res.json())
                                    .then(res=>{
                                        if(res.pageInfo.totalResults==1)
                                        {
                                            this.loader = false;
                                            this.youtube_video_validated=true;
                                            removeErroMessage(5);
                                            this.loadYouTubeVideo(video_id);
                                            this.youtube_video_validation_msg='';
                                        }
                                        else
                                        {
                                            this.loader = false;
                                            this.youtube_video_validated=false;
                                            youtube_video_validation_msg='sorry! we have not found any video with this link'
                                        }

                                    });
                                }
                            }
                        }
                    }
                },
                loadYouTubeVideo(id){
                    $('#youtube_video_frame').append("<iframe width='320' height='150' src='//www.youtube.com/embed/"+id+"?autoplay=1' frameborder='0' allowfullscreen></iframe>");
                },
            }
        })();

        const app  = new Vue({
            el:"#myApp",
            data:dataVar,
            methods:mthd,
            created(){
                this.initValue();
                this.each_bid = parseFloat(this.bidMin);
            },
            mounted() {
                 this.allservices = <?=json_encode($services)?>;

            },
            computed:compute,
            watch:watcher,

        });

        function removeErroMessage(error_id)
        {
            dataVar.errors.forEach((err) => {
                    if(err.error_id == error_id)
                    {
                        dataVar.errors.splice(dataVar.errors.indexOf(err),1);
                    }
                });
        }

        const Campaign = (function(vm){
            'use strict'
            let categories = <?=json_encode($cate)?>;
            let services = <?=json_encode($services)?>;
            let _categoryHelper = function(se)
            {
                let txt = ``;
                    se.forEach(element => {
                        txt += `<option value="${element.id}">${element.name}</option>`;
                    });
                    $("#campaign-service").html(txt);
            }

            return {
                allservices : services,
                init : ()=>{
                    let cat_id = $("#campaign-category").val();
                    let ca = categories.find(d=>d.id == cat_id);
                    $("#category-description").text(ca.description);
                    let se = services.filter(d=>d.category_id == cat_id);
                    _categoryHelper(se);
                    let s_id = $("#campaign-service").val();
                    let servic = services.find(d=>d.id == s_id);
                    _serviceDetailsHelper(servic);
                    dataVar.category_id = cat_id;
                },
                poplateServices : function(evt)
                {
                    let se = services.filter(d=>d.category_id == $(evt).val());
                    let ca = categories.find(d=>d.id == $(evt).val());
                    $("#category-description").text(ca.description);
                    this.init();
                    dataVar.category_id =  $(evt).val();

                    if($(evt).val() == '2'
                    || $(evt).val() == '3'
                    || $(evt).val() == '4'
                    || $(evt).val() == '5'
                    || $(evt).val() == '9'
                    || $(evt).val() == '10'
                    )
                    {
                        dataVar.traffic_source.visible = true;
                        dataVar.traffic_source.android = false;
                        dataVar.traffic_source.ios = false;
                        dataVar.traffic_source.desktop = false;
                        dataVar.all_traffic_source = false;
                    }
                    else
                    {
                        dataVar.traffic_source.visible = false;
                    }

                    if($(evt).val() == '6')
                    {
                        dataVar.traffic_source.podcast_visible = true;
                    }
                    else
                    {
                        dataVar.traffic_source.podcast_visible = false;
                    }
                },
            }
        })(app);
        Campaign.init();

        function _serviceDetailsHelper(service)
        {
                dataVar.platform = null;
                dataVar.pay_mode = null;
                if(service!==undefined)
                {

                    dataVar.service_id = service.id;
                    if(service.service_type == "app")
                    {
                        $('.hidden-forms').hide();
                        $('.app-type, .platform').show('slow');
                    }
                    else if(service.service_type == "trackAlbum")
                    {
                        $('.hidden-forms').hide();
                        $(".track-album-play-list").show('slow');
                    }
                    else if(service.service_type == "trackAlbumPlaylist")
                    {
                        $('.hidden-forms').hide();
                        $(".track-album-play-list").show('slow');
                        $(".playlists").show();
                    }
                    else
                    {
                        $('.hidden-forms').hide('slow');
                    }

                    if(service.keyword_option == 1)
                    {
                        $('.keyword-option').show('slow');
                    }
                    else
                    {
                        $('.keyword-option').hide('slow');
                    }


                    $("#services-text").text(service.description);
                    $("#app-link-text").text(service.link_heading);
                    $("#app-label-text").text(service.link_label);
                    $("#tracking-method-label").text(service.mode);
                    if(service.mode == "tracking")
                    {
                        $(".tracking-mode").show('slow');
                        app.service_mode = "standard";
                    }
                    else if(service.mode == "timing")
                    {
                        app.service_mode = service.mode;

                        let sp = service.service_price;
                        let tx = `<option value="">Select Time</option>`;
                        sp.forEach(o => {
                            tx += `<option value="${o.times}">${o.times} Seconds</option>`;
                        });
                        $("#timing-type").html(tx);
                        $(".timing-mode").show('slow');

                    }
                    else if(service.mode == "verify")
                    {
                        app.service_mode = service.mode;
                        let sp = service.service_price;
                        let tx = `<option value="">Select verifying Mode</option>`;
                        sp.forEach(o => {
                            tx += `<option value="${o.id}">${o.required_days} Days</option>`;
                        });
                        $("#verifying-type").html(tx);
                        $(".verifying-mode").show('slow');

                    }
                    else
                    {
                        app.service_mode = null;
                    }

                }
        }
        $('#countrrry').on('select2:close',function(evt){
            app.selectedCountries = $('#countrrry').select2('data');
        });
        $(function() {

        $("#start_date_set").click(function(){
            $('#date-start').bootstrapMaterialDatePicker(
            { weekStart: 0, format: 'dddd DD MMMM YYYY - HH:mm',time: false}
            ).on('change', function(e, date) {
            $('#date-end').bootstrapMaterialDatePicker('setMinDate', date, {format: 'dddd DD MMMM YYYY - HH:mm'});
          });
        });

        $(document).on('input', '#BidPerInstall', function() {
            var bid = $(this).val();
            $("input[name='BidPerInstall']").val(bid);

        });
        $(document).on('input','#campign_quantity', function() {
            var cb = $(this).val();
            $("input[name='campign_quantity']").val(cb);
        });

    });
    </script>

@endsection
