<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', 'FrontendController@index')->name('front');
Route::get('/', 'FrontendController@shop')->name('shop');
Route::post('/get-product', 'FrontendController@get_product')->name('get_product');
Route::get('/get-product', 'FrontendController@get_product_get');
Route::get('/product-details/{name}', 'FrontendController@product_details')->name('product.view');
Route::get('/categories', 'FrontendController@categories')->name('categories');
Route::get('/category-product/{id}', 'FrontendController@category_product')->name('category.product');
Route::post('/product-price-get', 'FrontendController@product_price_get')->name('get_product_price');
Route::post('/add-to-cart', 'FrontendController@add_to_cart')->name('add.to.cart');
Route::get('/view-cart', 'FrontendController@view_cart')->name('view.cart');
Route::get('/cart-update', 'FrontendController@cart_update')->name('cart.update');
Route::get('/cart-delete/{id}', 'FrontendController@cart_delete')->name('cart.delete');
Route::post('/cart-frm-delete', 'FrontendController@cart_frm_delete')->name('card.frm.delete');


Route::get('/about-us', 'FrontendController@about_us')->name('about.us');
Route::get('/contact-us', 'FrontendController@contact_us')->name('contact.us');


//product filter
Route::post('/get-product-by-name', 'FrontendController@get_product_by_name')->name('get.product.by.name');
Route::get('/get-product-by-name', 'FrontendController@get_product_by_name_get');
Route::post('/get-product-by-category', 'FrontendController@get_product_by_category')->name('get.product.by.category');
Route::get('/get-product-by-category', 'FrontendController@get_product_by_category_get');

//home product filter
Route::get('pagination/fetch_data', 'FrontendController@fetch_data');


Auth::routes();



