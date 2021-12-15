<?php
use App\Http\Controllers\APIs\AuthController;
use App\Http\Controllers\APIs\UserController;
use App\Http\Controllers\APIs\Panel\ChurchController;
use App\Http\Controllers\APIs\Panel\CountController;
use App\Http\Controllers\APIs\Panel\DecisionController;
use App\Http\Controllers\APIs\Panel\FilterController;
use App\Http\Controllers\APIs\Panel\GroupController;
use App\Http\Controllers\APIs\Panel\GroupReportController;
use App\Http\Controllers\APIs\Panel\MemberController;
use App\Http\Controllers\APIs\Panel\MinistryController;
use App\Http\Controllers\APIs\Panel\PlaceController;
use App\Http\Controllers\APIs\Panel\ReportController;
// Auth
Route::group(['prefix' => 'auth'], function()
{
    Route::post('login', [AuthController::class, 'login'])->middleware('throttle:20');
    Route::post('recovery', [AuthController::class, 'recover'])->middleware('throttle:20');
    Route::group([
    'middleware' => 'auth:sanctum'
    ], function() {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('me', [AuthController::class, 'me']);
    });
});

Route::get('/', 'APIsController@api')->name('apiURL');

// domains
Route::get('/addDomain/{domain}', 'APIsController@addDomain');

// general
Route::get('/website/status', 'APIsController@website_status');
Route::get('/website/info/{lang?}', 'APIsController@website_info');
Route::get('/website/contacts/{lang?}', 'APIsController@website_contacts');
Route::get('/website/style/{lang?}', 'APIsController@website_style');
Route::get('/website/social', 'APIsController@website_social');
Route::get('/website/settings/{lang?}', 'APIsController@website_settings');
Route::get('/menu/{menu_id}/{lang?}', 'APIsController@menu');
Route::get('/banners/{group_id}/{lang?}', 'APIsController@banners');
// section & topics
Route::get('/section/{section_id}/{lang?}', 'APIsController@section');
Route::get('/categories/{section_id}/{lang?}', 'APIsController@categories');
Route::get('/home/{lang?}', 'APIsController@home');
Route::get('/slug/{seo_url_slug}/{lang?}', 'APIsController@SEOByLang');
Route::get('/topics/{section_id}/page/{page_number?}/count/{topics_count?}/{lang?}', 'APIsController@topics');
Route::get('/category/{cat_id}/page/{page_number?}/count/{topics_count?}/{lang?}', 'APIsController@category');
// topic sub details
Route::get('/topic/fields/{topic_id}/{lang?}', 'APIsController@topic_fields');
Route::get('/topic/photos/{topic_id}/{lang?}', 'APIsController@topic_photos');
Route::get('/topic/photo/{photo_id}/{lang?}', 'APIsController@topic_photo');
Route::get('/topic/maps/{topic_id}/{lang?}', 'APIsController@topic_maps');
Route::get('/topic/map/{map_id}/{lang?}', 'APIsController@topic_map');
Route::get('/topic/files/{topic_id}/{lang?}', 'APIsController@topic_files');
Route::get('/topic/file/{file_id}/{lang?}', 'APIsController@topic_file');
Route::get('/topic/comments/{topic_id}/{lang?}', 'APIsController@topic_comments');
Route::get('/topic/comment/{comment_id}/{lang?}', 'APIsController@topic_comment');
Route::get('/topic/related/{topic_id}/{lang?}', 'APIsController@topic_related');
// topic page
Route::get('/topic/{topic_id}/{lang?}', 'APIsController@topic');
// youtube channel
Route::get('/youtube/{topic_id}/{max?}/{lang?}', 'APIsController@youtube');
// user topics
Route::get('/user/{user_id}/topics/page/{page_number?}/count/{topics_count?}/{lang?}', 'APIsController@user_topics');
// Forms Submit
// Route::post('/subscribe', 'APIsController@subscribeSubmit');
// Route::post('/comment', 'APIsController@commentSubmit');
// Route::post('/order', 'APIsController@orderSubmit');
Route::post('/contact', 'APIsController@ContactPageSubmit');
Route::post('/user', 'UserController@store');

// panel
Route::group(['prefix' => 'panel', 'middleware' => 'auth:sanctum, panel'], function()
{
    // filters
    Route::get('/filters/{filters}', [FilterController::class, 'index']);

    // church
    Route::get('/church/{id?}', [ChurchController::class, 'show']);
    Route::post('/church', [ChurchController::class, 'store']);

    // count
    Route::get('/count/{page}/{result}/{search?}', [CountController::class, 'index']);
    Route::get('/count/{id}', [CountController::class, 'show']);
    Route::post('/count', [CountController::class, 'store']);
    Route::delete('/count/{id}', [CountController::class, 'destroy']);

    // decisions
    Route::get('/decision/{page}/{result}/{search?}', [DecisionController::class, 'index']);
    Route::get('/decision/{id}', [DecisionController::class, 'show']);
    Route::post('/decision', [DecisionController::class, 'store']);
    Route::delete('/decision/{id}', [DecisionController::class, 'destroy']);
    Route::get('/decision-contact/{id}', [DecisionController::class, 'showContact']);
    Route::post('/decision-contact', [DecisionController::class, 'storeContact']);
    Route::post('/decision-status', [DecisionController::class, 'storeStatus']);

    // groups
    Route::get('/group/{page}/{result}/{search?}', [GroupController::class, 'index']);
    Route::get('/group/{id}', [GroupController::class, 'show']);
    Route::post('/group', [GroupController::class, 'store']);
    Route::delete('/group/{id}', [GroupController::class, 'destroy']);

    // groups reports
    Route::get('/group-report/{page}/{result}/{search?}', [GroupReportController::class, 'index']);
    Route::get('/group-report/{id}', [GroupReportController::class, 'show']);
    Route::post('/group-report', [GroupReportController::class, 'store']);
    Route::delete('/group-report/{id}', [GroupReportController::class, 'destroy']);

    // members
    Route::get('/member/{page}/{result}/{search?}', [MemberController::class, 'index']);
    Route::get('/member/{id}', [MemberController::class, 'show']);
    Route::post('/member', [MemberController::class, 'store']);
    Route::delete('/member/{id}', [MemberController::class, 'destroy']);
    
    Route::get('/members-relationships/{id}', [MemberController::class, 'relationships']);
    Route::put('/members-relationships/{member_id}/{rel_id}/{type}', [MemberController::class, 'addRelationships']);
    Route::delete('/members-relationships/{id}', [MemberController::class, 'destroyRelationships']);

    // ministries
    Route::get('/ministry/{page}/{result}/{search?}', [MinistryController::class, 'index']);
    Route::get('/ministry/{id}', [MinistryController::class, 'show']);
    Route::post('/ministry', [MinistryController::class, 'store']);
    Route::delete('/ministry/{id}', [MinistryController::class, 'destroy']);
    
    // places
    Route::get('/place/{page}/{result}/{search?}', [PlaceController::class, 'index']);
    Route::get('/place/{id}', [PlaceController::class, 'show']);
    Route::post('/place', [PlaceController::class, 'store']);
    Route::delete('/place/{id}', [PlaceController::class, 'destroy']);

    // reports
    Route::get('/report', [ReportController::class, 'index']);
    Route::get('/report-group/{date}', [ReportController::class, 'group']);

    // users
    Route::get('/user/{page}/{result}/{search?}', [UserController::class, 'index']);
    Route::get('/user/{id}', [UserController::class, 'show']);
    Route::post('/user', [UserController::class, 'store']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);
});