<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your applicationp. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function() {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/history', 'HistoryController@index')->name('history');

    Route::get('/user/setting', 'UserController@setting')->name('user-setting');
    Route::put('/user/setting', 'UserController@update')->name('user-update');
    Route::put('/user/setting/pass', 'UserController@update_pass')->name('user-update-pass');
    
    Route::get('/person/{id}', 'UserController@history')->name('person-history');
    Route::get('/person/transaction/{id}', 'TransactionController@create')->name('person-transaction');
    Route::post('/person/transaction', 'TransactionController@store')->name('person-transaction-store');

    Route::post('/checkout', 'CheckoutController@process')->name('checkout');
    // Route::post('/repay', 'CheckoutController@repay')->name('repay');
    // Route::post('/checkout/callback', 'CheckoutController@callback')->name('midtrans-callback');
});

Route::middleware(['auth','admin','verified'])
    ->prefix('admin')->group(function () {
    // Route::get('/', 'DashboardController@index')->name('dashboard');
    
    Route::get('/cluster', 'ClusterController@index')->name('cluster');
    Route::get('/cluster-add', 'ClusterController@create')->name('cluster-add');
    Route::post('/cluster','ClusterController@store')->name('cluster-store');
    
    Route::get('/person', 'UserController@show')->name('person');
    Route::get('/person-add', 'UserController@create')->name('person-add');
    // Route::get('/person/{id}', 'UserController@history')->name('person-history');
    Route::post('/person', 'UserController@store')->name('person-store');
    
    // Route::get('/person/transaction/{id}', 'TransactionController@create')->name('person-transaction');
    // Route::post('/person/transaction', 'TransactionController@store')->name('person-transaction-store');
    
    Route::get('/expense', 'ExpenseController@create')->name('transaction-expense');
    Route::post('/expense', 'ExpenseController@store')->name('transaction-expense-store');
    Route::get('/user', 'UserController@index')->name('user');
    Route::get('/user/create', 'UserController@create')->name('user-create');
    Route::post('/user/create', 'UserController@store')->name('user-store');

    Route::put('/history','HistoryController@update')->name('update-status');
    
});


Auth::routes(['verify' => true]);

