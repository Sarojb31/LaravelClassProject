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
/*===============================FrontEnd Routes=======================*/
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');

Route::get('/shop', 'FrontEnd\ShopController@shoplist')->name('shop');
Route::get('/aboutus', 'FrontEnd\FrontendController@about')->name('about');
Route::get('/contact', 'FrontEnd\FrontendController@contact')->name('contact');
Route::get('/product/{id}', 'FrontEnd\FrontendController@product')->name('product');
Route::get('/category/{id}' , [
    'uses' => 'FrontEnd\ShopController@getCategory',
    'as' => 'category.single'
    ]);
	/*=============================Donation====================================*/
Route::get('/donate/list', 'BackEnd\DonationController@showDonationlist')->name('donate.list');

Route::group(['middleware'=>'auth'],function(){		

Route::get('/donate', 'BackEnd\DonationController@showDonationForm')->name('donate');
Route::post('/donate', 'BackEnd\DonationController@donateBook')->name('donate.submit');


		/*=============================Upload====================================*/
Route::get('/upload', 'FrontEnd\ShopController@showuploadForm')->name('upload');
Route::post('/upload', 'FrontEnd\ShopController@uploadBook')->name('upload.submit');

/*=============================Order====================================*/

Route::post('/order', 'FrontEnd\ShopController@order')->name('order.register');
Route::post('/cart/{id}', 'FrontEnd\ShopController@deletecart')->name('trash');
Route::get('/cart', 'FrontEnd\FrontendController@cart')->name('cart');
Route::get('/visit', 'FrontEnd\FrontendController@visit')->name('final');

});

/*===============================BackEndEnd Routes=======================*/


Route::get('admin/login','Auth\AdminLoginController@ashowLoginForm')->name('admin.login');
Route::post('admin/login','Auth\AdminLoginController@alogin')->name('admin.login.submit');

Route::group(['prefix'=>'admin','middleware' => ['auth:admin']], function () {
    // routes...
		
	Route::get('/logout','Auth\AdminLoginController@alogout')->name('admin.logout');
	Route::get('/','BackEnd\AdminController@index')->name('admin.dashboard');


	Route::get('/admins','BackEnd\AdminController@showadminslist')->name('admin.admins');
	Route::get('/user','BackEnd\UserController@showUserlist')->name('admin.user');

	Route::get('/user/add','BackEnd\UserController@getaddUser')->name('admin.user.register');
	Route::post('/user/add','BackEnd\UserController@addUser')->name('admin.user.register');

	Route::post('/user/delete/{id}','BackEnd\UserController@deleteUser')->name('admin.user.delete');
	Route::get('/user/edit','BackEnd\UserController@editUser')->name('admin.user.edit');
	
	/*=============================Product====================================*/

		Route::get('/product','BackEnd\ProductController@showProductlist')->name('admin.product');
		Route::get('/product/add','BackEnd\ProductController@showProductForm')->name('admin.product.add');
		Route::post('/product/add','BackEnd\ProductController@addProduct')->name('admin.product.add');
		Route::get('/product/edit/{id}','BackEnd\ProductController@getEditProduct')->name('admin.edit-product');
	    Route::post('/product/edit','BackEnd\ProductController@postEditProduct')->name('admin.store-product');
		Route::post('/product/delete/{id}','BackEnd\ProductController@deleteProduct')->name('admin.delete-product');

		/*=============================Donation====================================*/
		// Route::get('/donation/add','BackEnd\ProductController@showProductForm')->name('admin.donation.add');
		// Route::post('/donation/add','BackEnd\ProductController@addProduct')->name('admin.donation.add');
		// Route::get('/donation','BackEnd\ProductController@showProductlist')->name('admin.donation');



	/*=============================Category====================================*/

		Route::get('/category','BackEnd\CategoryController@showCategorylist')->name('admin.category');
		Route::get('/category/add','BackEnd\CategoryController@showCategoryForm')->name('admin.category.add');
		Route::post('/category/add','BackEnd\CategoryController@addCategory')->name('admin.category.add');
		Route::get('/category/edit/{id}',  'BackEnd\CategoryController@getEditCategory')->name('admin.edit-category');
	    Route::post('/category/edit',  'BackEnd\CategoryController@postEditCategory')->name('admin.store-category');
	    Route::post('/category/delete/{id}','BackEnd\CategoryController@deleteCategory')->name('admin.delete-category');

	    /*=============================Order====================================*/
	    Route::get('/order','BackEnd\OrderController@orderlist')->name('admin.order');
});








