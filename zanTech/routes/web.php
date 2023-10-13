<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\productController;

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
    return view('dashboard.dashboard');
});

Route::controller(authController::class)->group(function () {

    Route::get('/redirect', 'LoginFunction')->middleware('load.product');
    Route::get('/loginnn', 'ViewLogin')->name('userLogin')->middleware();
    Route::get('/create-account', 'ViewRegister')->name('userRegister')->middleware();
    Route::get('/logout', 'logoutFunction')->name('userLogout')->middleware();
    Route::get('/veiw-profile', 'userProfile')->name('userProfile');

});



Route::controller(adminController::class)->group(function () {

Route::get('/add-products','addProductPage')->name('addProductPage')->middleware();
Route::post('/add-new-products','addNewProduct')->name('addProducts')->middleware();
Route::get('/view-products','ViewProductList')->name('ViewProductList')->middleware();
Route::get('/delete-products/{id}','DeleteProduct')->name('deleteProduct')->middleware();
Route::get('/edit-products/{id}','editProduct')->name('editProduct')->middleware();
Route::post('/update-products/{id}','updateProduct')->name('updateProducts')->middleware();
Route::get('/view-user-details','viewUserInfo')->name('userInformation')->middleware();
Route::get('/delete/{id}','deleteUserInfo')->name('deleteUser')->middleware();
Route::get('/delete/{id}','deleteCategory')->name('deleteCategory')->middleware();
Route::get('/search-products', 'searchProducts')->name('searchProducts')->middleware();
Route::get('/add-new-catagory', 'addCatagory')->name('addCatagoryPage')->middleware();
Route::post('/add-new-catagory', 'addNewCatagory')->name('addNewCatagory')->middleware();

});


Route::controller(productController::class)->group(function () {
    Route::get('/', 'showProductsInPriceRange')->middleware('load.product');
    Route::get('/product-details/{id}', 'viewProductDetailInformation')->name('viewProductDetails');
    Route::get('/product-detail/{id}', 'viewProductDetailInformationNew')->name('addProductToWishListNew');
    Route::get('/favorite-product-list', 'viewWishList')->name('viewWishList');
    Route::get('/favorite-total-list/{id}', 'totalWishListCount')->name('totalWishList');
    // Route::get('/favorite-product/{id}', 'addProductToWishListSection')->name('addProductToWishList');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
