<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


// Route::prefix('v1')->namespace('Api/v1')->group(function () {
//     Route::get('/products','ProductController@index');
// });

Route::group(['prefix'=>'v1' ,'namespace'=> 'Api\v1'], function(){
    Route::get('/products','ProductController@index');
});


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



// Route::group(['prefix'=>'v1' ,'namespace'=> 'Api\v1'], function(){
    
//     $this->get('products','ProductController@products_list');
//     $this->post('comment','ProductController@add_comment');
//     $this->post('login','UserController@login');

//     Route::middleware('auth:api')->group(function(){
//         $this->get('/user', function (Request $request) {
//             // return $request->user();
//             return Auth()->user();
//         }); 
//     });

// });

