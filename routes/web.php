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

// Route::get('/', function () {
//     return view('welcome');
// });


//clear bo nho tam
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
    
});
Route::get('/check.kAuth','checkAuth@checkAuth')->name('check.Auth');


// Route::get('/',function(){
// 	return view('vendor.adminlte.master');
// });


Auth::routes();

Route::get('/', [
            'as' => 'home.index', 
            'uses' => 'HomeController@index'
        ]);
Route::get('/home', [
            'as' => 'home.index', 
            'uses' => 'HomeController@index'
        ]);
Route::get('/Dashboard', [
            'as' => 'home.dashboard', 
            'uses' => 'HomeController@dashboard'
        ]);
//khong cho dang ky, ma chuyen vao login
Route::get('/register', [
            'as' => 'home', 
            'uses' => 'HomeController@index'
        ]);
Route::get('/password/reset', [
            'as' => 'home', 
            'uses' => 'HomeController@index'
        ]);
Route::get('/logout', [
            'as' => 'home', 
            'uses' => 'HomeController@index'
        ]);

//ajax load danh sach huyen, thay doi theo thanh pho
Route::get('/ajx.change.district', [
            'as' => 'ajx.change.district', 
            'uses' => 'HomeController@ajax_load_district'
        ]);

//Dieu huong load trang
Route::get('/route.loading.page', [
            'as' => 'route.page', 
            'uses' => 'routeController@handling_route'
        ]);

//Dieu huong load trang
Route::post('/route.loading.page', [
            'as' => 'route.page', 
            'uses' => 'routeController@handling_route'
        ]);



// ========================================================================================================================

// //quan ly danh sach user
// Route::get('/User.list', [
//             'as' => 'user.list', 
//             'uses' => 'user\userController@user_list'
//         ]);


//ajax xu ly cac xu lieu cuar form user
Route::get('/User.handling_ajax_user', [
            'as' => 'user.handling_ajax_user', 
            'uses' => 'user\userController@handling_ajax_user'
        ]);

//save user (creare and update)
Route::post('/User.handling_ajax_user', [
            'as' => 'user.handling_ajax_user', 
            'uses' => 'user\userController@update_user'
        ]);




// ========================================================================================================================

// //quan ly group

// Route::get('/Group.list', [
//             'as' => 'group.list', 
//             'uses' => 'group\groupController@group_list'
//         ]);

//ajax xu ly cac xu lieu cuar form group
Route::get('/Group.handling_ajax_group', [
            'as' => 'group.handling_ajax_group', 
            'uses' => 'group\groupController@handling_ajax_group'
        ]);
Route::post('/Group.handling_ajax_group', [
            'as' => 'group.handling_ajax_group', 
            'uses' => 'group\groupController@update_group'
        ]);
// ========================================================================================================================

// //quan ly khach hang

Route::get('/Customer.handling_ajax_customer', [
            'as' => 'customer.handling_ajax_customer', 
            'uses' => 'customer\customerController@handling_ajax_customer'
        ]);
Route::post('/Customer.handling_ajax_customer', [
            'as' => 'customer.handling_ajax_customer', 
            'uses' => 'customer\customerController@handling_ajax_customer'
        ]);