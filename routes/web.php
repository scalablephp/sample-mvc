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

Route::get('switchlang/{id}', function ($langcode) {
	session(['language' => $langcode]);
	return redirect()->back();
});
Route::get('admin', array('as' => 'admin', 'uses' => 'Admin\LoginController@index'))->middleware('checklang');
Route::get('admin/login', array('as' => 'admin', 'uses' => 'Admin\LoginController@index'))->middleware('checklang');
Route::post('admin/login', array('as' => 'admin', 'uses' => 'Admin\LoginController@login'))->middleware('checklang');
Route::post('admin/forgot', array('as' => 'admin', 'uses' => 'Admin\LoginController@forgot'))->middleware('checklang');
Route::get('admin/reset/{token}', array('as' => 'admin', 'uses' => 'Admin\LoginController@reset'))->middleware('checklang');
Route::post('admin/reset_pwd', array('as' => 'admin', 'uses' => 'Admin\LoginController@reset_pwd'))->middleware('checklang');
Route::get('admin/logout', array('as' => 'admin', 'uses' => 'Admin\LoginController@logout'))->middleware('checklang');

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['web','checklogin','checklang']), function () {

	Route::get('dashboard', array('as' => 'admin', 'uses' => 'DashboardController@index'));

	Route::post('attributes/getall', array('as' => 'admin', 'uses' => 'AttributeController@fetchall'));
	Route::post('attributes/verify', array('as' => 'admin', 'uses' => 'AttributeController@verifyattr'));
	Route::get('attributes/export/{id?}', array('as' => 'admin', 'uses' => 'AttributeController@export'));
	Route::resource('attributes','AttributeController');

	Route::post('attributes/getallsubattr', array('as' => 'admin', 'uses' => 'AttributeController@fetchallsubattr'));

	Route::post('subattributes/verify', array('as' => 'admin', 'uses' => 'SubAttributeController@verifyattr'));
	Route::get('subattributes/create/{id?}', ['as' => 'subattributes.create','uses' => 'SubAttributeController@create']);
	Route::resource('subattributes','SubAttributeController',['except' => 'create']);

	Route::post('geography/getall', array('as' => 'admin', 'uses' => 'GeoProvinceController@fetchall'));
	Route::post('geography/verify', array('as' => 'admin', 'uses' => 'GeoProvinceController@verifyprovince'));
	Route::get('geography/export/{id?}', array('as' => 'admin', 'uses' => 'GeoProvinceController@export'));
	Route::resource('geography','GeoProvinceController');

	Route::post('geography/getallmuncipality', array('as' => 'admin', 'uses' => 'GeoProvinceController@fetchallmunicipality'));

	Route::post('municipality/verify', array('as' => 'admin', 'uses' => 'GeoMunicipalityController@verifymunicipality'));
	Route::get('municipality/create/{id?}', ['as' => 'municipality.create','uses' => 'GeoMunicipalityController@create']);
	Route::resource('municipality','GeoMunicipalityController',['except' => 'create']);
	Route::get('getmunicipality', array('as' => 'admin', 'uses' => 'GeoMunicipalityController@getjson'));

	Route::post('place/getall', array('as' => 'admin', 'uses' => 'GeoPlaceController@fetchall'));
	Route::post('place/verify', array('as' => 'admin', 'uses' => 'GeoPlaceController@verifyplace'));
	Route::get('place/export', array('as' => 'admin', 'uses' => 'GeoPlaceController@export'));
	Route::resource('place','GeoPlaceController');

	Route::post('logs/getall', array('as' => 'admin', 'uses' => 'LogController@fetchall'));
	Route::delete('logs/delete/{id}/{tableID}', array('as' => 'logs.destroy', 'uses' => 'LogController@destroy'));
	Route::resource('logs','LogController',['except' => 'destroy']);

	Route::get('sample/{id?}', array('as' => 'admin', 'uses' => 'ImportController@sample_file'));
	Route::resource('import','ImportController');

	Route::get('settings', array('as' => 'admin', 'uses' => 'SettingController@index'));
	Route::match(['put', 'patch'],'settings/{id?}', array('as' => 'admin', 'uses' => 'SettingController@update'));

});