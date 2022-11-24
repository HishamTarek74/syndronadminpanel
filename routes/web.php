<?php

use App\Http\Controllers\TransferDataController;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
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
Route::middleware('dashboard.locales')->group(function () {
    Auth::routes();
});

Route::impersonate();
Route::get('locale/{locale}', 'LocaleController@update')->name('locale')->where('locale', '(ar|en)');


Route::as('front.')->group(function () {
    Route::get('/', 'Frontend\FrontendController@index')->name('home');
    // Route::post('/contact/form' , 'Frontend\FrontendController@contactForm')->name('contact.form');
});

// Route::get('/test', [TransferDataController::class, 'categories']);
Route::get('/test/countries', [TransferDataController::class, 'countries']);
