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
    Route::get('/', 'DashboardController@index')->middleware(['auth']);
    Route::get('/history', 'HistoryController@index')->name('history');
});

Route::middleware(['auth','admin','verified'])
    ->prefix('admin')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    
    Route::get('/cluster', 'ClusterController@index')->name('cluster');
    Route::get('/cluster-add', 'ClusterController@create')->name('cluster-add');
    Route::post('/cluster','ClusterController@store')->name('cluster-store');
    
    Route::get('/person', 'PersonController@index')->name('person');
    Route::get('/person-add', 'PersonController@create')->name('person-add');
    Route::get('/person/{id}', 'PersonController@show')->name('person-edit');
    Route::post('/person', 'PersonController@store')->name('person-store');
    
    // Route::get('/history', 'HistoryController@index')->name('history');
    Route::get('/person/transaction/{id}', 'TransactionController@create')->name('person-transaction');
    Route::post('/person/transaction', 'TransactionController@store')->name('person-transaction-store');
    
    Route::get('/expense', 'ExpenseController@create')->name('transaction-expense');
    Route::post('/expense', 'ExpenseController@store')->name('transaction-expense-store');
    Route::get('/user', 'UserController@index')->name('user');
    Route::get('/user/create', 'UserController@create')->name('user-create');
    Route::post('/user/create', 'UserController@store')->name('user-store');
    
});


Auth::routes(['verify' => true]);

