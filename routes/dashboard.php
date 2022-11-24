<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register dashboard routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "dashboard" middleware group and "App\Http\Controllers\Dashboard" namespace.
| and "dashboard." route's alias name. Enjoy building your dashboard!
|
*/

Route::get('/', 'DashboardController@index')->name('home');

// Select All Routes.
Route::delete('delete', 'DeleteController@destroy')->name('delete.selected');
Route::delete('forceDelete', 'DeleteController@forceDelete')->name('forceDelete.selected');
Route::delete('restore', 'DeleteController@restore')->name('restore.selected');

// Select All Routes.
Route::get('export', 'ExcelController@export')->name('excel.export');
Route::post('import', 'ExcelController@import')->name('excel.import');

// Customers Routes.
Route::get('trashed/customers', 'CustomerController@trashed')->name('customers.trashed');
Route::get('trashed/customers/{trashed_customer}', 'CustomerController@showTrashed')->name('customers.trashed.show');
Route::post('customers/{trashed_customer}/restore', 'CustomerController@restore')->name('customers.restore');
Route::delete('customers/{trashed_customer}/forceDelete', 'CustomerController@forceDelete')->name('customers.forceDelete');
Route::resource('customers', 'CustomerController');
Route::get('status/customers/{customer}', 'CustomerController@status')->name('customers.status');

// managers Routes
Route::get('trashed/managers', 'ManagerController@trashed')->name('managers.trashed');
Route::get('trashed/managers/{trashed_manager}', 'ManagerController@showTrashed')->name('managers.trashed.show');
Route::post('managers/{trashed_manager}/restore', 'ManagerController@restore')->name('managers.restore');
Route::delete('managers/{trashed_manager}/forceDelete', 'ManagerController@forceDelete')->name('managers.forceDelete');
Route::resource('managers', 'ManagerController');
Route::get('status/managers/{manager}', 'ManagerController@status')->name('managers.status');

// Assistants Routes.
Route::get('trashed/assistants', 'AssistantController@trashed')->name('assistants.trashed');
Route::get('trashed/assistants/{trashed_assistant}', 'AssistantController@showTrashed')->name('assistants.trashed.show');
Route::post('assistants/{trashed_assistant}/restore', 'AssistantController@restore')->name('assistants.restore');
Route::delete('assistants/{trashed_assistant}/forceDelete', 'AssistantController@forceDelete')->name('assistants.forceDelete');
Route::resource('assistants', 'AssistantController');
Route::get('status/assistants/{assistant}', 'AssistantController@status')->name('assistants.status');

// Supervisors Routes.
Route::get('trashed/supervisors', 'SupervisorController@trashed')->name('supervisors.trashed');
Route::get('trashed/supervisors/{trashed_supervisor}', 'SupervisorController@show')->name('supervisors.trashed.show');
Route::post('supervisors/{trashed_supervisor}/restore', 'SupervisorController@restore')->name('supervisors.restore');
Route::delete('supervisors/{trashed_supervisor}/forceDelete', 'SupervisorController@forceDelete')->name('supervisors.forceDelete');
Route::resource('supervisors', 'SupervisorController');
Route::get('status/supervisors/{supervisor}', 'SupervisorController@status')->name('supervisors.status');

// Admins Routes.
Route::get('trashed/admins', 'AdminController@trashed')->name('admins.trashed');
Route::get('trashed/admins/{trashed_admin}', 'AdminController@show')->name('admins.trashed.show');
Route::post('admins/{trashed_admin}/restore', 'AdminController@restore')->name('admins.restore');
Route::delete('admins/{trashed_admin}/forceDelete', 'AdminController@forceDelete')->name('admins.forceDelete');
Route::resource('admins', 'AdminController');

// Settings Routes.
Route::get('settings', 'SettingController@index')->name('settings.index');
Route::patch('settings', 'SettingController@update')->name('settings.update');
Route::get('backup/download', 'SettingController@downloadBackup')->name('backup.download');

// Feedback Routes.
Route::patch('feedback/read', 'FeedbackController@read')->name('feedback.read');
Route::patch('feedback/unread', 'FeedbackController@unread')->name('feedback.unread');
Route::resource('feedback', 'FeedbackController')->only('index', 'show', 'destroy');


// notifications
Route::resource('notifications', 'NotificationController');

Route::get('trashed/roles', 'RoleController@trashed')->name('roles.trashed');
Route::get('trashed/roles/{trashed_role}', 'RoleController@showTrashed')->name('roles.trashed.show');
Route::post('roles/{trashed_role}/restore', 'RoleController@restore')->name('roles.restore');
Route::delete('roles/{trashed_role}/forceDelete', 'RoleController@forceDelete')->name('roles.forceDelete');
Route::resource('roles', 'RoleController');
// Countries
Route::resource('countries', 'CountryController');
Route::get('status/countries/{country}', 'CountryController@status')->name('countries.status');
Route::resource('countries.cities', 'CityController')->except('create');
Route::resource('cities.areas', 'AreaController')->except('create', 'show');

