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

use App\Payment;
use App\Stock;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// ss;
Route::get('/', 'Frontend\IndexController@index');
Route::get('/cart', 'Frontend\CartController@index')->name('cart.index');
Route::get('product/{product_slug}', 'Frontend\ProductController@show')->name('product.show');

Route::get('/add-to-cart/{stock_id}/{count}', 'Frontend\CartController@addToCart')->name('cart.add');
Route::get('/clear-cart', 'Frontend\CartController@clearCart')->name('cart.clear');

Route::get('/show-cart', 'Frontend\CartController@showCart');
Route::get('/show-cart2', 'Frontend\CartController@showCart2');



Route::get('/remove-cart/{pid}', 'Frontend\CartController@removeCart')->name('cart.remove');
Route::get('/plus-cart/{pid}', 'Frontend\CartController@plusCart')->name('cart.plus');

Route::get('/category/{slug}', 'Frontend\ProductController@category_show')->name('cat.show');
Route::post('/category/{slug}/', 'Frontend\ProductController@category_filter')->name('cat.filter');

Route::get('/brand/{slug}', 'Frontend\ProductController@brand_show')->name('brand.show');

Route::get('/search' , 'Frontend\ProductController@search_product')->name('product.search');

// Route::get('/category/{slug}/{query}',function($slug,$query){

// })->name('cat.show');

Route::group(['middleware'=>['auth:web','verified']],function(){
    $this->get('/panel','Frontend\PanelController@index')->name('panel.index');
});




Route::group(['middleware' => ['auth:web','verified','CheckAdminUser']], function () {
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


Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');


Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');


// Route::get('/', function(){

//      dd(session('cart'));

// });
    // $users = \App\User::pluck('id'); 
    // $users_count =  count($users);
    // return $users[rand(0,$users_count - 1)];

    // return rand(0.01,1);

    // $orders = \App\Order::selectRaw('totalprice - totaldiscount as total')->get();

    // return $orders;

    // dd(Carbon::now()->subMonths(3)->month);

    // $date = \Morilog\Jalali\Jalalian::forge('now - 3 months')->format('%B');

    
    // return Str::random(25);

    // $orders = \App\Order::pluck('id');

    // return $orders;

    // $payments = new \App\Payment();
    // return $payments->index();
    
    //  dd(Carbon::now()->subMonths(6));
    // \Morilog\Jalali\CalendarUtils::toGregorian(1395, 2, 18);

    // return \Morilog\Jalali\Jalalian::forge('now - 6 months');

    // $user = \App\User::find(4);

    // event(new \App\Events\UserRegistered($user));

//    dd(Carbon::now()->toDateTimeString());

    // $user = \App\User::find(1)->first();
    // $payment = new Payment();
    // return $payment->scopeCreateCode($user);


// });

// Route::get('/', 'backend\PaymentController@index');


// Route::get('/', function(){
//     $stock = Stock::findorfail(1);
//     $stock->increment('count');
// });
