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

Route::get('/', [
    'as' => 'customer.index', 
    'uses' => 'PageController@indexPage']
);

Route::get('/location', [
    'as' => 'customer.index', 
    'uses' => 'PageController@getLocation']
);

Route::get('/location/distric', [
    'as' => 'customer.index', 
    'uses' => 'PageController@getLocationDistric']
);

Route::get('/location/{province_code}', [
    'as' => 'customer.index', 
    'uses' => 'PageController@getProvince']
);

Route::get('/location/{province_code}/{distric_code}', [
    'as' => 'customer.index', 
    'uses' => 'PageController@getDistricData']
);

Route::get('/selection/{classes}', [
    'as' => 'customer.index', 
    'uses' => 'PageController@getClass']
);

Route::group(['prefix' => '/'], function() {
    Route::get('/book', [
        'as' => 'customer.index', 
        'uses' => 'PageController@shopPage']
    );
    Route::get('/category/{id}', [
        'as' => 'customer.index', 
        'uses' => 'PageController@getBookCategory']
    );
    Route::get('/detail/{id}', [
        'as' => 'detail', 
        'uses' => 'PageController@productDetail']
    );

    Route::get('/cart', [
        'as' => 'customer.index', 
        'uses' => 'PageController@viewCart']
    );

    Route::get('/checkout', [
        'as' => 'customer.index', 
        'uses' => 'PageController@checkOut']
    );

    Route::get('/wishlist', [
        'as' => 'customer.index', 
        'uses' => 'PageController@wishList']
    );

    Route::get('/about', [
        'as' => 'customer.index', 
        'uses' => 'PageController@about']
    );

    Route::get('/contact', [
        'as' => 'customer.index', 
        'uses' => 'PageController@contact']
    );
    Route::post('/contact', [
        'as' => 'customer.index', 
        'uses' => 'PageController@setContact']
    );

    Route::get('/delivery/{id}', [
        'as' => 'customer.index', 
        'uses' => 'PageController@delivery']
    );

    Route::get('/policy', [
        'as' => 'customer.index', 
        'uses' => 'PageController@policy']
    );

    Route::get('/search', [
        'as' => 'customer.index', 
        'uses' => 'PageController@search']
    );

    Route::get('book/{book}', [
        'as' => 'customer.index', 
        'uses' => 'PageController@getBook']
    );

    Route::get('finished', [
        'as' => 'customer.index', 
        'uses' => 'PageController@finished']
    );

    Route::get('/profile', [
        'as' => 'customer.index', 
        'uses' => 'PageController@profile']
    );
    Route::get('/profile/entermoney', [
        'as' => 'customer.index', 
        'uses' => 'PageController@profileEnterMoney']
    );
    Route::get('/profile/stopactive', [
        'as' => 'customer.index', 
        'uses' => 'PageController@profileStopActive']
    );
    Route::post('/profile/stopactive', [
        'as' => 'customer.index', 
        'uses' => 'PageController@setprofileStopActive']
    );
    Route::post('/profile/activeAgain', [
        'as' => 'customer.index', 
        'uses' => 'PageController@setprofileActiveAgain']
    );
    Route::post('/profile/entermoney', [
        'as' => 'customer.index', 
        'uses' => 'PageController@setProfileEnterMoney']
    );
    Route::post('/addscore', [
        'as' => 'customer.index', 
        'uses' => 'PageController@setAddScoreExchange']
    );

    Route::get('/profile/userInfor', [
        'as' => 'customer.index', 
        'uses' => 'PageController@profileUserInfor']
    );
    Route::get('/profile/historysell', [
        'as' => 'customer.index', 
        'uses' => 'PageController@profileUserHistorySell']
    );
    Route::get('/profile/historysellmore', [
        'as' => 'customer.index', 
        'uses' => 'PageController@profileUserHistorySellMore']
    );
    Route::get('/profile/hsmorenf', [
        'as' => 'customer.index', 
        'uses' => 'PageController@profileUserHistorySellNotFinishMore']
    );
    Route::get('/profile/historybuy', [
        'as' => 'customer.index', 
        'uses' => 'PageController@profileUserHistoryBuy']
    );
    Route::get('/profile/historybnfMore', [
        'as' => 'customer.index', 
        'uses' => 'PageController@profileUserHistoryBuyNotFinishMore']
    );
    Route::get('/profile/historybfinishedMore', [
        'as' => 'customer.index', 
        'uses' => 'PageController@profileUserHistoryBuyFinishedMore']
    );


    Route::post('/rating', [
        'as' => 'customer.index', 
        'uses' => 'PageController@setRatingAndReview']
    );
    Route::post('getDistric', [
        'as' => 'customer.index', 
        'uses' => 'PageController@getDistric']
    );

    Route::get('upload', [
        'as' => 'customer.index', 
        'uses' => 'PageController@uploadBook']
    );

    Route::post('uploadToServer', [
        'as' => 'customer.index', 
        'uses' => 'PageController@uploadToServer']
    );
    
    Route::post('/receivedOrder', [
        'as' => 'customer.index', 
        'uses' => 'PageController@receivedOrder']
    );
    Route::post('packagedOrder', [
        'as' => 'customer.index', 
        'uses' => 'PageController@packagedOrder']
    );
    Route::post('inprogressOrder', [
        'as' => 'customer.index', 
        'uses' => 'PageController@inprogressOrder']
    );
    Route::post('shippedOrder', [
        'as' => 'customer.index', 
        'uses' => 'PageController@shippedOrder']
    );

    Route::get('profile/sell-history', [
        'as' => 'customer.index', 
        'uses' => 'PageController@getProfileSell']
    );

    Route::get('profile/buy-history', [
                
        'as' => 'customer.index', 
        'uses' => 'PageController@getProfileBuy']
    );

    Route::post('clientLogin', [
        'as' => 'admin.index', 
        'uses' => 'PageController@clientLogin']
    );

    Route::get('cunguyen-test/{type}', [
        'as' => 'customer.index', 
        'uses' => 'PageController@cunguyenTest']
    );

    Route::get('user/logout', [
        'as' => 'customer.index', 
        'uses' => 'PageController@clientLogout']
    );

    Route::post('register', [
        'as' => 'admin.index', 
        'uses' => 'PageController@clientRegister']
    );

    Route::post('/clientAddToCart', [
        'as' => 'admin.index', 
        'uses' => 'PageController@clientAddToCart']
    );

    Route::post('/getCartData', [
        'as' => 'admin.index', 
        'uses' => 'PageController@getCartData']
    );

    Route::post('/removeItemInCart', [
        'as' => 'admin.index', 
        'uses' => 'PageController@removeItemInCart']
    );

    Route::post('/updateCart_', [
        'as' => 'admin.index', 
        'uses' => 'PageController@updateCart']
    );

    Route::post('/orderSubmit', [
        'as' => 'admin.index', 
        'uses' => 'PageController@orderSubmit']
    );

    Route::post('/getCartDataForCheckoutPage', [
        'as' => 'admin.index', 
        'uses' => 'PageController@getCartDataForCheckoutPage']
    );

    Route::post('/resetPassword', [
        'as' => 'admin.index', 
        'uses' => 'PageController@resetPassword']
    );

    Route::get('/hi', [
        'as' => 'admin.index', 
        'uses' => 'PageController@hi']
    );

    Route::post('/getDataForSearch', [
        'as' => 'admin.index', 
        'uses' => 'PageController@getDataForSearch']
    );
    
});

Route::group(['prefix' => '/admin'], function() {
    Route::get('cunguyen', [
        'as' => 'admin.index', 
        'uses' => 'PageController@admin_cunguyen']
    );

    Route::post('cunguyen', [
        'as' => 'admin.index', 
        'uses' => 'PageController@doUpload']
    );

    Route::get('login', [
        'as' => 'admin.index', 
        'uses' => 'PageController@adminLogin']
    );

    Route::post('loginAuthencation', [
        'as' => 'admin.index', 
        'uses' => 'PageController@loginAuthencation']
    );

    Route::post('show', [
        'as' => 'admin.index', 
        'uses' => 'PageController@show']
    );

    Route::get('dashboard', [
        'as' => 'admin.index', 
        'uses' => 'PageController@getDashboard']
    );

    Route::get('categories', [
        'as' => 'admin.index', 
        'uses' => 'PageController@getCategories']
    );

});

Route::get('change-language/{language}','LanguageController@changeLanguage')->name('change-language');

Route::get('/send', ['uses' => 'PageController@send', 'as' => 'send']);

// Route::post('/send', ['uses' => 'PageController@send', 'as' => 'send']);