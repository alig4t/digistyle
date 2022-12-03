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
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/token', function (Request $request) {
    $token = $request->session()->token();
 
    $token = csrf_token();
 
    // ...
});

Route::group(['middleware'=>'Admin'],function(){
    Route::prefix('admin')->group(function(){
        Route::get('/','backend\dashboardController@index')->name('dashboard.index');
        Route::resource('/categories','backend\categoryController');
        Route::resource('/attribute-groups','backend\AttributeGroupController');
        Route::resource('/attribute-values','backend\AttributeValueController');
        Route::get('attribute-values/add/{id}','backend\AttributeValueController@addVal_create')->name('addAttrVal.create');
        Route::post('attribute-values/add','backend\AttributeValueController@addVal_insert')->name('addAttrVal.insert');

        Route::resource('/products','backend\ProductAdminController');
        Route::resource('/photos','backend\PhotoController');
    
    });
});

Route::get('api/attribute-cat/{id}','backend\categoryController@getCat')->name('apiCat');






