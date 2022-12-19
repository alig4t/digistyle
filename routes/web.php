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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'Frontend\IndexController@index');
Route::get('/cart', 'Frontend\CartController@index')->name('cart.index');
Route::get('product/{product_slug}', 'Frontend\ProductController@show')->name('product.show');
Route::get('/add-to-cart/{pid}', 'Frontend\CartController@addToCart')->name('cart.add');

Route::get('/remove-cart/{pid}', 'Frontend\CartController@removeCart')->name('cart.remove');
Route::get('/plus-cart/{pid}', 'Frontend\CartController@plusCart')->name('cart.plus');

Route::get('/category/{slug}', 'Frontend\ProductController@category_show')->name('cat.show');
Route::post('/category/{slug}/', 'Frontend\ProductController@category_filter')->name('cat.filter');

Route::get('/brand/{slug}', 'Frontend\ProductController@brand_show')->name('brand.show');


// Route::get('/category/{slug}/{query}',function($slug,$query){

// })->name('cat.show');

Route::group(['middleware'=>['auth']],function(){
    $this->get('/panel','Frontend\PanelController@index')->name('panel.index');
});




Route::group(['middleware' => ['auth:web','CheckAdminUser']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', 'backend\dashboardController@index')->name('dashboard.index');
        Route::resource('/categories', 'backend\categoryController');
        Route::resource('/brands', 'Backend\BrandController');
        Route::resource('/attribute-groups', 'backend\AttributeGroupController');
        Route::resource('/attribute-values', 'backend\AttributeValueController');
        Route::resource('/sizes', 'SizeController');
        Route::resource('/colors', 'ColorController');

        Route::get('attribute-values/add/{id}', 'backend\AttributeValueController@addVal_create')->name('addAttrVal.create');
        Route::post('attribute-values/add', 'backend\AttributeValueController@addVal_insert')->name('addAttrVal.insert');

        Route::resource('/products', 'backend\ProductAdminController');
        Route::get('/products/{id}/stock/add', 'StockController@stock_add')->name('stock.add');
        Route::post('/products/stock', 'StockController@stock_store')->name('stock.store');
        Route::patch('/products/stock/{id}', 'StockController@stock_update')->name('stock.update');

        Route::resource('/photos', 'backend\PhotoController');
        Route::resource('/roles', 'backend\RoleController');

        Route::post('/upload-image', 'Backend\AdminController@EditorUploadImage');
    });
});

Route::get('api/attribute-cat/{id}', 'backend\categoryController@getCat')->name('apiCat');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
