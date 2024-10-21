<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('Home');
});


Route::controller(ClientController::class)->group(function () {
    Route::get('/category/{id}/{slug}', 'Categorypage')->name('category');
    Route::get('/product-details/{id}/{slug}', 'SingleProduct')->name('singleproduct');
    Route::get('/new-release', 'Newrelease')->name('newrelease');
});


Route::middleware('auth')->group(function () {
    Route::controller(ClientController::class)->group(function () {
    Route::get('/add-to-cart', 'Addtocart')->name('addtocart');
    Route::post('/add-product-to-cart', 'Addproducttocart')->name('addproducttocart');
    Route::get('/shippingaddress','GetShippingAddress')->name('shippingaddress');
    Route::post('/add-shipping-address', 'AddShippingAddress')->name('addshippingaddress');
    Route::post('/place-order', 'PlaceOrder')->name('placeorder');
    Route::get('/check-out', 'Checkout')->name('checkout');
    Route::get('/user-profile', 'Userprofile')->name('userprofile');
    Route::get('/user-profile/pending-order', 'pendingaorder')->name('Userprofilependingorder');
    Route::get('/user-profile/history', 'History')->name('history');
    Route::get('/todays-deal', 'Todaysdeal')->name('todaysdeal');
    Route::get('/customer-service', 'Customerservice')->name('customerservice');
    Route::get('/remove-cart-item/{id}', 'RemoveCartItem')->name('removeitem');
  }); 
});

Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin/dashboard', 'index')->name('admindashboard');
        
    });

});


Route::middleware('auth')->group(function () {
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/admin/all-category', 'index')->name('allcategory');
        Route::get('/admin/addcategory', 'addcategory')->name('addcategory');
        Route::post('/admin/store-category', 'StoreCategory')->name('storecategory');
        Route::get('/admin/edit-category/{id}', 'EditCategory')->name('editcategory');
        Route::post('/admin/update-category', 'UpdateCategory')->name('updatecategory');
        Route::get('/admin/delete-category/{id}', 'DeleteCategory')->name('deletecategory');




    });
});


Route::middleware('auth')->group(function () {
    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/admin/all-subcategory', 'index')->name('allsubcategory');
        Route::get('/admin/add-subcategory', 'addsubcategory')->name('addsubcategory');
        Route::post('/admin/store-subcategory', 'StoreSubCategory')->name('storesubcategory');
        Route::get('/admin/edit-subcategory/{id}', 'EditSubcat')->name('editsubcat');
        Route::get('/admin/delete-subcategory/{id}', 'Deletesubcat')->name('deletesubcat');
        Route::post('/admin/update-subcategory', 'Updatesubcat')->name('updatesubcat');


    });
});

Route::middleware('auth')->group(function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/admin/all-product', 'index')->name('allproduct');
        Route::get('/admin/add-product', 'addproduct')->name('addproduct');
        Route::post('/admin/store-product', 'StoreProduct')->name('storeproduct');
        Route::get('/admin/edit-product/{id}', 'EditProduct')->name('editproduct');
        Route::post('/admin/update-product', 'UpdateProduct')->name('updateproduct');
        Route::get('/admin/delete-product/{id}', 'DeleteProduct')->name('deleteproduct');



    });
});

Route::middleware('auth')->group(function () {
    Route::controller(OrdersController::class)->group(function () {
        Route::get('/admin/pendingorder', 'index')->name('pendingorder');
        Route::get('/admin/completedorder', 'completedorder')->name('completedorder');
        Route::get('/admin/cancelorder', 'cancelorder')->name('cancelorder');

    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



// Route::get('product',[ProductController::class, 'index'])->name('product.index');
