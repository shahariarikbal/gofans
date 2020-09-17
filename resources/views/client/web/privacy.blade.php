@extends('client.layout-web')

@section('title')
Privacy Policy - Go2Top Media
@endsection

@section('content')
<div class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Privacy Policy</h1>
                <span><a href="{{ route('client.web.home') }}">Home</a>Privacy Policy</span>
            </div>
        </div>
    </div>
</div>

<section class="contact-info m-0">
    <div class="container">
        <div class="row justify-content-center" id="tabs" >
            <div class="col-3">
                <a href="#advertisers" onclick="showForm('advertisers')" data-toggle="tab" class="nav-link active">
                    <div class="info-item advertiser regActive">
                        <div class="icon">
                            <i class="fa fa-cubes"></i>
                        </div>
                        <h4>Advertisers</h4>
                    </div>
                </a>
            </div>
            <div class="col-3">
                <a href="#publishers" onclick="showForm('publishers')" data-toggle="tab" class="nav-link active">
                    <div class="info-item publisher">
                        <div class="icon">
                            <i class="fa fa-trophy"></i>
                        </div>
                        <h4>Publishers</h4>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>


<section class="contact-us mt-0 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" id="advertiser">
                <div class="section-heading" style="margin-top: 20px; margin-bottom: 20px;">
                    <h3>ADVERTISERS PRIVACY POLICY</h3>
                </div>

                <p>Hello! This privacy policy explains Tapjoy’s privacy practices in connection with information collected about you through your use of Tapjoy Services, including our platform for publisher monetization through advertising and market research campaigns, our dashboard, and our website. (“Tapjoy” means Tapjoy, Inc. and its subsidiaries and affiliates, and may also refer to our advertiser and publisher services, including our dashboard, and our website.)</p>
                
                <h5 style="margin-top: 20px; margin-bottom: 10px;">WHAT IS TAPJOY?</h5>
                <p>Tapjoy, Inc. operates a platform that enables advertisers and market researchers (collectively referred to as “campaign partners”) to reach the users of mobile apps, mobile app users to be compensated for their attention to campaigns, and mobile app publishers to receive revenue based on their users’ interactions with campaigns displayed in their applications. Tapjoy is a member of the Interactive Advertising Bureau (IAB). More information about the IAB may be found here [<a href="http://www.iab.net/public_policy/codeofconduct">http://www.iab.net/public_policy/codeofconduct</a>]. Publishers use Tapjoy by adding our SDK to their apps; this allows us to display ads, ad offers, and market research offers (collectively referred to as “campaign content”) on behalf of our campaign partners, in space within the app.  (“SDK” is short for “software development kit”, meaning software that an app publisher can include in its app to enable Tapjoy services in the app.) Campaign partners use Tapjoy by placing orders for campaigns using our services to display their campaign content; in turn, publishers and Tapjoy share the money paid by campaign partners for displaying the campaigns in their apps. Users access campaign content through campaign placements in a participating publisher’s app. These campaigns include an offerwall, which allows a user to choose from a page of various rewarded ad or market research offers (“rewarded” meaning that the user receives a reward in the coins, gems, points, or other in-app virtual currency tokens used in the app they’re using); rewarded video, which offers the user virtual currency reward in exchange for engaging with video campaign content; and interstitial video, which rewards the user with virtual currency or access to premium app content in exchange for a short commercial break. To further support our publishers, we also offer related optional services, such as analytics, which helps publishers understand how their users use their apps, and virtual currency management services, which helps publishers manage in-app virtual currency. We provide customer support for users who did not receive an expected in-app reward; this involves working with the campaign partner, the user, and the publisher to identify and resolve the issue.</p>
                
                <h5 style="margin-top: 20px; margin-bottom: 10px;">WHAT INFORMATION DOES TAPJOY COLLECT, AND FOR WHAT PURPOSE?</h5>
                <p>That depends on how you interact with Tapjoy. Read on to learn about the following categories:</p>
                <li>If you are an individual who uses a mobile app that uses Tapjoy publisher services, go to the section titled Information collected through our monetization platform</li>
                <li>If you are an individual who submitted a customer support ticket relating to an ad or offer, go to the section titled Customer Support Information</li>
                <li>If you access Tapjoy’s corporate website (<a href="http://www.tapjoy.com">www.tapjoy.com</a>), or if you use Tapjoy’s dashboard to manage your Tapjoy advertiser, market research, or publisher services, go to the section titled Website and dashboard user information </li>
                <li>All users should also review the section titled General privacy practices</li>
                
                <h5 style="margin-top: 20px; margin-bottom: 10px;">INFORMATION COLLECTED THROUGH OUR MONETIZATION PLATFORM</h5>
                <h6 style="margin-top: 20px; margin-bottom: 10px;">FIRST, WHAT IS NOT COLLECTED?</h6>
                <p>It may be helpful to know what information is not collected about you or your device: Tapjoy’s monetization platform does not automatically access, collect, or receive your name, your email address, your username, your physical address, your phone number, your credit card or other financial information. If you opt in to engage with campaign content displayed through the Tapjoy monetization platform, the ad or offer may ask you for personal information. For example, an ad or offer may link to an advertiser’s web site, where the advertiser may ask for your email address to join its mailing list, or your payment information if you are buying its products. A market research survey accessed through the Tapjoy platform may involve questions about your location (e.g., postal code), demographics, or other information. In each case, it is up to you whether to provide the information requested, and any information you choose to provide in these circumstances is considered voluntarily given. You are always free to decline to provide information in connection with a campaign, though doing so may affect whether the campaign partner considers you to have completed the action required to earn the reward. In connection with customer support, you may provide us with additional information, such as your email address or Twitter handle, and which we use to respond to your request; see Customer support information, below.)</p>
                <h6 style="margin-top: 20px; margin-bottom: 10px;">WHAT INFORMATION IS COLLECTED THROUGH TAPJOY’S MONETIZATION PLATFORM?</h6>
                <p>If you are an individual who uses a mobile app, and the app’s publisher uses Tapjoy monetization services, we receive and collect information about your device and the campaign content you access through our services, and we use this information to reward you for campaign engagement, to draw inferences about which campaign content may be more or less interesting to you, and to provide publishers with information about how their apps are used. This information is collected through our SDK, as integrated into the app you use to access campaign content, and through your interactions with campaign content accessed through or on our monetization platform. Under Tapjoy’s publisher terms of service, app publishers that integrate and use Tapjoy’s monetization services must notify their users of the collection and use of their data in connection with Tapjoy’s monetization services, as described in this policy, and obtain their consent to the extent required by applicable law. To learn about opting out of the use of this information as described in this policy, go to the section titled, How can I opt-out of interest-based advertising?  Here are the types of information that we collect through the Tapjoy monetization platform and services, based on the SDK version current as of the date of this privacy policy. (Please note that not all publishers update their app to reflect each SDK update or version we release; in addition, some parameters are optional or can be changed based on publisher choices in integration.):</p>
            </div>
            <div class="col-lg-12" id="publishers">
                <div class="section-heading" style="margin-top: 20px; margin-bottom: 20px;">
                    <h3>PUBLISHERS PRIVACY POLICY</h3>
                </div>

                <p>Hello! This privacy policy explains Tapjoy’s privacy practices in connection with information collected about you through your use of Tapjoy Services, including our platform for publisher monetization through advertising and market research campaigns, our dashboard, and our website. (“Tapjoy” means Tapjoy, Inc. and its subsidiaries and affiliates, and may also refer to our advertiser and publisher services, including our dashboard, and our website.)</p>
                
                <h5 style="margin-top: 20px; margin-bottom: 10px;">WHAT IS TAPJOY?</h5>
                <p>Tapjoy, Inc. operates a platform that enables advertisers and market researchers (collectively referred to as “campaign partners”) to reach the users of mobile apps, mobile app users to be compensated for their attention to campaigns, and mobile app publishers to receive revenue based on their users’ interactions with campaigns displayed in their applications. Tapjoy is a member of the Interactive Advertising Bureau (IAB). More information about the IAB may be found here [<a href="http://www.iab.net/public_policy/codeofconduct">http://www.iab.net/public_policy/codeofconduct</a>]. Publishers use Tapjoy by adding our SDK to their apps; this allows us to display ads, ad offers, and market research offers (collectively referred to as “campaign content”) on behalf of our campaign partners, in space within the app.  (“SDK” is short for “software development kit”, meaning software that an app publisher can include in its app to enable Tapjoy services in the app.) Campaign partners use Tapjoy by placing orders for campaigns using our services to display their campaign content; in turn, publishers and Tapjoy share the money paid by campaign partners for displaying the campaigns in their apps. Users access campaign content through campaign placements in a participating publisher’s app. These campaigns include an offerwall, which allows a user to choose from a page of various rewarded ad or market research offers (“rewarded” meaning that the user receives a reward in the coins, gems, points, or other in-app virtual currency tokens used in the app they’re using); rewarded video, which offers the user virtual currency reward in exchange for engaging with video campaign content; and interstitial video, which rewards the user with virtual currency or access to premium app content in exchange for a short commercial break. To further support our publishers, we also offer related optional services, such as analytics, which helps publishers understand how their users use their apps, and virtual currency management services, which helps publishers manage in-app virtual currency. We provide customer support for users who did not receive an expected in-app reward; this involves working with the campaign partner, the user, and the publisher to identify and resolve the issue.</p>
                
                <h5 style="margin-top: 20px; margin-bottom: 10px;">WHAT INFORMATION DOES TAPJOY COLLECT, AND FOR WHAT PURPOSE?</h5>
                <p>That depends on how you interact with Tapjoy. Read on to learn about the following categories:</p>
                <li>If you are an individual who uses a mobile app that uses Tapjoy publisher services, go to the section titled Information collected through our monetization platform</li>
                <li>If you are an individual who submitted a customer support ticket relating to an ad or offer, go to the section titled Customer Support Information</li>
                <li>If you access Tapjoy’s corporate website (<a href="http://www.tapjoy.com">www.tapjoy.com</a>), or if you use Tapjoy’s dashboard to manage your Tapjoy advertiser, market research, or publisher services, go to the section titled Website and dashboard user information </li>
                <li>All users should also review the section titled General privacy practices</li>
                
                <h5 style="margin-top: 20px; margin-bottom: 10px;">INFORMATION COLLECTED THROUGH OUR MONETIZATION PLATFORM</h5>
                <h6 style="margin-top: 20px; margin-bottom: 10px;">FIRST, WHAT IS NOT COLLECTED?</h6>
                <p>It may be helpful to know what information is not collected about you or your device: Tapjoy’s monetization platform does not automatically access, collect, or receive your name, your email address, your username, your physical address, your phone number, your credit card or other financial information. If you opt in to engage with campaign content displayed through the Tapjoy monetization platform, the ad or offer may ask you for personal information. For example, an ad or offer may link to an advertiser’s web site, where the advertiser may ask for your email address to join its mailing list, or your payment information if you are buying its products. A market research survey accessed through the Tapjoy platform may involve questions about your location (e.g., postal code), demographics, or other information. In each case, it is up to you whether to provide the information requested, and any information you choose to provide in these circumstances is considered voluntarily given. You are always free to decline to provide information in connection with a campaign, though doing so may affect whether the campaign partner considers you to have completed the action required to earn the reward. In connection with customer support, you may provide us with additional information, such as your email address or Twitter handle, and which we use to respond to your request; see Customer support information, below.)</p>
                <h6 style="margin-top: 20px; margin-bottom: 10px;">WHAT INFORMATION IS COLLECTED THROUGH TAPJOY’S MONETIZATION PLATFORM?</h6>
                <p>If you are an individual who uses a mobile app, and the app’s publisher uses Tapjoy monetization services, we receive and collect information about your device and the campaign content you access through our services, and we use this information to reward you for campaign engagement, to draw inferences about which campaign content may be more or less interesting to you, and to provide publishers with information about how their apps are used. This information is collected through our SDK, as integrated into the app you use to access campaign content, and through your interactions with campaign content accessed through or on our monetization platform. Under Tapjoy’s publisher terms of service, app publishers that integrate and use Tapjoy’s monetization services must notify their users of the collection and use of their data in connection with Tapjoy’s monetization services, as described in this policy, and obtain their consent to the extent required by applicable law. To learn about opting out of the use of this information as described in this policy, go to the section titled, How can I opt-out of interest-based advertising?  Here are the types of information that we collect through the Tapjoy monetization platform and services, based on the SDK version current as of the date of this privacy policy. (Please note that not all publishers update their app to reflect each SDK update or version we release; in addition, some parameters are optional or can be changed based on publisher choices in integration.):</p>
            </div>
        </div>
    </div>
</section>


@endsection

@section('script')
    <script>
        function showForm(type){
            if(type === 'advertisers'){
                $('#advertiser').fadeIn()
                $('#advertiser').show()
                $('#publisher').hide()
                $('.regActive').removeClass('regActive');
                $('.advertiser').addClass('regActive');
            }else if(type == 'publishers'){
                $('#publisher').fadeIn()
                $('#advertiser').hide()
                $('#publisher').show()
                $('.regActive').removeClass('regActive');
                $('.publisher').addClass('regActive');
            }else{
                $('#advertiser').hide()
                $('#publisher').hide()
                $('.regActive').removeClass('regActive');
            }
        }

    </script>
@endsection
