<?php

use Illuminate\Support\Facades\Route;

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


// Website static pages
Route::group(['middleware' => ['web']], function () {
    Route::get('/clear-cache', function () {
        $exitCode = Artisan::call('config:clear');
        $exitCode = Artisan::call('cache:clear');
        $exitCode = Artisan::call('config:cache');
        $exitCode = Artisan::call('route:cache');
        return 'DONE'; //Return anything
    });

    Route::get('privacy-policy', function () {
        return view('includes/templates/pages/page-privacy-policy');
    })->name('privacy-policy');

    Route::get('affiliates', function () {
        return view('includes/templates/pages/page-affiliates');
    })->name('affiliates');

    Route::get('disable-account', function () {
        return view('includes/templates/pages/page-disable-account');
    })->name('disable-account');

    Route::get('law-compliance', function () {
        return view('includes/templates/pages/page-law-compliance');
    })->name('law-compliance');
   
   //support
    Route::get('support', function () {
        return view('includes/templates/pages/page-support');
    })->name('support');
 
    Route::post('/support-user', 'App\Http\Controllers\SupportController@save');
 
    Route::get('terms-conditions', function () {
        return view('includes/templates/pages/page-terms-conditions');
    })->name('terms-conditions');

    Route::get('win-tokens', function () {
        return view('includes/templates/token/win-tokens');
    })->name('win-tokens');

    Route::get('wallet-model-2', function () {
        return view('includes/templates/wallet/wallet-model-2');
    })->name('wallet-model-2');

    Route::get('win-tokens-unlock-the-slot', function () {
        return view('includes/templates/token/win-tokens-unlock-the-slot');
    })->name('win-tokens-unlock-the-slot');

    Route::get('win-tokens-weekly-lottery', function () {
        return view('includes/templates/token/win-tokens-weekly-lottery');
    })->name('win-tokens-weekly-lottery');

    Route::get('subscribe-the-videoclub-1', function () {
        return view('includes/templates/subscribe/subscribe-the-videoclub-1');
    })->name('subscribe-the-videoclub-1');

    Route::get('subscribe-the-videoclub-2', function () {
        return view('includes/templates/subscribe/subscribe-the-videoclub-2');
    })->name('subscribe-the-videoclub-2');


    // Be a model section.

    Route::get('/be-a-model-1', 'App\Http\Controllers\ModelController@showModelPage1')->name('be-a-model-1');
    Route::get('/be-a-model-2', 'App\Http\Controllers\ModelController@showModelPage2')->name('be-a-model-2');
    Route::get('/be-a-model-3', 'App\Http\Controllers\ModelController@showModelPage3')->name('be-a-model-3');
    Route::get('/be-a-model-3-2', 'App\Http\Controllers\ModelController@showModelPage3_2')->name('be-a-model-3-2');
    Route::get('/be-a-model-4', 'App\Http\Controllers\ModelController@showModelPage4')->name('be-a-model-4');
    Route::get('/be-a-model-5', 'App\Http\Controllers\ModelController@showModelPage5')->name('be-a-model-5');

    Route::post('/save-be-a-model-2', 'App\Http\Controllers\ModelController@saveData2');
    Route::post('/save-be-a-model-3-1', 'App\Http\Controllers\ModelController@saveData3_1');
    Route::post('/save-be-a-model-3-2', 'App\Http\Controllers\ModelController@saveData3_2');
    Route::post('/save-be-a-model-4', 'App\Http\Controllers\ModelController@saveData4');


    // Homepage index

    Route::get('/', 'App\Http\Controllers\IndexController@show')->name('index_page');
    Route::post('/', 'App\Http\Controllers\IndexController@show')->name('filters.store');

    // Login and Logout section.

    Route::post('/logged_in', 'App\Http\Controllers\LoginController@authenticate')->name('logged_in');

    Route::post('/logout', 'App\Http\Controllers\LoginController@logout');
    Route::middleware(['auth:sanctum', 'verified'])->get('/index', function () {
        return view('includes/index');
    })->name('index');
    

    // Reset password section

    Route::post('/resetPassword', 'App\Http\Controllers\LoginController@resetPassword');


    // Models liked, Favorites, Stream

    Route::post('/model_like', 'App\Http\Controllers\LiveCamModelController@likeStatus')->name('model_like');
    Route::post('/add_favorites', 'App\Http\Controllers\LiveCamModelController@addFavorite');
    // Route::get('/page-stream-model/id={model_id}/live_video_id={live_video_id}', 'App\Http\Controllers\PageStreamModelController@getDetails')->name('page-stream-model');
    Route::get('/page-stream-model/id={model_id}', 'App\Http\Controllers\PageStreamModelController@getDetails')->name('page-stream-model');
    

    // Model Account Details, Update

    Route::get('/account-model', 'App\Http\Controllers\AccountModelController@getAccountDetails')->name('account-model');
    Route::post('/account-model-update-1', 'App\Http\Controllers\AccountModelUpdateController@updateAccountPart1');
    Route::post('/account-model-update-2', 'App\Http\Controllers\AccountModelUpdateController@updateAccountPart2');
    Route::post('/account-model-update-3', 'App\Http\Controllers\AccountModelUpdateController@updateAccountPart3');
    Route::post('/save-photo-in-gallery', 'App\Http\Controllers\AccountModelUpdateController@savePhoto');
    Route::post('/account-model-delete-image', 'App\Http\Controllers\AccountModelUpdateController@deletePhoto');
   
    Route::get('/page-favorites', 'App\Http\Controllers\FavoriteModelController@getFavoriteModelDetails')->name('page-favorites');

    // Model - Your VideoShop

    Route::get('/page-your-videoshop-1', 'App\Http\Controllers\AccountModelController@addInVideoShop')->name('page-your-videoshop-1');
    Route::post('/save-model-video', 'App\Http\Controllers\AccountModelController@saveVideo');
    Route::get('/page-stream-model-product/video_id={video_id}/id={model_id}', 'App\Http\Controllers\PageStreamModelController@openVideo')->name('page-stream-model-product');
    Route::post('/delete-model-video', 'App\Http\Controllers\AccountModelController@deleteVideo');

    
    // Model - VideoShop
    
    Route::get('/videoshop', 'App\Http\Controllers\VideoShopController@getVideoshop')->name('videoshop');
    

    // Model - Categories

    Route::get('/categories/id={name}', 'App\Http\Controllers\CategoriesController@getCategories')->name('categories');


    // Be a User section
    
    Route::get('be-a-user-1', function () {
        return view('includes/templates/user/be-a-user-1');
    })->name('be-a-user-1');
    
    Route::post('/save-be-a-user-1', 'App\Http\Controllers\UserController@saveUserData');
    
    Route::get('be-a-user-2', function () {
        return view('includes/templates/user/be-a-user-2');
    })->name('be-a-user-2');


    // User Account

    Route::get('account-user', 'App\Http\Controllers\UserController@getUserDetails')->name('account-user');
    Route::post('/account-user-update', 'App\Http\Controllers\UserController@updateUser');


    // Live model comment section
    
    Route::post('/live-model-comment', 'App\Http\Controllers\PageStreamModelController@postComments');


    // Model - Go Live

    Route::get('page-startshow-golive', 'App\Http\Controllers\PageGoLiveController@show')->name('page-startshow-golive');          
    Route::post('/save-report-user', 'App\Http\Controllers\PageGoLiveController@saveReport');  
    Route::post('/save-incidents-document', 'App\Http\Controllers\PageGoLiveController@saveDocument'); 

    // Route::post('/live-model-status', 'App\Http\Controllers\GoLiveController@liveVideoStatus');
    Route::post('/live-model-status', array('middleware' => 'Cors', 'uses' => 'App\Http\Controllers\GoLiveController@liveVideoStatus'));
    Route::post('/end-live-video', 'App\Http\Controllers\GoLiveController@endLiveVideo');
    Route::post('/model-in-action-status', 'App\Http\Controllers\GoLiveController@updatemodeltime');
    //model already in show ..to check
    Route::post('/check-model-already-inShow', 'App\Http\Controllers\GoLiveController@checkModelAlreadyInShow');


    // Buy Token       

    Route::get('TokenPaymentRazorpay/token={token}', 'App\Http\Controllers\BuyTokenController@displayScreen')->name('BuyToken');
    Route::post('/Payment', 'App\Http\Controllers\BuyTokenController@payment')->name('Payment');
    Route::post('/StoreDetailsSessionPayment', 'App\Http\Controllers\BuyTokenController@storeValues');


    // Send Token

    Route::post('/send-token', 'App\Http\Controllers\WalletController@sendToken');


    // User, Model Wallet

    Route::get('wallet-model', 'App\Http\Controllers\WalletController@show')->name('wallet-model');
     Route::post('wallet-model', 'App\Http\Controllers\WalletController@show')->name('wallet-model-post');
    Route::get('wallet-charge-1', 'App\Http\Controllers\WalletController@tokenPackages')->name('wallet-charge-1');
    Route::post('/buy-token', 'App\Http\Controllers\WalletController@tokenPackages');


    //VIP Account

    Route::post('/check-logged-user', 'App\Http\Controllers\VIPController@checkAuthenticatedUser');
    Route::post('/download-access', 'App\Http\Controllers\VIPController@downloadAccess');
    Route::get('vip-account-user', 'App\Http\Controllers\VIPController@getDetails')->name('vip-account-user');


    //Pagination

    Route::get('/page={page_no}', 'App\Http\Controllers\IndexController@show')->name('index-pages');
    Route::get('/video_page={page_no}', 'App\Http\Controllers\VideoShopController@getVideoshop')->name('videoshop-pages');
    Route::get('/category={name}/page={page_no}', 'App\Http\Controllers\CategoriesController@getCategories')->name('Category-pages');


    // Disabled Account

    Route::post('/disabled_account', 'App\Http\Controllers\LoginController@disableAccount');

    //chatting
    Route::post('/send-message', 'App\Http\Controllers\MessageController@sendMessage');
    
    Route::post('/storeUsertoSession', 'App\Http\Controllers\MessageController@storeUser');

    Route::post('/storeUsertoDatabase', 'App\Http\Controllers\MessageController@storeUsertoDatabase');
    Route::post('/deleteUserfromDatabase', 'App\Http\Controllers\MessageController@deleteUserfromDatabase');
    
    //wallet
    
     Route::post('/calender-interval', 'App\Http\Controllers\WalletController@setcalenderInterval');
     
     // private show
     Route::post('/createPrivateChannel', 'App\Http\Controllers\PrivateShowController@createPrivateChannel');
     //open private show page for model
     Route::get('/page-privateShow-golive/private_show_id={private_show_id}/model_id={model_id}', 'App\Http\Controllers\PrivateShowController@getPrivateShowPageForModel')->name('page-privateShow-golive');
     Route::post('/checkTokenStatus', 'App\Http\Controllers\PrivateShowController@checkTokenStatus');
     Route::post('/tokensTransaction', 'App\Http\Controllers\PrivateShowController@tokensTransaction');
     Route::post('/privateShowUserData', 'App\Http\Controllers\PrivateShowController@privateShowUserData');
     Route::post('/fetchPrivateShowUrl', 'App\Http\Controllers\PrivateShowController@fetchPrivateShowUrl'); 
     Route::post('/checkifUserAuthorized', 'App\Http\Controllers\PrivateShowController@checkifUserAuthorized');
     
     Route::post('/checkifPrivateShowCreated', 'App\Http\Controllers\PrivateShowController@checkifPrivateShowCreated');
     
     Route::post('/createPrivateShow', 'App\Http\Controllers\PrivateShowController@createPrivateShow');
     Route::post('/startPrivateShowForUser', 'App\Http\Controllers\PrivateShowController@startPrivateShowForUser');
     
     //open private show page for user
     Route::get('/page-privateStream-model/private_show_id={private_show_id}', 'App\Http\Controllers\PrivateShowController@getPrivateShowPageForUser')->name('page-privateStream-model');
     Route::post('/endPrivateShow', 'App\Http\Controllers\PrivateShowController@endPrivateShow');
     //testing purpose
     
     Route::post('/buyToken', 'App\Http\Controllers\PrivateShowController@buyToken');
     
     

});
