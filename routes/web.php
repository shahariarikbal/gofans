<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['domain' => env('AUDIENCE_DOMAIN')], function () {



    Route::get('/newsfeed-post-show', 'NewsfeedController@show');
    Route::get('/newsfeed/edit/{newsfeed}', 'NewsfeedController@edit');
    Route::post('/newsfeed-update', 'NewsfeedController@update');
    Route::get('/newsfeed-post-delete/{id}', 'NewsfeedController@delete');
    Route::get('/about-us', 'User\Web\WebController@about')->name('web.about');
    Route::get('/contact-us', 'User\Web\WebController@contact')->name('web.contact');
    Route::get('/privacy-policy', 'User\Web\WebController@privacyPolicy')->name('web.privacyPolicy');
    Route::get('/terms-services', 'User\Web\WebController@termsServices')->name('web.termsServices');

    //Sciolite Routes
    Route::get('/redirect/{providerName}', 'Auth\LoginController@redirectToProvider')->name('social.login');
    Route::get('/auth/facebook/callback', 'Auth\LoginController@handleProviderCallback')->name('callback');




    //Audience Panel...
    // Route::domain('audience.'.env('AUDIENCE_DOMAIN'))->group(function () {
        Route::get('/', 'Auth\LoginController@showLoginForm')->name('user.login');
        Route::get('/verify-code', 'Auth\LoginController@verifyCodeForm')->name('user.verifyCode');
        Route::get('/resend-code', 'Auth\LoginController@resendCode')->name('user.resendCode');
        Route::post('/verify-code-login', 'Auth\LoginController@verifyCodeLogin')->name('user.verifyCodeLogin');
        Route::get('/register/ref/{referral_code}', 'Auth\RegisterController@refRegister')->name('user.refRegister');
        Route::post('/register/ref/{referral_code}', 'Auth\RegisterController@refRegisterStore')->name('user.refRegisterStore');
        Route::post('/timeline/user-avatar-change/{user}', 'Auth\RegisterController@avatarStore');
        Route::post('/timeline/user-cover-change/{user}', 'Auth\RegisterController@coverStore');
        Auth::routes();

        Route::group(['middleware' => 'auth'], function(){
            //Audience Website...
            Route::get('/', function (){
               return redirect(url('newsfeed'));
            });


            //Route::get('/newsfeed', 'User\Web\WebController@index')->name('web.home');
//            Route::get('/timeline/{user}', 'User\Web\WebController@timeline');
            Route::post('/store-post-comment/{post}', 'User\Web\WebController@comment');
            Route::get('/comments-show', 'User\Web\WebController@show');

            Route::get('home', 'User\DashboardController@index')->name('user.dashboard');
            Route::get('profile', 'User\ProfileController@profileView')->name('user.profileView');
            Route::get('profile-edit', 'User\ProfileController@profileEdit')->name('user.profileEdit');
            Route::post('profile-update/{id}', 'User\ProfileController@profileUpdate')->name('user.profileUpdate');
            Route::get('referrals', 'User\ProfileController@referrals')->name('user.referrals');


            Route::post('profile-setting', 'User\ProfileController@profileSetting')->name('user.profile.setting');
            Route::post('profile-setting-update/{id}', 'User\ProfileController@profileSettingUserInfo')->name('user.profile.setting.user');
            Route::post('profile-setting-update/{id}', 'User\ProfileController@profileSettingEmail')->name('user.profile.setting.email');
            Route::post('profile-setting-update/{id}', 'User\ProfileController@profileSettingPassword')->name('user.profile.setting.password');


            Route::post('about-profile', 'User\ProfileController@aboutProfile')->name('user.profile.about');
            Route::get('/register/{referral_code}', 'User\ProfileController@refRegister')->name('user.refRegister');
            Route::post('/register/{referral_code}', 'Auth\RegisterController@storeRefRegister')->name('user.store.refRegister');


            // Task ...
            Route::get('tasks', 'User\TaskController@myTask')->name('user.task');
            Route::get('task-view/{id}', 'User\TaskController@taskView')->name('user.taskView');
            // Withdraw ...
            Route::resource('withdraw', 'User\WithdrawController');

            // Ticket ...
            Route::resource('ticket', 'User\TicketController');

            // two factor auth ...
            Route::get('two-factor-auth', 'User\DashboardController@twoFactorAuth')->name('user.twoFactorAuth');
            Route::get('two-factor-auth-active', 'User\DashboardController@twoFaAuthActive')->name('user.twoFaAuthActive');
            Route::get('two-factor-auth-inactive', 'User\DashboardController@twoFaAuthInactive')->name('user.twoFaAuthInactive');

            Route::get('earn-point/{id}', 'User\EarnController@index')->name('user.earnPoints');
            Route::get('earn-point/service/{id}', 'User\EarnController@earnPointService')->name('user.earnPointService');
            Route::get('earning-history', 'User\EarnController@earningHistory')->name('user.earningHistory');

            Route::get('faq', 'User\DashboardController@faq')->name('user.faq');
            Route::get('inbox', 'User\DashboardController@inbox')->name('user.inbox');
            Route::get('inbox/{id}', 'User\DashboardController@viewMessage')->name('user.viewMessage');

            //GoFans Session Api
            Route::post('comment-store', 'User\Web\ApiController@commentStore')->name('user.commentStore');
            Route::get('comment-edit/{comment}', 'User\Web\ApiController@commentEdit')->name('user.commentEdit');
            Route::post('comment-update/{id}', 'User\Web\ApiController@commentUpdate')->name('user.commentUpdate');
            Route::delete('comment-delete/{comment}', 'User\Web\ApiController@commentDelete')->name('user.commentDelete');
            Route::post('reply-store', 'User\Web\ApiController@replyStore')->name('user.replyStore');
            Route::get('reply-edit/{reply}', 'User\Web\ApiController@replyEdit')->name('user.replyEdit');
            Route::post('reply-update/{id}', 'User\Web\ApiController@replyUpdate')->name('user.replyUpdate');
            Route::delete('reply-delete/{reply}', 'User\Web\ApiController@replyDelete')->name('user.replyDelete');
            Route::get('comment-all', 'User\Web\ApiController@getComments')->name('user.getComments');

            // Vue Route and Session API Routes
            //Auth
            Route::get('user-logout', 'Auth\LoginController@logout');

            Route::post('get-user', 'User\Web\ApiController@getUser');

            Route::post('get-newsfeed', 'User\Web\ApiController@getNewsfeed');
            Route::post('/newsfeed-store', 'User\Web\ApiController@newsfeedStore');
            Route::get('/newsfeed-edit/{newsfeed}', 'User\Web\ApiController@newsfeedEdit');
            Route::post('/newsfeed-update/{id}', 'User\Web\ApiController@newsfeedUpdate');
            Route::delete('/newsfeed-delete/{newsfeed}', 'User\Web\ApiController@newsfeedDelete');
            Route::delete('/modal-image-delete/{id}', 'User\Web\ApiController@modalImageDelete');
            Route::post('/user-profile-picture-change/{user}', 'User\Web\ApiController@userProfilePictureChange');
            Route::post('/user-cover-picture-change/{user}', 'User\Web\ApiController@userCoverPictureChange');
            Route::post('/user-photos', 'User\Web\ApiController@userPhotos');
            Route::post('/user-videos', 'User\Web\ApiController@userVideos');

            Route::get('get-countries', 'User\Web\ApiController@getCountry');

            // Friendship
            Route::get('get-suggest-friends', 'User\Web\FriendController@getSuggestFriend');
            Route::post('get-friendship', 'User\Web\FriendController@getFriendship');
            Route::post('get-my-friends', 'User\Web\FriendController@getFriends');
            Route::post('get-my-friend-requests', 'User\Web\FriendController@getMyFriendRequest');
            Route::post('add-friend', 'User\Web\FriendController@addFriend');
            Route::post('cancel-request', 'User\Web\FriendController@cancelRequest');
            Route::post('accept-request', 'User\Web\FriendController@acceptRequest');
            Route::post('remove-request', 'User\Web\FriendController@removeRequest');
            Route::post('block-friend', 'User\Web\FriendController@blockFriend');
            Route::post('check-friend', 'User\Web\FriendController@checkFriend');

            Route::post('update-user-profile', 'User\ProfileController@updateUserProfile');

            Route::get( '/{vue_route?}', 'User\Web\WebController@vueIndex' )->where( 'vue_route', '(.*)' );
        });
    // });

    Route::get('/{url}', 'User\Web\WebController@error');
    Route::get('/{url}/{url2}', 'User\Web\WebController@error');

    //Audience Admin Panel...
    Route::domain('admin.'.env('AUDIENCE_DOMAIN'))->group(function () {
        Route::get('/', 'AdminUser\Auth\LoginController@showLoginForm')->name('AdminUser.login');
        Route::get('/login', 'AdminUser\Auth\LoginController@showLoginForm')->name('AdminUser.login');
        Route::post('login', 'AdminUser\Auth\LoginController@login')->name('AdminUser.login');
        Route::post('logout', 'AdminUser\Auth\LoginController@logout')->name('AdminUser.logout');
        Route::post('password/email', 'AdminUser\Auth\ForgotPasswordController@sendResetLinkEmail')->name('AdminUser.password.email');
        Route::get('password/reset', 'AdminUser\Auth\ForgotPasswordController@showLinkRequestForm')->name('AdminUser.password.request');
        Route::post('password/reset', 'AdminUser\Auth\ResetPasswordController@reset');
        Route::get('password/reset/{token}', 'AdminUser\Auth\ResetPasswordController@showResetForm')->name('AdminUser.password.reset');


        Route::group(['middleware' => 'auth:AdminUser'], function(){
            Route::get('dashboard', 'AdminUser\AdminUserController@index')->name('AdminUser.dashboard');
            Route::get('profile', 'AdminUser\AdminUserController@profileView')->name('AdminUser.profileView');
            Route::get('profile-edit', 'AdminUser\AdminUserController@profileEdit')->name('AdminUser.profileEdit');
            Route::post('profile-update/{id}', 'AdminUser\AdminUserController@profileUpdate')->name('AdminUser.profileUpdate');

            // Admin ...
            Route::resource('admin-user', 'AdminUser\AdminController');
            // Ticket Subject ...
            Route::get('user-tickets', 'AdminUser\TicketSubjectController@userTickets')->name('userTickets');
            Route::get('ticket-open/{id}', 'AdminUser\TicketSubjectController@ticketOpen')->name('ticketOpen');
            Route::get('ticket-closed/{id}', 'AdminUser\TicketSubjectController@ticketClosed')->name('ticketClosed');
            Route::resource('ticket-subject', 'AdminUser\TicketSubjectController');

            Route::resource('career', 'AdminUser\CareerController');
            Route::resource('education', 'AdminUser\EducationController');
            Route::resource('skill', 'AdminUser\SkillController');

            //users ...
            Route::get('user-list', 'AdminUser\UserController@userList')->name('AdminUser.userList');
            Route::get('user-unblock/{id}', 'AdminUser\UserController@unblock')->name('AdminUser.userUnblock');
            Route::get('user-block/{id}', 'AdminUser\UserController@block')->name('AdminUser.userBlock');
            Route::get('user-withdraw-request', 'AdminUser\UserController@withdrawRequest')->name('AdminUser.userWithdrawRequest');

            Route::get('user-withdraw-rate', 'AdminUser\WithdrawRateController@index')->name('AdminUser.withdrawRate');
            Route::post('user-withdraw-rate-store', 'AdminUser\WithdrawRateController@store')->name('AdminUser.withdrawRateStore');

            Route::resource('faq', 'AdminUser\FaqController');
            Route::resource('user-message', 'AdminUser\UserMessageController');
        });
    });
});

