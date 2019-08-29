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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::resource('/documents', 'DocumentController');
Route::get('/documents/{document}', 'DocumentController@arr_to_xml')->name('documents.arrtoxml');

Route::group(['prefix' => '/documents/{document}'], function() {
	Route::resource('/consignments', 'ConsignmentController', ['except' => ['show']]);
	
	Route::group(['prefix' => '/consignments/{consignment}'], function() {
		Route::get('/goods/create', 'GoodsController@create')->name('goods.create');
		Route::post('/goods', 'GoodsController@store')->name('goods.store');
		Route::get('/goods/{goods}/edit', 'GoodsController@edit')->name('goods.edit');
		Route::patch('/goods/{goods}', 'GoodsController@update')->name('goods.update');
		Route::delete('/goods/{goods}', 'GoodsController@destroy')->name('goods.destroy');
	});

	Route::group(['prefix' => '/consignments/{consignment}'], function() {
		Route::get('/reference_docs/create', 'ReferenceDocumentController@create')->name('reference_docs.create');
		Route::post('/reference_docs', 'ReferenceDocumentController@store')->name('reference_docs.store');
		Route::get('/reference_docs/{referenceDocument}/edit', 'ReferenceDocumentController@edit')->name('reference_docs.edit');
		Route::patch('/reference_docs/{referenceDocument}', 'ReferenceDocumentController@update')->name('reference_docs.update');
		Route::delete('/reference_docs/{referenceDocument}', 'ReferenceDocumentController@destroy')->name('reference_docs.destroy');
	});
});

Route::get('/admin', function() {
	return "You are admin!";
})->middleware(['auth', 'auth.admin']);

Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(function() {
	Route::resource('/users', 'UserController', ['except' => ['create', 'store', 'show']]);
});
