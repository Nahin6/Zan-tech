<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\CustomerController;
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

    // return view('dashboard.contactPage');
    // return view('dashboard.dashboard');

});

Route::controller(authController::class)->group(function () {

    Route::get('/redirect', 'LoginFunction')->middleware('load.product');
    Route::get('/loginnn', 'ViewLogin')->name('userLogin');
    Route::get('/create-account', 'ViewRegister')->name('userRegister');
    Route::get('/logout', 'logoutFunction')->name('userLogout');
    Route::get('/veiw-profile', 'userProfile')->name('userProfile');
    Route::post('/update-profile', 'updateInfo')->name('updateNameEmail');
    Route::post('/update-profiles', 'ChangePassword')->name('updatePassword');

});



Route::controller(adminController::class)->group(function () {

Route::get('/add-products','addProductPage')->name('addProductPage');

Route::get('/add-promo','addPromoCodess')->name('addPromoCode');
Route::post('/add-new-promo','addNewPromoCodes')->name('addNewPromoCodes');
Route::get('/edit-promos/{id}','editPromoCode')->name('editPromoCode');
Route::post('/update-promo/{id}','updatePromoCodes')->name('updatePromoCodes');
Route::get('/delete-promo/{id}','deletePromoCodes')->name('deletePromoCode');
Route::post('/add-new-products','addNewProduct')->name('addProducts');
Route::get('/view-products','ViewProductList')->name('ViewProductList');
Route::get('/delete-products/{id}','DeleteProduct')->name('deleteProduct');
Route::get('/edit-products/{id}','editProduct')->name('editProduct');
Route::post('/update-products/{id}','updateProduct')->name('updateProducts');
Route::get('/edit-Category/{id}','editCategory')->name('editCategory');
Route::post('/update-category/{id}','updateCategoryName')->name('updateCategory');
Route::get('/view-user-details','viewUserInfo')->name('userInformation');
Route::get('/delete-user/{id}','deleteUserInfo')->name('deleteUser');
Route::get('/delete/{id}','deleteCategory')->name('deleteCategory');
Route::get('/search-products', 'searchProducts')->name('searchProducts');
Route::get('/add-new-catagory', 'addCatagory')->name('addCatagoryPage');
Route::post('/add-new-catagory', 'addNewCatagory')->name('addNewCatagory');
Route::get('/order-list', 'OrderListView')->name('OrderList');
Route::get('/order-update/{id}', 'UpdateOrderToProcess')->name('UpdateOrderToProcess');
Route::get('/order-updates/{id}', 'UpdateOrderToDelivered')->name('UpdateOrderToDelivered');
Route::get('/order-out/{id}', 'OutForDeliveryFunction')->name('OutForDelivery');
Route::get('/order-updatess/{id}', 'UpdateOrderToNotAvailable')->name('UpdateOrderToNotAvailable');
Route::get('/order-updatesss/{id}', 'UpdateOrderToPending')->name('UpdateOrderToPending');
Route::get('/delete-updatess/{id}', 'deleteOrder')->name('deleteOrder');

});


Route::controller(productController::class)->group(function () {
    Route::get('/', 'showProductsInPriceRange')->middleware('load.product');
    Route::get('/product-details/{id}', 'viewProductDetailInformation')->name('viewProductDetails');
    Route::get('/product-detail/{id}', 'viewProductDetailInformationNew')->name('addProductToWishListNew');
    Route::get('/favorite-product-list', 'viewWishList')->name('viewWishList');
    Route::get('/favorite-total-list/{id}', 'totalWishListCount')->name('totalWishList');
    Route::get('/remove-from-list/{id}', 'removeWisListhPrduct')->name('removeWishPrduct');
    Route::post('/add-to-cart/{id}', 'addToCartPrduct')->name('addToCart');
    Route::get('/show-cart', 'DisplayCartPrduct')->name('showCart');
    Route::get('/remove-cart/{id}', 'removeFromCart')->name('removeFromCart');
    Route::post('/update-cart/{id}', 'updateCartInfo')->name('updateCartProduct');
    Route::get('/checkout-cart', 'checkOutCartPage')->name('checkOutCart');
    Route::post('/checkout-order/{id}', 'CustomerPlaceOrder')->name('placeOrder');
    Route::get('/shop', 'viewAllShop')->name('viewShop');
    Route::get('/projects', 'displayAllProject')->name('displayProject');

});

Route::controller(CustomerController::class)->group(function(){

 Route::get('/track-order-page', 'trackOrderPage')->name('trackOrder');
 Route::get('/download-order-page/{id}', 'downloadOrderToPdf')->name('downloadPdf');
 Route::get('/view-orders/{id}', 'trackOrderStatus')->name('trackOrders');
 Route::post('/customer-query-page', 'storeCustomerQuery')->name('submitCusQuery');
 Route::get('/customer-query-pages', 'viewcustomerQueries')->name('customerQueries');
 Route::get('/customer-seeFeedback-pages', 'ViewFeedback')->name('seeFeedback');
 Route::post('/customer-sol-page/{id}', 'submitSolutionToQuery')->name('submitSolToQuery');
 Route::get('/remove-query/{id}', 'deleteCustomerQuery')->name('deleteQuery');
 Route::get('/find-product/{category}', 'filterCategoriesWiseProduct')->name('filterCategories');
 Route::get('/price-wise-product/{minPrice}/{maxPrice}', 'filterProductByPrice')->name('filterProductsByPriceRange');
 Route::get('/page/{slug}', 'showStaticPage')->name('static-page');

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
