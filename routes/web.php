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

// Route::get('/', function () {
//     return view('welcome');
// });



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
	Route::get('profile/verify', ['as' => 'user.pin.verify', 'uses' => 'ProfileController@verifypin']);

	/*State*/
    Route::prefix('state')->group(function () {
        Route::get('list', ['as' => 'master.state.list', 'uses' => 'stateController@index']);
        Route::post('store', ['as' => 'state.store', 'uses' => 'stateController@store']);
        Route::post('update', ['as' => 'state.update', 'uses' => 'stateController@update']);
        Route::get('statedelete/{id}', ['as' => 'state.delete', 'uses' => 'stateController@destroy']);
        Route::post('storeCity', ['as' => 'city.store', 'uses' => 'cityController@store']);
        Route::get('showCity', ['as' => 'city.show', 'uses' => 'cityController@index']);
        Route::get('citydelete/{id}', ['as' => 'city.show', 'uses' => 'cityController@destroy']);
        Route::get('getCity', ['as' => 'city.get', 'uses' => 'cityController@getCity']);
    });

	/*Dealer*/
    // Route::prefix('dealer')->group(function () {
    //     Route::get('add', ['as' => 'dealer.add', 'uses' => 'dealerController@add']);
    //     Route::post('store', ['as' => 'dealer.add', 'uses' => 'dealerController@store']);
    //     Route::get('list', ['as' => 'dealer.list', 'uses' => 'dealerController@list']);
    //     Route::get('delete/{id}', ['as' => 'dealer.delete', 'uses' => 'dealerController@destroy']);
    //     Route::post('store', ['as' => 'nozle.store', 'uses' => 'dealerController@store']);
    //     Route::post('update', ['as' => 'nozle.update', 'uses' => 'dealerController@update']);
    //     Route::get('delete', ['as' => 'nozle.delete', 'uses' => 'dealerController@delete']);
    // });

	/*Home*/
	/*Customer*/
    Route::prefix('home')->group(function () {
        Route::get('add', ['as' => 'home.add', 'uses' => 'customersController@add']);
        Route::get('list', ['as' => 'home.list', 'uses' => 'customersController@show']);
        Route::post('store', ['as' => 'home.store', 'uses' => 'customersController@store']);
        Route::get('edit', ['as' => 'home.edit', 'uses' => 'customersController@edit']);
        Route::put('update', ['as' => 'home.update', 'uses' => 'customersController@update']);
        Route::get('delete', ['as' => 'customer.delete', 'uses' => 'customersController@destroy']);

        // size 
        Route::put('sizeStore', ['as' => 'home.sizeStore', 'uses' => 'sizesController@storee']);
        // Route::get('sizedelete/{id}', ['as' => 'home.delete', 'uses' => 'sizesController@destroy']);
        Route::get('sizedelete', ['as' => 'home.delete', 'uses' => 'sizesController@destroy']);
        Route::get('getsizes', ['as' => 'home.getsizes', 'uses' => 'sizesController@getsizes']);
        // Route::get('size', ['as' => 'home.list', 'uses' => 'sizesController@index']);

    }); 

    /*Report*/
    Route::prefix('report')->group(function () {
        Route::get('dealer-report', ['as' => 'report.datewisereport', 'uses' => 'ReportController@datewisereport']);
        Route::get('dealer-report-data', ['as' => 'report.datewisereport.data', 'uses' => 'ReportController@getDealerDetail']);
        Route::get('customer-report-print', ['as' => 'report.datewisereport.print', 'uses' => 'ReportController@printcustomers']);
        Route::get('total-report', ['as' => 'report.totalreport', 'uses' => 'ReportController@totalreport']);
        Route::get('total-report-data', ['as' => 'report.totalreport.data', 'uses' => 'totalReportController@printTotalReport']);
    });
});