Route::group(['domain' => env('CLIENT_DOMAIN')], function () {
    //Client Website...
    Route::get('/', 'Client\Web\WebController@index')->name('client.web.home');
    Route::get('/advertisers', 'Client\Web\WebController@advertisers')->name('client.web.advertisers');
    Route::get('/publishers', 'Client\Web\WebController@publishers')->name('client.web.publishers');
    Route::get('/about-us', 'Client\Web\WebController@about')->name('client.web.about');
    Route::get('/terms-and-conditions', 'Client\Web\WebController@terms')->name('client.web.terms');
    Route::get('/privacy-policy', 'Client\Web\WebController@privacy')->name('client.web.privacy');
    Route::get('/contact-us', 'Client\Web\WebController@contact')->name('client.web.contact');
    Route::post('/contact-store', 'Client\Web\WebController@contactStore')->name('client.web.contactStore');

    Route::get('/customer-support', 'Client\Web\WebController@customerSupport')->name('client.web.customerSupport');
    Route::get('/resources-blog', 'Client\Web\WebController@resourcesBlog')->name('client.web.resourcesBlog');
    Route::get('/press-news', 'Client\Web\WebController@pressNews')->name('client.web.pressNews');

    Route::get('/login', 'Client\Web\WebController@login')->name('client.web.login');
    Route::get('/register', 'Client\Web\WebController@register')->name('client.web.register');

    //Client Panel...
    //Route::domain('client.'.env('CLIENT_DOMAIN'))->group(function () {
        //Route::get('/', 'Client\ClientController@index')->name('client.dashboard')->middleware('auth:client');
        //Route::get('/login', 'Client\Auth\LoginController@showLoginForm')->name('client.login');
        //Route::get('register', 'Client\Auth\RegisterController@showRegister')->name('client.register');
        Route::post('login', 'Client\Auth\LoginController@login')->name('client.login');
        Route::post('register', 'Client\Auth\RegisterController@register')->name('client.register');
        Route::post('logout', 'Client\Auth\LoginController@logout')->name('client.logout');
        Route::post('password/email', 'Client\Auth\ForgotPasswordController@sendResetLinkEmail')->name('client.password.email');
        Route::get('password/reset', 'Client\Auth\ForgotPasswordController@showLinkRequestForm')->name('client.password.request');
        Route::post('password/reset', 'Client\Auth\ResetPasswordController@reset');
        Route::get('password/reset/{token}', 'Client\Auth\ResetPasswordController@showResetForm')->name('client.password.reset');

        Route::get('/verify-code', 'Client\Auth\LoginController@verifyCodeForm')->name('client.verifyCode');
        Route::post('/verify-code-login', 'Client\Auth\LoginController@verifyCodeLogin')->name('client.verifyCodeLogin');


        Route::group(['middleware' => 'auth:client'], function(){
            Route::post('validate-android-app','Client\CampaignController@validateAndroid');
            Route::get('overview', 'Client\ClientController@index')->name('client.dashboard');
            Route::get('profile', 'Client\ClientController@profileView')->name('client.profileView');
            Route::get('profile-edit', 'Client\ClientController@profileEdit')->name('client.profileEdit');
            Route::post('profile-update/{id}', 'Client\ClientController@profileUpdate')->name('client.profileUpdate');

            // two factor auth ...
            Route::get('two-factor-auth-active', 'Client\ClientController@twoFaAuthActive')->name('client.twoFaAuthActive');
            Route::get('two-factor-auth-inactive', 'Client\ClientController@twoFaAuthInactive')->name('client.twoFaAuthInactive');

            Route::get('get-single-campaign/{id}', 'Client\CampaignController@viewCampaign');
            Route::post('campaign-price-adjust/{id}', 'Client\CampaignController@priceAdjustment');
            Route::post('campaign-update/{id}', 'Client\CampaignController@update');
            Route::resource('campaign', 'Client\CampaignController');

            // Billing ...
            Route::get('billing/add-funds', 'Client\BillingController@addFunds')->name('client.billingAddFunds');
            Route::get('billing/invoices', 'Client\BillingController@invoices')->name('client.billingInvoices');
            Route::get('billing/fund-requests-create', 'Client\BillingController@fundRequestCreate')->name('client.new_fund_request');
            Route::get('billing/fund-requests', 'Client\BillingController@fundRequest');
            Route::post('billing/send-fund-requests', 'Client\BillingController@sendFundRequest')->name('client.sendFundRequest');

            //just for testing
            Route::post('billing/fund-request/amarPay', 'Client\BillingController@amarPayFundRequest')->name('client.amarPay');
            Route::post('billing/payment-success', 'Client\BillingController@paidSuccess')->name('client.paymentSuccess');
            Route::post('billing/payment-failed', 'Client\BillingController@paidFailed')->name('client.paymentFailed');

            Route::post('billing/makePayTmOrder', 'Client\BillingController@makePayTmOrder')->name('client.payTmPayment');
            Route::post('billing/payment/status', 'Client\BillingController@payTmCallback');

            Route::post('billing/makecoinbase/payment-request', 'Client\BillingController@coinBasePaymentRequest')->name('client.coinbasePayment');
            Route::get('billing/coinbase/success', 'Client\BillingController@coinbaseSuccess');
            Route::get('billing/coinbase/success', 'Client\BillingController@coinbaseFailed');

            // Account setting
            Route::get('account-setting', 'Client\AccountController@accountSetting')->name('client.accountSetting');

            // Affiliate Program ...
            Route::get('affiliate/overview', 'Client\AffiliateProgramController@overview')->name('client.affiliateOverview');
            Route::get('affiliate/referrals', 'Client\AffiliateProgramController@referrals')->name('client.affiliateReferrals');

            //Faq Support
            Route::get('support', 'Client\FaqController@index')->name('client.support');
            // Regional Volume ...
            Route::get('regional-volume', 'Client\RegionalVolumeController@index')->name('client.RegionalVolume');

        });
    //});

    Route::get('/{url}', 'Client\Web\WebController@error');
    Route::get('/{url}/{url2}', 'Client\Web\WebController@error');


    //Client Admin Panel...
    Route::domain('admin.'.env('CLIENT_DOMAIN'))->group(function () {
        Route::get('/', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
        Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
        Route::post('login', 'Admin\Auth\LoginController@login')->name('admin.login');
        Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
        Route::post('password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        Route::get('password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
        Route::post('password/reset', 'Admin\Auth\ResetPasswordController@reset');
        Route::get('password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');

        Route::group(['middleware' => 'auth:admin'], function(){
            Route::get('dashboard', 'Admin\AdminController@dashboard')->name('admin.dashboard');

            Route::get('profile', 'Admin\AdminController@profileView')->name('admin.profileView');
            Route::get('profile-edit', 'Admin\AdminController@profileEdit')->name('admin.profileEdit');
            Route::post('profile-update/{id}', 'Admin\AdminController@profileUpdate')->name('admin.profileUpdate');

            Route::resource('administrator', 'Admin\AdminController');

            // For Clients
            Route::get('client-list', 'Admin\ClientController@clientList')->name('admin.clientList');
            Route::get('client-profile', 'Admin\ClientController@profile')->name('admin.clientProfile');
            Route::get('client-campaign-history', 'Admin\ClientController@campaign')->name('admin.clientCampaign');
            Route::get('client-transaction-history', 'Admin\ClientController@transaction')->name('admin.clientTransaction');
            Route::get('client-approve/{id}', 'Admin\ClientController@approve')->name('admin.clientApprove');
            Route::get('client-reject/{id}', 'Admin\ClientController@reject')->name('admin.clientReject');

            Route::get('category/active/{id}', 'Admin\CategoryController@active')->name('category.active');
            Route::get('category/inactive/{id}', 'Admin\CategoryController@inactive')->name('category.inactive');
            Route::resource('category', 'Admin\CategoryController');
            Route::get('service/active/{id}', 'Admin\ServiceController@active')->name('service.active');
            Route::get('service/inactive/{id}', 'Admin\ServiceController@inactive')->name('service.inactive');
            Route::resource('service', 'Admin\ServiceController');

            Route::get('interested/active/{id}', 'Admin\ClientInterestedController@active')->name('interested.active');
            Route::get('interested/inactive/{id}', 'Admin\ClientInterestedController@inactive')->name('interested.inactive');
            Route::resource('client/interested', 'Admin\ClientInterestedController');

            Route::get('audience-list', 'Admin\AudienceController@audienceList')->name('admin.audienceList');
            Route::get('audience-block/{id}', 'Admin\AudienceController@block')->name('admin.audienceBlock');
            Route::get('audience-unblock/{id}', 'Admin\AudienceController@unblock')->name('admin.audienceUnblock');
            Route::get('billing/fund-requests', 'Client\BillingController@fundRequest');
            Route::post('funds/fund-requests-action', 'WaletBoxController@actionFundRequest')->name('admin.fundRequestAction');
            Route::get('funds/fund-requests', 'WaletBoxController@getFundRequests')->name('admin.fundRequests');
            Route::resource('funds', 'WaletBoxController');
            Route::resource('faq-category', 'Admin\FaqCategoryController');
            Route::resource('client-faq', 'Admin\FaqController');
            Route::get('setting/contact', 'Admin\ContactController@index')->name('admin.contactSetting');
            Route::post('setting/contact-store', 'Admin\ContactController@store')->name('admin.contactSettingStore');
            Route::get('client-contacts', 'Admin\ContactController@clientContact')->name('admin.contactClient');
        });
    });

});
