<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['namespace' => 'Api'], function () {

    Route::get('/', function () { echo 'worked!'; });
    Route::post('register', 'AuthController@register');
    Route::post('verify', 'AuthController@verify');
    Route::post('forgot-password', 'AuthController@forgotPassword');
    Route::post('reset-password', 'AuthController@resetPassword');
    Route::post('login', 'AuthController@login');
    Route::group(['middleware' => ['jwt.auth']], function() {
        Route::get('me', 'AuthController@me');
        Route::post('logout', 'AuthController@logout');
        Route::post('twofa', 'AuthController@twofa');
        Route::post('twofa-resend', 'AuthController@twofaResend');

        Route::get('profile', 'AuthController@profile');
        Route::post('update-profile', 'ProfileController@updateProfile');
        Route::post('update-password', 'ProfileController@updatePassword');
        Route::post('update-profile-photo', 'ProfileController@updateProfilePicture');
        Route::post('update-cover-photo', 'ProfileController@updateCoverPicture');
        Route::post('update-career', 'ProfileController@updateCareer');
        Route::post('update-education', 'ProfileController@updateEducation');
        Route::post('update-skill', 'ProfileController@updateSkill');
        Route::post('update-twofa', 'ProfileController@twofa');
        Route::post('social-account-get', 'ProfileController@socialAccountGet');
        Route::post('social-account-store', 'ProfileController@socialAccountStore');

        Route::post('career', 'CommonController@career');
        Route::post('education', 'CommonController@education');
        Route::post('skill', 'CommonController@skill');

        Route::post('category', 'CampaignController@category');
        Route::post('service/{catId}', 'CampaignController@service');
        Route::post('campaign/{serviceId}', 'CampaignController@campaign');
        Route::post('campaign-details/{id}', 'CampaignController@campaignDetails');
        Route::post('campaign-complete/{id}', 'CampaignController@campaignComplete');

        Route::post('tasks', 'UserController@myTask');
        Route::post('task/{id}', 'UserController@taskView');
        Route::post('withdraw-history', 'UserController@withdrawHistory');
        Route::post('withdraw-store', 'UserController@withdrawStore');
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
