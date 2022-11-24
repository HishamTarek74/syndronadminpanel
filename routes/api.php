<?php

use App\Http\Controllers\Api\{AgeGroupController,
    AuthenticationController,
    CommentController,
    NotificationSelectController,
    UserController};
use App\Http\Controllers\SelectController as CountrySelectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group and "App\Http\Controllers\Api" namespace.
| and "api." route's alias name. Enjoy building your API!
|
*/
Route::prefix('auth')->as('auth.')->group(function () {
    Route::post('register', [AuthenticationController::class, 'register'])->name('register');
    Route::post('login', [AuthenticationController::class, 'login'])->name('login');
    Route::post('password/forget', [AuthenticationController::class, 'forgetPassword'])->name('forget.password');
    Route::as('user.')->middleware('auth:sanctum')->group(function () {
        Route::delete('destroy', [UserController::class, 'destroy'])->name('destroy');
        Route::get('me', [UserController::class, 'me'])->name('me');
        Route::post('logout', [AuthenticationController::class, 'logout'])->name('logout');
    });
});


Route::middleware('auth:sanctum')->group(function () {
    Route::post('verification/send', 'VerificationController@send')->name('verification.send');
    Route::post('verification/verify', 'VerificationController@verify')->name('verification.verify');
    Route::get('profile', 'ProfileController@show')->name('profile.show');
});

// Countries
Route::get('/select/countries', 'SelectController@countries')->name('countries.select');
Route::get('/select/cities', 'SelectController@cities')->name('cities.select');
Route::get('/select/countries/{country}/cities', [CountrySelectController::class, 'countryCities'])->name('cities.areas.select');
Route::get('/select/cities/{city}/areas', [CountrySelectController::class, 'cityAreas'])->name('citiess.areas.select');

Route::apiResource('countries', 'SelectController')->only('index', 'show');
Route::get('country/default', 'SelectController@default')->name('countries.default');
Route::apiResource('cities', 'SelectController')->only('index', 'show');
Route::get('countries/cities/options', 'CityController@options')->name('cities.options');

Route::get('/select/pages', 'SelectController@pages')->name('pages.select');

