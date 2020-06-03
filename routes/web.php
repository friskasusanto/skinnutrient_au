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

Route::get('/', function () {
    return view('frontend.index');
});

Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('auth/verify/{token}', 'Auth\RegisterController@verify');
// Route::get('auth/send-verification', 'Auth\RegisterController@sendVerification');
// Route::post('email_verification/{email}/{id}', 'Auth\RegisterController@verification');
Route::get('send-mail','backend\admin\BlogController@mailsend');

//KETENTUAN RESELLER dan DROPSHIPER
Route::get('/ketentuan_reseller', 'frontend\FrontendController@gabung_reseller')->name('gabung_reseller');
Route::get('/ketentuan_dropshiper', 'frontend\FrontendController@gabung_dropshiper')->name('gabung_dropshiper');
Route::post('/acc_reseller', 'frontend\FrontendController@acc_reseller')->name('acc_reseller');
Route::post('/acc_dropshiper', 'frontend\FrontendController@acc_dropshiper')->name('acc_dropshiper');

//REGISTER
// Route::get('myform',array('as'=>'myform','uses'=>'frontend\FrontendController@myform'));
Route::get('regencies/ajax/{id}',array('as'=>'myform.ajax','uses'=>'Auth\RegisterController@regencies'));
Route::get('districts/ajax/{id}',array('as'=>'myform.ajax','uses'=>'Auth\RegisterController@districts'));
Route::get('villages/ajax/{id}',array('as'=>'myform.ajax','uses'=>'Auth\RegisterController@villages'));

//BLOG
Route::get('/blog-view','frontend\BlogController@blog')->name('blog');
Route::get('/blog-detail/{id}', 'frontend\BlogController@blog_detail')->name('blog_detail');
Route::post('/comment_blog/{id}', 'frontend\BlogController@comment')->name('comment_blog');

//COMMENT
Route::post('/comment_add/{id}', 'frontend\CommentController@comment')->name('comment_add');
//RATING
Route::post('/rating_product/{id}', 'frontend\FrontendController@rating')->name('rating');

//CHART
Route::post('/chart_add/{id}', 'frontend\WishlistController@add_chart')->name('chart_add');
Route::get('/chart_add/{id}', 'frontend\WishlistController@add_chart')->name('chart_add');

Route::get('/', 'frontend\FrontendController@index_view')->name('index');
Route::get('/about', 'frontend\FrontendController@about_view')->name('about');
Route::get('/bradcaump', 'frontend\FrontendController@bradcaump_view')->name('bradcaump');
Route::get('/cart', 'frontend\FrontendController@cart_view')->name('cart');
Route::get('/checkout', 'frontend\FrontendController@checkout_view')->name('checkout');
Route::get('/distributor', 'frontend\FrontendController@distributor_view')->name('distributor');
Route::get('/shop', 'frontend\FrontendController@shop_view')->name('shop');
Route::get('/shop/terbaru', 'frontend\FrontendController@shop_view_terbaru')->name('shopTerbaru');
Route::get('/shop/terendah', 'frontend\FrontendController@shop_view_terendah')->name('shopTerendah');
Route::get('/shop/tertinggi', 'frontend\FrontendController@shop_view_tertinggi')->name('shopTertinggi');
Route::get('/single_product/{slug}', 'frontend\FrontendController@single_product')->name('single_product');

//FORFOT PASSWORD
Route::get('/forgot_password', 'frontend\FrontendController@forgot_pass_view')->name('forgot_password');
Route::post('/forgot_password', 'frontend\FrontendController@forgot_pass')->name('forgot_password');

Route::get('/change_password/{id}', 'frontend\FrontendController@changePass_view')->name('change_password');
Route::post('/change_password/{id}', 'frontend\FrontendController@changePass')->name('change_password');
Route::post('/letter', 'frontend\FrontendController@letter')->name('letter');

// Route::post('/login', 'Auth\LoginController@login')->name('login');

//DROPSHIP

//USER

