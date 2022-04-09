<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * route resource genre
 */
Route::apiResource('/genre', 'GenreController');

/**
 * route resource category
 */
Route::apiResource('/category', 'CategoryController');

/**
 * route resource author
 */
Route::apiResource('/author', 'AuthorController');

/**
 * route resource reviewer
 */
Route::apiResource('/reviewer', 'ReviewerController');

// Route::group([
//     'prefix' => 'auth' ,
//     'namespace' => 'Auth'
//  ] , function(){
//     Route::post('register' , 'RegisterController')->name('auth.register');
//     Route::post('regenerate-otp-code' , 'RegenerateOtpCodeController')->name('auth.regenerate_otp_code');
//     Route::post('verification' , 'VerificationController')->name('auth.verification');
//     Route::post('update-password' , 'UpdatePasswordController')->name('auth.update_password');
//     Route::post('login' , 'LoginController')->name('auth.login');
// }
// );