Route::prefix('admin')->group(function (){
    Route::get('/login', 'Auth\AdminLoginController@showLoginform')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::group(['middleware' => ['auth:admin']], function() {
    Route::prefix('admin')->group(function() {

        Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');

        //general settings
        Route::get('/general-settings', 'Admin\AdminController@general_settings')->name('admin.general.settings');
        Route::post('/general-settings-update', 'Admin\AdminController@general_settings_update')->name('admin.general.settings.update');

        //product
        Route::get('/products', 'Admin\AdminProductsController@products')->name('admin.product');
        Route::post('/impost-csv', 'Admin\AdminProductsController@impost_csv')->name('import.csv');
        Route::get('/product-get', 'Admin\AdminProductsController@product_get')->name('get.products');
        Route::get('/export-csv', 'Admin\AdminProductsController@export_csv')->name('admin.product.export');
        Route::get('/product-edit/{id}', 'Admin\AdminProductsController@edit_product')->name('product.edit');
        Route::post('/product-single-update', 'Admin\AdminProductsController@update_product_single')->name('product.sing.update');
        Route::post('/delete', 'Admin\AdminProductsController@delete')->name('delete.prodict');
        Route::get('/create-product', 'Admin\AdminProductsController@create_product')->name('admin.product.create');
        Route::post('/create-product-save', 'Admin\AdminProductsController@create_product_save')->name('admin.create.product.save');
        Route::post('/create-product-update', 'Admin\AdminProductsController@create_product_update')->name('admin.update.product.save');
        Route::post('/create-product-delete', 'Admin\AdminProductsController@create_product_delete')->name('delete.product.single');
        Route::get('/delete-product-color-image/{id}', 'Admin\AdminProductsController@delete_product_color_image')->name('delete.product.color.img');
        Route::post('/product-schedule-get', 'Admin\AdminProductsController@product_shcedule_get')->name('admin.get.schedule');


        //produc schedule
        Route::get('/products-schedule', 'Admin\AdminProductsController@products_schedule')->name('admin.product.schedule');
        Route::get('/products-schedule-get', 'Admin\AdminProductsController@products_schedule_get')->name('get.products.shcedule');
        Route::post('/products-schedule-save', 'Admin\AdminProductsController@products_schedule_save')->name('import.product.schedule.csv');
        Route::get('/products-schedule-export', 'Admin\AdminProductsController@products_schedule_export')->name('admin.product.schedule.export');
        Route::post('/delete-products-schedule-all', 'Admin\AdminProductsController@delete_product_schdule_all')->name('delete.product.schudel.all');

        //product category
        Route::get('/product-category', 'Admin\AdminProductsController@product_ctegory')->name('admin.product.category');
        Route::get('/product-category-get', 'Admin\AdminProductsController@product_ctegory_get')->name('get.category');
        Route::post('/product-category-save', 'Admin\AdminProductsController@product_ctegory_save')->name('admin.category.save');
        Route::post('/product-category-single', 'Admin\AdminProductsController@product_ctegory_single')->name('get.single.category');
        Route::post('/product-category-update', 'Admin\AdminProductsController@product_ctegory_update')->name('admin.category.update');
        Route::post('/product-category-delete', 'Admin\AdminProductsController@product_ctegory_delete')->name('admin.category.delete');

        //order
        Route::get('/new-order', 'Admin\AdminProductsController@new_order')->name('admin.order.pending');
        Route::get('/approved-order', 'Admin\AdminProductsController@napproved_order')->name('admin.approve.order');
        Route::get('/delivered-order', 'Admin\AdminProductsController@delivered_order')->name('admin.delivered.order');
        Route::get('/cancel-order', 'Admin\AdminProductsController@calcel_order')->name('admin.cancel.order');
        Route::get('/order-details/{id}', 'Admin\AdminProductsController@new_order_details')->name('userorder.details');
        Route::post('/order-save', 'Admin\AdminProductsController@order_save')->name('admin.order.status.save');



        //slider
        Route::get('/home-slider', 'Admin\AdminFrontendController@slider')->name('home.slider');
        Route::post('/home-slider-save', 'Admin\AdminFrontendController@slider_save')->name('slider.save');
        Route::post('/home-slider-update', 'Admin\AdminFrontendController@slider_update')->name('slider.update');
        Route::post('/home-slider-delete', 'Admin\AdminFrontendController@slider_delete')->name('slider.delete');
        Route::get('/about-us-page', 'Admin\AdminFrontendController@about_us')->name('admin.about.us');
        Route::post('/about-us-page-save', 'Admin\AdminFrontendController@about_us_save')->name('admin.about.us.save');
        Route::get('/home-static-one', 'Admin\AdminFrontendController@home_static_one')->name('home.static.one');
        Route::post('/home-static-one-save', 'Admin\AdminFrontendController@home_static_one_save')->name('admin.home.static.one.save');
        Route::get('/home-static-two', 'Admin\AdminFrontendController@home_static_two')->name('home.static.two');
        Route::post('/home-static-two-save', 'Admin\AdminFrontendController@home_static_two_save')->name('admin.home.static.two.save');

    });
});


Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'home'], function ()
    {
        Route::get('/', 'HomeController@index')->name('home');

        Route::get('/my-order', 'User\UserController@myorder')->name('myorder');
        Route::get('/my-order-details/{id}', 'User\UserController@myorder_details')->name('myorder.details');

        //billing
        Route::get('/billing-address', 'User\UserController@billing_address')->name('billing.address');
        Route::post('/billing-address-save', 'User\UserController@billing_address_save')->name('my.billing.save');

        //profile
        Route::get('/my-profile', 'User\UserController@my_profile')->name('my.profile');
        Route::post('/my-profile-save', 'User\UserController@my_profile_save')->name('my.profile.save');

        //change password
        Route::get('/change-password', 'User\UserController@change_password')->name('change.password');
        Route::post('/change-password-save', 'User\UserController@change_password_save')->name('my.password.change');


        //checkout
        Route::get('/checkout', 'User\UserController@checkout')->name('checkout');
        Route::post('/checkout-submit', 'User\UserController@checkout_submit')->name('scheckout.submit');

        //strip pay
        Route::post('/stripe-pay', 'User\UserController@stripe_pay')->name('stripe.pay');
        Route::post('/stripe-paypal-save', 'User\UserController@stripe_payal_save')->name('user.paypal.save');
    });
});
