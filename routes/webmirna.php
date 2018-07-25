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



Auth::routes();


Route::get('/', function () {
    return view('auth/login4');
});
Route::get('login4', ['as' => 'login4', 'middleware' => 'guest', 'uses' => 'Auth\AuthController@getLogin']);

// login
Route::resource('login4','LoginController');

Route::post('login4', 'LoginController@postlogin2');
Route::get('logout', 'LoginController@logout');

Route::get('tes',function(){
	return bcrypt('adminsistem1');
});


//admin sistem
// Route::group(['middleware' => 'admin'], function () {
Route::resource('dashb', 'DashbController');
Route::resource('admindevice', 'AdminDeviceController');
Route::get('admindevice_export', 'AdminDeviceController@exportFile');
Route::post('import_admindevice', 'AdminDeviceController@import');

Route::resource('adminuser', 'AdminUserController');
Route::get('adminuser_export', 'AdminUserController@exportFile');
Route::post('import_adminuser', 'AdminUserController@import');

Route::resource('adminrf', 'RfAdminController');
Route::get('adminrf_export', 'RfAdminController@exportFile');
Route::post('import_adminrf', 'RfAdminController@import');

Route::resource('adduser', 'AddUserController');
Route::resource('addadmin', 'AddAdminController');
Route::resource('adddevice', 'AddDeviceController');



Route::get('report', 'ReportController@index');
Route::get('report/export', 'ReportController@exportFile');

Route::post('import_device', 'AdminUserController@import');
Route::post('adddevice/{id_rf}/update','AdminDeviceController@update');
Route::post('addadmin/{id_user}/update','RfAdminController@update');
Route::post('adduser/{nik}/update','AdminUserController@update');
Route::get('admindevice/{id_rf}/delete','AdminDeviceController@destroy');
Route::get('adminuser/{nik}/delete','AdminUserController@destroy');
Route::get('adminrf/{id_user}/delete','RfAdminController@destroy');
// });

//image
Route::get('addadmin/{image}/getImage', 'AddAdminController@getImage');
Route::get('adduser/{image}/getImage', 'AddUserController@getImage');


//admin rf
// Route::group(['middleware' => 'rfadmin'], function () {
Route::resource('rfreturn', 'RfReturnController');
Route::post('rfreturn/{nik}/update', 'RfReturnController@update');
Route::resource('rfdashb', 'RfDashbController');
Route::resource('rfout', 'RfOutController');
Route::get('rfreport', 'RfReportController@index');
Route::get('rfreport/export', 'RfReportController@export');

Route::get('rfout/{nik}/getData', 'RfOutController@getData');
Route::get('rfout/{id_rf}/getDevice', 'RfOutController@getDevice');

Route::get('/pesan', 'FlashMessageController@index');
Route::get('/get-pesan', 'FlashMessageController@pesan');
Route::get('/pesanreturn', 'FlashMessageController@indexreturn');
Route::get('/get-pesanreturn', 'FlashMessageController@pesanreturn');
Route::get('/pesanadduser', 'FlashMessageController@indexadduser');
Route::get('/get-pesanadduser', 'FlashMessageController@pesanadduser');
Route::get('/pesandevice', 'FlashMessageController@indexdevice');
Route::get('/get-pesandevice', 'FlashMessageController@pesandevice');
// });


//manager
// Route::group(['middleware' => 'manager'], function () {
Route::resource('mngrdashb', 'MngrDashbController');
Route::get('mngrreport', 'MngrReportController@index');
Route::get('mngrreport/export', 'MngrReportController@exportFile');
// Route::resource('mngrreport', 'MngrReportController');
// });

