<?php

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

Route::get('/', 'DashboardController@index')->name('dashboard');

Route::get('/cluster', 'ClusterController@index')->name('cluster');
Route::get('/cluster-add', 'ClusterController@create')->name('cluster-add');
Route::post('/cluster','ClusterController@store')->name('cluster-store');

Route::get('/person', 'PersonController@index')->name('person');
Route::get('/person-add', 'PersonController@create')->name('person-add');
Route::get('/person/{id}', 'PersonController@show')->name('person-edit');
Route::post('/person', 'PersonController@store')->name('person-store');

Route::get('/history', 'HistoryController@index')->name('history');
Route::get('/person/transaction/{id}', 'TransactionController@create')->name('person-transaction');
Route::post('/person/transaction', 'TransactionController@store')->name('person-transaction-store');


// Route::get('/buku', 'BookController@index')->name('buku');
// Route::delete('/buku', 'BookController@remove')->name('hapus-buku');
// Route::get('/buku/add', 'BookController@add')->name('tambah-buku');
// Route::post('/buku/add', 'BookController@create')->name('tambah-buku-baru');

// Route::get('/data-penyewa', 'UserController@index')->name('data-penyewa');
// Route::delete('/data-penyewa', 'TransactionController@remove')->name('hapus-penyewa');

// Route::get('/list-sewa', 'TransactionController@show')->name('list-sewa');
// Route::get('/transaksi', 'TransactionController@index')->name('transaksi');

// Route::post('/transaksi', 'TransactionController@add')->name('tambah-transaksi');