Route::group(['middleware' => ['auth', 'verified']], function ()  {
	Route::get('/home', array('as' => 'home','uses' => 'HomeController@index'))->name('home');
	Route::get('/ganti_password/{id}', array('as' => 'gantipassword','uses' => 'backend\member\MemberController@changePass_view'))->name('gantipassword');
	Route::post('/ganti_password/{id}', array('as' => 'gantipassword','uses' => 'backend\member\MemberController@changePass'))->name('gantipassword');

//FRONTEND

	//DROPSHIP
	Route::get('/shop/dropship', array('as' => 'cart','uses' => 'frontend\FrontendController@shop_view_dropship'))->name('shopdropship');

	//CHECKOUT
	Route::get('/checkout/{id}', array('as' => 'checkout','uses' => 'frontend\CheckoutController@checkout'))->name('checkout');
	Route::post('/checkout_add', array('as' => 'checkout_add','uses' => 'frontend\CheckoutController@checkout_add'))->name('checkout_add');


	//CHART
	Route::get('/cart/{name}', array('as' => 'cart','uses' => 'frontend\WishlistController@chart_view'))->name('cart');
	Route::get('/cart/delete/{id}', array('as' => 'cart.delete','uses' => 'frontend\WishlistController@delete'))->name('cart_delete');
	Route::post('/cart_ubah/{id}', array('as' => 'cart.ubah','uses' => 'frontend\WishlistController@ubah'))->name('cart_ubah');

//MEMBER

	//MEMBER
	Route::get('/member/biodata', array('as' => 'member.biodata','uses' => 'backend\member\MemberController@biodata'))->name('member.biodata');
	Route::get('/member/order', array('as' => 'member.order','uses' => 'backend\member\OrderController@index'))->name('member.order.index');
	Route::get('/member/log', array('as' => 'member.log','uses' => 'backend\member\LogController@log'))->name('member_log');
	Route::get('/member/barangTiba/{id}', array('as' => 'member.barangTiba','uses' => 'backend\member\LogController@barangTiba'))->name('barangTiba');
	Route::get('/member/detailBarang/{id}', array('as' => 'member.detailBarang','uses' => 'backend\member\LogController@detailBarang'))->name('member_detailBarang');

	Route::get('/member/detailBarang', 'backend\member\LogController@barangTiba');
	Route::get('/member/show/{id}', 'backend\member\LogController@show');

	//WISHLIST
	// Route::get('/member/wishlist/{id}', array('as' => 'member.wishlist.add','uses' => 'frontend\WishlistController@add_wishlist'))->name('member_wishlist_add');

//ADMIN

	//DASBOARD
	Route::get('/dasboard', array('as' => 'admin.dasboard','uses' => 'backend\admin\BackendController@dasboard'))->name('admin_dasboard');
	Route::post('/storeName/{id}', array('as' => 'storeName','uses' => 'backend\admin\BackendController@store'))->name('storeName');

	//PRODUCT
	Route::get('/admin/gambar_product', array('as' => 'admin.gambarproduct','uses' => 'backend\admin\ProductController@index_product'))->name('admin_index_product');

	Route::get('/admin/index/product', array('as' => 'admin.index.product','uses' => 'backend\admin\ProductController@gambar_product_view'))->name('admin_gambarproduct');
	Route::get('/admin/edit/product/{id}', array('as' => 'admin.edit.view','uses' => 'backend\admin\ProductController@edit_view_product'))->name('admin_edit_view');
	Route::post('/admin/edit/product/{id}', array('as' => 'admin.edit','uses' => 'backend\admin\ProductController@edit_product'))->name('admin_edit_product');
	Route::get('/admin/delete/product/{id}', array('as' => 'admin.delete','uses' => 'backend\admin\ProductController@delete_product'))->name('admin_delete_product');
	Route::get('/admin/add_view/product', array('as' => 'admin.add.product','uses' => 'backend\admin\ProductController@add_view_product'))->name('admin_add_view_product');
	Route::post('/admin/add/product', array('as' => 'admin.add.product','uses' => 'backend\admin\ProductController@add_product'))->name('admin_add_product');


	//USER
	Route::get('/admin/index', array('as' => 'admin.index','uses' => 'backend\admin\UserController@index'))->name('admin_index');
	Route::get('/admin/edit/{id}', array('as' => 'admin.edit.view','uses' => 'backend\admin\UserController@edit_view'))->name('admin_edit_view');
	Route::post('/admin/edit/{id}', array('as' => 'admin.edit','uses' => 'backend\admin\UserController@edit'))->name('admin_edit');
	Route::get('/admin/delete/{id}', array('as' => 'admin.delete','uses' => 'backend\admin\UserController@delete'))->name('admin_delete');

	Route::get('/admin/konfirmasiAcc/{id}', array('as' => 'admin.konfirmasi','uses' => 'backend\admin\UserController@emailKonfirmasi'))->name('admin_konfirmasi');
	Route::get('/admin/konfirmasi', array('as' => 'admin.konfirmasiAcc','uses' => 'backend\admin\UserController@acountAcc'))->name('admin_konfirmasiAcc');

	//CHECKOUT
	Route::get('/admin/checkout/index', array('as' => 'admin.index.checkout','uses' => 'backend\admin\CheckoutController@index_checkout'))->name('admin_index_checkout');
	Route::post('/admin/approve/checkout/{id}', array('as' => 'admin.checkout.approve','uses' => 'backend\admin\CheckoutController@approve_admin'))->name('admin_checkout.approve');
	Route::post('/admin/checkout/pengiriman/{id}', array('as' => 'admin.checkout.pengiriman','uses' => 'backend\admin\CheckoutController@pengiriman_barang'))->name('admin_checkout_pengiriman');
	Route::post('/admin/checkout/reject/{id}', array('as' => 'admin.checkout.reject','uses' => 'backend\admin\CheckoutController@reject_admin'))->name('admin_checkout_reject');
	Route::get('/admin/checkout/detail/{id}', array('as' => 'admin.detail.checkout','uses' => 'backend\admin\CheckoutController@detail_checkout'))->name('admin_detail_checkout');

	//CATALOG
	Route::get('/admin/catalog/index', array('as' => 'admin.index.catalog','uses' => 'backend\admin\CatalogController@index'))->name('admin_index_catalog');
	Route::get('/admin/edit/catalog/{id}', array('as' => 'admin.catalog.approve','uses' => 'backend\admin\CatalogController@edit_view'))->name('admin_catalog.edit');
	Route::post('/admin/catalog/edit/{id}', array('as' => 'admin.catalog.edit','uses' => 'backend\admin\CatalogController@edit'))->name('admin_catalog_edit');
	Route::get('/admin/add/catalog', array('as' => 'admin.catalog.add','uses' => 'backend\admin\CatalogController@add_view'))->name('admin_catalog.add');
	Route::post('/admin/add/catalog', array('as' => 'admin.catalog.add','uses' => 'backend\admin\CatalogController@add'))->name('admin_catalog_add');
	Route::get('/admin/catalog/delete/{id}', array('as' => 'admin.delete.catalog','uses' => 'backend\admin\CatalogController@delete'))->name('admin_delete_catalog');

	//CATEGORY
	Route::get('/admin/category/index', array('as' => 'admin.index.category','uses' => 'backend\admin\CategoriController@index'))->name('admin_index_category');
	Route::get('/admin/edit/category/{id}', array('as' => 'admin.category.approve','uses' => 'backend\admin\CategoriController@edit_view'))->name('admin_category.edit');
	Route::post('/admin/category/edit/{id}', array('as' => 'admin.category.edit','uses' => 'backend\admin\CategoriController@edit'))->name('admin_category_edit');
	Route::get('/admin/add/category', array('as' => 'admin.category.add','uses' => 'backend\admin\CategoriController@add_view'))->name('admin_category.add');
	Route::post('/admin/add/category', array('as' => 'admin.category.add','uses' => 'backend\admin\CategoriController@add'))->name('admin_category_add');
	Route::get('/admin/category/delete/{id}', array('as' => 'admin.delete.category','uses' => 'backend\admin\CategoriController@delete'))->name('admin_delete_category');

	//GUDANG
	Route::get('/admin/gudang/index', array('as' => 'admin.index.gudang','uses' => 'backend\admin\GudangController@index'))->name('admin_index_gudang');
	Route::get('/admin/edit/gudang/{id}', array('as' => 'admin.gudang.approve','uses' => 'backend\admin\GudangController@edit_view'))->name('admin_gudang_edit');
	Route::post('/admin/gudang/edit/{id}', array('as' => 'admin.gudang.edit','uses' => 'backend\admin\GudangController@edit'))->name('admin_gudang_edit');
	Route::get('/admin/add/gudang', array('as' => 'admin.gudang.add','uses' => 'backend\admin\GudangController@add_view'))->name('admin_gudang_add');
	Route::post('/admin/add/gudang', array('as' => 'admin.gudang.add','uses' => 'backend\admin\GudangController@add'))->name('admin_gudang_add');
	Route::get('/admin/gudang/delete/{id}', array('as' => 'admin.delete.gudang','uses' => 'backend\admin\GudangController@delete'))->name('admin_delete_gudang');


	//LOG
	Route::get('/admin/log', array('as' => 'admin.log','uses' => 'backend\admin\LogController@index'))->name('admin_log');

	//PAYMENT
	Route::get('/admin/payment/index', array('as' => 'admin.index.payment','uses' => 'backend\admin\PaymentController@index'))->name('admin_index_payment');
	Route::get('/admin/edit/payment/{id}', array('as' => 'admin.payment.approve','uses' => 'backend\admin\PaymentController@edit_view'))->name('admin_payment_edit');
	Route::post('/admin/payment/edit/{id}', array('as' => 'admin.payment.edit','uses' => 'backend\admin\PaymentController@edit'))->name('admin_payment_edit');
	Route::get('/admin/add/payment', array('as' => 'admin.payment.add','uses' => 'backend\admin\PaymentController@add_view'))->name('admin_payment_add');
	Route::post('/admin/add/payment', array('as' => 'admin.payment.add','uses' => 'backend\admin\PaymentController@add'))->name('admin_payment_add');
	Route::get('/admin/payment/delete/{id}', array('as' => 'admin.delete.payment','uses' => 'backend\admin\PaymentController@delete'))->name('admin_delete_payment');

	//BLOG
	Route::get('/admin/blog/index', array('as' => 'admin.index.blog','uses' => 'backend\admin\BlogController@index'))->name('admin_index_blog');
	Route::get('/admin/edit/blog/{id}', array('as' => 'admin.blog.approve','uses' => 'backend\admin\BlogController@edit_view'))->name('admin_blog_edit');
	Route::post('/admin/blog/edit/{id}', array('as' => 'admin.blog.edit','uses' => 'backend\admin\BlogController@edit'))->name('admin_blog_edit');
	Route::get('/admin/add/blog', array('as' => 'admin.blog.add','uses' => 'backend\admin\BlogController@add_view'))->name('admin_blog_add');
	Route::post('/admin/add/blog', array('as' => 'admin.blog.add','uses' => 'backend\admin\BlogController@add'))->name('admin_blog_add');
	Route::get('/admin/blog/delete/{id}', array('as' => 'admin.delete.blog','uses' => 'backend\admin\BlogController@delete'))->name('admin_delete_blog');


//DROPSHIP
	//KETENTUAN DROPSHIP
	Route::get('/dropship/ketentuan', array('as' => 'dropship.ketentuan','uses' => 'backend\dropship\DropshipController@ketentuanDropship'))->name('ketentuanDropship');

	//LOG 
	Route::get('/dropship/logOrders', array('as' => 'dropship.log','uses' => 'backend\dropship\LogController@log'))->name('logOrder');
	Route::get('/dropship/detailOrder/{id}', array('as' => 'dropship.detailOrder','uses' => 'backend\dropship\LogController@detail'))->name('detailOrder');
	Route::get('/dropship/load/{id}', array('as' => 'dropship.log','uses' => 'backend\dropship\LogController@try'))->name('try');

	//KATALOG
	Route::get('/dropship/katalogAnda/delete/{id}', array('as' => 'dropship.katalogAnda.delete','uses' => 'backend\dropship\KatalogController@hapusKatalog'))->name('hapusKatalog');
	Route::get('/dropship/katalogAnda', array('as' => 'dropship.katalogAnda','uses' => 'backend\dropship\KatalogController@katalogAnda'))->name('katalogAnda');
	Route::get('/dropship/katalog', array('as' => 'dropship.katalog','uses' => 'backend\dropship\KatalogController@katalogDropship'))->name('katalogDropship');
	Route::get('/dropship/addKatalog/{id}', array('as' => 'dropship.katalogAdd','uses' => 'backend\dropship\KatalogController@addKatalog'))->name('katalogDropshipAdd');

	//ORDER
	Route::get('/dropship/index', array('as' => 'dropship','uses' => 'backend\dropship\OrderController@index'))->name('dropship_index');
	Route::get('/dropship/tambah_order', array('as' => 'order','uses' => 'backend\dropship\OrderController@tambah_list'))->name('tambah_list');

	Route::get('dropship/detail-product/{id}', 'backend\admin\OrderController@getProduct')->name('getProduct');


//RESELLER
	//KETENTUAN RESELLER
	Route::get('/reseller/ketentuan', array('as' => 'dropship.ketentuan','uses' => 'backend\dropship\DropshipController@ketentuanReseller'))->name('ketentuanReseller');

	//LOG
	Route::get('/reseller/listPenjualan', array('as' => 'reseller.ListPenjualan','uses' => 'backend\reseller\LogController@ListPenjualan'))->name('reseller_ListPenjualan');
	Route::get('/reseller/reportPenjualan', array('as' => 'reseller.logPenjualan','uses' => 'backend\reseller\LogController@logPenjualan'))->name('reseller_logPenjualan');
	Route::post('/reseller/insertPenjualan', array('as' => 'reseller.insertPenjualan','uses' => 'backend\reseller\LogController@insert'))->name('reseller_insertPenjualan');



});