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

	/*Product*/
    Route::prefix('product')->group(function () {
        Route::get('list', ['as' => 'product.list', 'uses' => 'ProductController@list']);
        Route::post('store', ['as' => 'product.store', 'uses' => 'ProductController@store']);
        Route::post('update', ['as' => 'product.update', 'uses' => 'ProductController@update']);
        Route::get('delete', ['as' => 'product.delete', 'uses' => 'ProductController@delete']);
    });
	/*Nozle*/
    Route::prefix('nozle')->group(function () {
        Route::get('list', ['as' => 'nozle.list', 'uses' => 'NozleController@list']);
        Route::post('store', ['as' => 'nozle.store', 'uses' => 'NozleController@store']);
        Route::post('update', ['as' => 'nozle.update', 'uses' => 'NozleController@update']);
        Route::get('update_status', ['as' => 'nozle.update_status', 'uses' => 'NozleController@update_status']);
        Route::get('delete', ['as' => 'nozle.delete', 'uses' => 'NozleController@delete']);
    });
	/*Nozle*/
    Route::prefix('home')->group(function () {
        Route::get('add', ['as' => 'home.add', 'uses' => 'NozleEntryController@add']);
        Route::post('store', ['as' => 'home.store', 'uses' => 'customersController@store']);
        Route::post('update-note-count', ['as' => 'home.updatenotecount', 'uses' => 'NozleEntryController@updatenotecount']);
        Route::get('new-entry', function(){
        	Session::forget('entryId');
            Session::forget('cash_amount');
        	return redirect()->back();
        })->name('home.newentry');
        Route::get('print', ['as' => 'home.print', 'uses' => 'NozleEntryController@print']);
        Route::get('download-pdf/{entryId}', ['as' => 'home.downloadpdf', 'uses' => 'NozleEntryController@downloadpdf']);
        Route::get('list', ['as' => 'home.list', 'uses' => 'customersController@show']);
        Route::get('view/{entryId}', ['as' => 'home.view', 'uses' => 'NozleEntryController@view']);
        Route::get('delete', ['as' => 'home.delete', 'uses' => 'NozleEntryController@delete']);
    });
    /*Cash Verification*/
    Route::prefix('cash-verification')->group(function () {
        Route::get('option', ['as' => 'cashverification.option', 'uses' => 'CashVerificationController@option']);
        Route::get('update-option', ['as' => 'cashverification.updateoption', 'uses' => 'CashVerificationController@updateoption']);
    });
    /*Cash Detail*/
    Route::prefix('cash-detail')->group(function () {
        Route::get('unverified', ['as' => 'cashdetail.unverified', 'uses' => 'CashVerificationController@unverified']);
        Route::get('verify-cash-detail', ['as' => 'cashdetail.verifycashdetail', 'uses' => 'CashVerificationController@verifycashdetail']);
        Route::get('verified', ['as' => 'cashdetail.verified', 'uses' => 'CashVerificationController@verified']);
        Route::post('create-batch', ['as' => 'cashdetail.createbatch', 'uses' => 'CashVerificationController@createbatch']);
        Route::get('batches', ['as' => 'cashdetail.batches', 'uses' => 'CashVerificationController@batches']);
        Route::get('delete-batch', ['as' => 'cashdetail.deletebatch', 'uses' => 'CashVerificationController@deletebatch']);
        Route::get('view-batch/{batchId}', ['as' => 'cashdetail.viewbatch', 'uses' => 'CashVerificationController@viewbatch']);
        Route::get('print-batch', ['as' => 'cashdetail.printbatch', 'uses' => 'CashVerificationController@printbatch']);
    });
    /*Cash Verification*/
    Route::prefix('report')->group(function () {
        Route::get('comulative-batch-report', ['as' => 'comulative.batch.report', 'uses' => 'ReportController@comulativebatchreport']);
    });
});

