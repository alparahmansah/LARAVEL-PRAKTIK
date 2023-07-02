<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/about', function () {
    return view('about');
});


Route::get('/hello/{nama}/{alamat}', function($nama,$alamat) {
    return "<h2>Hello $nama ke $alamat </h2>";
}); 

Route::get('/produk/{id}', function ($id){
    return view('produk/index',["id" => $id]);
});

use App\Http\Controllers\UserController;

Route::get('/user',
    [UserController::class,'index']);


    Route::get('/user/daftar', 
        [UserController::class, 'daftar']);

Route::post('/user/store', 
    [UserController::class, 'store'])->name('user/store');


use App\Http\Controllers\TokoController;

Route::prefix('toko')->group(function(){
    Route::get('/',
        [TokoController::class,'index']);


    Route::get('/detail',
        [TokoController::class,'detail']);

    Route::group(['middleware'=>['auth']],function(){
        
    Route::get('/admin',
    [TokoController::class,'admin'])->name('produk.admin');
    
    

    });

    Route::get('/product/create',
        [TokoController::class,'create'])->name('produk.create');
    
    Route::post('/product',
    [TokoController::class,'store'])->name('produk.store');


    Route::get('/product/{product}/edit',
        [TokoController::class, 'edit'])->name('produk.edit');


    Route::delete('/product/{product}',
        [TokoController::class, 'destroy'])->name('produk.destroy');

    Route::put('/product/{product}',
        [TokoController::class, 'update'])->name('produk.update');

Route::get('/customers',
    [TokoController::class,'customers'])->name('customers.admin');  
    
Route::get('/customers/create',
    [TokoController::class,'createCustomers'])->name('customers.create');

Route::post('/customers',
    [TokoController::class,'storeCustomers'])->name('customers.store');    

Route::get('/customers/{customer}/edit',
   [TokoController::class,'editCustomers'])->name('customers.edit');
    

Route::put('/customers/{customer}',
[TokoController::class,'updateCustomers'])->name('customers.update');

Route::delete('/customers/{customer}',
    [TokoController::class,'destroyCustomers'])->name('customers.destroy');



});

use App\Http\Controllers\FormController;

Route::get('/form', [FormController::class, 'index']);
Route::post('/hasil', [FormController::class, 'hasil']);










Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
