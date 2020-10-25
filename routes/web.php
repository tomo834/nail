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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'api'], function () {
  Route::get('news/list','NewsController@list');
});

Route::resource('news','NewsController');

Route::group(['middleware' => 'admin' ,'as' => 'admin.' ], function () {

  Route::group(['prefix' => 'administor'], function () {
    //excel
    Route::get('file-import-export', 'AdminExcelController@fileImportExport');
    Route::post('file-import', 'AdminExcelController@fileImport')->name('file-import');
    Route::get('file-export', 'AdminExcelController@fileExport')->name('file-export');

    Route::get('file-allimports', 'AllAdminController@fileImport');
    Route::post('file-allimport', 'AllAdminController@fileAllImport'); 
    
  });

  Route::group(['prefix' => 'agency'], function () {
    //excel
    Route::get('file-import-export', 'AgencyExcelController@fileImportExport');
    Route::post('file-import', 'AgencyExcelController@fileImport')->name('file-import');
    Route::post('file-import', 'AgencyExcelController@fileImport')->name('file-import');
    Route::get('file-export', 'AgencyExcelController@fileExport')->name('file-export'); 

  });

  Route::group(['prefix' => 'distributor'], function () {
    //excel
    Route::get('file-import-export', 'DistributorExcelController@fileImportExport');
    Route::post('file-import', 'DistributorExcelController@fileImport')->name('file-import');
    Route::post('file-import', 'DistributorExcelController@fileImport')->name('file-import');
    Route::get('file-export', 'DistributorExcelController@fileExport')->name('file-export'); 

    Route::get('sales',"SalesController@distributor");

  });

  Route::group(['prefix' => 'member'], function () {
    Route::get('sales/register', "SalesRegisterController@index")->name('register');
    Route::get('purchase', "PurchaseController@index")->name('purchase');
    Route::get('sales',"SalesController@member");

  });

  
});





Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::get('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

  Route::get('/password/edit', 'AdminAuth\UpdatePasswordController@editPassword')->name('password.edit');
  Route::post('/password/', 'AdminAuth\UpdatePasswordController@updatePassword')->name('password.update');

  Route::group(['middleware' => 'admin' ,'as' => 'admin.' ], function () {

    Route::get('', "AdminController@index");
    Route::get('sales', "SalesController@sales");
    Route::get('user/list', "AdminUserController@userList");

    Route::resource('user', "UserController");
    Route::resource('device', "DeviceController");

    Route::get('product/purchase', "PurchaseController@index")->name('purchase');
    Route::get('product/sales', "ProductSaleController@sales");

    //excel
    Route::get('file-import-export', 'AdminExcelController@fileImportExport');
    Route::post('file-import', 'AdminExcelController@fileImport')->name('file-import');
    Route::get('file-export', 'AdminExcelController@fileExport')->name('file-export');

    Route::get('file-allimports', 'AllAdminController@fileImport');
    Route::post('file-allimport', 'AllAdminController@fileAllImport'); 

    Route::resource('',"AdminController");
  });

    Route::post('product/receive', "PurchaseController@receive")->name('receive');
    Route::post('product/result', "PurchaseController@result")->name('result');

});

Route::group(['prefix' => 'user'], function () {
  Route::get('/login', 'UserAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'UserAuth\LoginController@login');
  Route::post('/logout', 'UserAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'UserAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'UserAuth\RegisterController@register');

  Route::post('/password/email', 'UserAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'UserAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'UserAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'UserAuth\ResetPasswordController@showResetForm');
});
