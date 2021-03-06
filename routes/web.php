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
Route::get('regencies/ajax/{id}','Auth\RegisterController@regencies');
Route::get('districts/ajax/{id}','Auth\RegisterController@districts');
Route::get('villages/ajax/{id}','Auth\RegisterController@villages');

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
	Route::get('/home','HomeController@index')->name('home');
	Route::get('/ganti_password/{id}', 'backend\member\MemberController@changePass_view')->name('gantipassword');
	Route::post('/ganti_password/{id}', 'backend\member\MemberController@changePass')->name('gantipassword');

//FRONTEND

	//DROPSHIP
	Route::get('/shop/dropship', 'frontend\FrontendController@shop_view_dropship')->name('shopdropship');

	//CHECKOUT
	Route::get('/checkout/{id}', 'frontend\CheckoutController@checkout')->name('checkout');
	Route::post('/checkout_add', 'frontend\CheckoutController@checkout_add')->name('checkout_add');


	//CHART
	Route::get('/cart/{name}', 'frontend\WishlistController@chart_view')->name('cart');
	Route::get('/cart/delete/{id}', 'frontend\WishlistController@delete')->name('cart_delete');
	Route::post('/cart_ubah/{id}', 'frontend\WishlistController@ubah')->name('cart_ubah');

//MEMBER

	//MEMBER
	Route::get('/member/biodata', 'backend\member\MemberController@biodata')->name('member.biodata');
	Route::get('/member/order', 'backend\member\OrderController@index')->name('member.order.index');
	Route::get('/member/log', 'backend\member\LogController@log')->name('member_log');
	Route::get('/member/barangTiba/{id}', 'backend\member\LogController@barangTiba')->name('barangTiba');
	Route::get('/member/detailBarang/{id}', 'backend\member\LogController@detailBarang')->name('member_detailBarang');

	Route::get('/member/detailBarang', 'backend\member\LogController@barangTiba');
	Route::get('/member/show/{id}', 'backend\member\LogController@show');

	//WISHLIST
	// Route::get('/member/wishlist/{id}', array('as' => 'member.wishlist.add','uses' => 'frontend\WishlistController@add_wishlist'))->name('member_wishlist_add');

//ADMIN

	//MenuController
    Route::get('/list_menu', 'backend\admin\MenuController@index')->name('list_menu');
    Route::get('/delete_menu/{id}', 'backend\admin\MenuController@deleteMenu')->name('delete_menu');
    Route::post('/edit_menu/{id}', 'backend\admin\MenuController@editMenu')->name('edit_menu');
    Route::post('/add_menu', 'backend\admin\MenuController@addMenu')->name('add_menu');

	//DASBOARD
	Route::get('/dasboard', 'backend\admin\BackendController@dasboard')->name('admin_dasboard');
	Route::post('/storeName/{id}', 'backend\admin\BackendController@store')->name('storeName');

	//PRODUCT
	Route::get('/admin/gambar_product', 'backend\admin\ProductController@index_product')->name('admin_index_product');

	Route::get('/admin/index/product', 'backend\admin\ProductController@gambar_product_view')->name('admin_gambarproduct');
	Route::get('/admin/edit/product/{id}', 'backend\admin\ProductController@edit_view_product')->name('admin_edit_view');
	Route::post('/admin/edit/product/{id}', 'backend\admin\ProductController@edit_product')->name('admin_edit_product');
	Route::get('/admin/delete/product/{id}', 'backend\admin\ProductController@delete_product')->name('admin_delete_product');
	Route::get('/admin/delete/productGambar/{id}', 'backend\admin\ProductController@deleteProduct_gambar')->name('admin_deleteProductGambar');
	Route::get('/admin/add_view/product', 'backend\admin\ProductController@add_view_product')->name('admin_add_view_product');
	Route::post('/admin/add/product', 'backend\admin\ProductController@add_product')->name('admin_add_product');


	//USER
	Route::get('/admin/index', 'backend\admin\UserController@index')->name('admin_index');
	Route::get('/admin/edit/{id}', 'backend\admin\UserController@edit_view')->name('admin_edit_view');
	Route::post('/admin/edit/{id}', 'backend\admin\UserController@edit')->name('admin_edit');
	Route::get('/admin/delete/{id}', 'backend\admin\UserController@delete')->name('admin_delete');

	Route::get('/admin/konfirmasiAcc/{id}', 'backend\admin\UserController@emailKonfirmasi')->name('admin_konfirmasi');
	Route::get('/admin/konfirmasi', 'backend\admin\UserController@acountAcc')->name('admin_konfirmasiAcc');

	//CHECKOUT
	Route::get('/admin/checkout/index', 'backend\admin\CheckoutController@index_checkout')->name('admin_index_checkout');
	Route::post('/admin/approve/checkout/{id}', 'backend\admin\CheckoutController@approve_admin')->name('admin_checkout.approve');
	Route::post('/admin/checkout/pengiriman/{id}', 'backend\admin\CheckoutController@pengiriman_barang')->name('admin_checkout_pengiriman');
	Route::post('/admin/checkout/reject/{id}', 'backend\admin\CheckoutController@reject_admin')->name('admin_checkout_reject');
	Route::get('/admin/checkout/detail/{id}', 'backend\admin\CheckoutController@detail_checkout')->name('admin_detail_checkout');

	//CATALOG
	Route::get('/admin/catalog/index', 'backend\admin\CatalogController@index')->name('admin_index_catalog');
	Route::get('/admin/edit/catalog/{id}', 'backend\admin\CatalogController@edit_view')->name('admin_catalog.edit');
	Route::post('/admin/catalog/edit/{id}', 'backend\admin\CatalogController@edit')->name('admin_catalog_edit');
	Route::get('/admin/add/catalog', 'backend\admin\CatalogController@add_view')->name('admin_catalog.add');
	Route::post('/admin/add/catalog', 'backend\admin\CatalogController@add')->name('admin_catalog_add');
	Route::get('/admin/catalog/delete/{id}', 'backend\admin\CatalogController@delete')->name('admin_delete_catalog');

	//CATEGORY
	Route::get('/list_category', 'backend\admin\CategoriController@index')->name('list_category');
    Route::get('/delete_category/{id}', 'backend\admin\CategoriController@deleteCategory')->name('delete_category');
    Route::post('/edit_category/{id}', 'backend\admin\CategoriController@editCategory')->name('edit_category');
    Route::post('/add_category', 'backend\admin\CategoriController@addCategory')->name('add_category');

	//GUDANG
	Route::get('/admin/gudang/index', 'backend\admin\GudangController@index')->name('admin_index_gudang');
	Route::get('/admin/edit/gudang/{id}', 'backend\admin\GudangController@edit_view')->name('admin_gudang_edit');
	Route::post('/admin/gudang/edit/{id}', 'backend\admin\GudangController@edit')->name('admin_gudang_edit');
	Route::get('/admin/add/gudang', 'backend\admin\GudangController@add_view')->name('admin_gudang_add');
	Route::post('/admin/add/gudang', 'backend\admin\GudangController@add')->name('admin_gudang_add');
	Route::get('/admin/gudang/delete/{id}', 'backend\admin\GudangController@delete')->name('admin_delete_gudang');


	//LOG
	Route::get('/admin/log', 'backend\admin\LogController@index')->name('admin_log');

	//PAYMENT
	Route::get('/admin/payment/index', 'backend\admin\PaymentController@index')->name('admin_index_payment');
	Route::get('/admin/edit/payment/{id}', 'backend\admin\PaymentController@edit_view')->name('admin_payment_edit');
	Route::post('/admin/payment/edit/{id}', 'backend\admin\PaymentController@edit')->name('admin_payment_edit');
	Route::get('/admin/add/payment', 'backend\admin\PaymentController@add_view')->name('admin_payment_add');
	Route::post('/admin/add/payment', 'backend\admin\PaymentController@add')->name('admin_payment_add');
	Route::get('/admin/payment/delete/{id}', 'backend\admin\PaymentController@delete')->name('admin_delete_payment');

	//BLOG
	Route::get('/admin/blog/index', 'backend\admin\BlogController@index')->name('admin_index_blog');
	Route::get('/admin/edit/blog/{id}', 'backend\admin\BlogController@edit_view')->name('admin_blog_edit');
	Route::post('/admin/blog/edit/{id}', 'backend\admin\BlogController@edit')->name('admin_blog_edit');
	Route::get('/admin/add/blog', 'backend\admin\BlogController@add_view')->name('admin_blog_add');
	Route::post('/admin/add/blog', 'backend\admin\BlogController@add')->name('admin_blog_add');
	Route::get('/admin/blog/delete/{id}', 'backend\admin\BlogController@delete')->name('admin_delete_blog');


//DROPSHIP
	//KETENTUAN DROPSHIP
	Route::get('/dropship/ketentuan', 'backend\dropship\DropshipController@ketentuanDropship')->name('ketentuanDropship');

	//LOG 
	Route::get('/dropship/logOrders', 'backend\dropship\LogController@log')->name('logOrder');
	Route::get('/dropship/detailOrder/{id}', 'backend\dropship\LogController@detail')->name('detailOrder');
	Route::get('/dropship/load/{id}', 'backend\dropship\LogController@try')->name('try');

	//KATALOG
	Route::get('/dropship/katalogAnda/delete/{id}', 'backend\dropship\KatalogController@hapusKatalog')->name('hapusKatalog');
	Route::get('/dropship/katalogAnda', 'backend\dropship\KatalogController@katalogAnda')->name('katalogAnda');
	Route::get('/dropship/katalog', 'backend\dropship\KatalogController@katalogDropship')->name('katalogDropship');
	Route::get('/dropship/addKatalog/{id}', 'backend\dropship\KatalogController@addKatalog')->name('katalogDropshipAdd');

	//ORDER
	Route::get('/dropship/index', 'backend\dropship\OrderController@index')->name('dropship_index');
	Route::get('/dropship/tambah_order', 'backend\dropship\OrderController@tambah_list')->name('tambah_list');

	Route::get('dropship/detail-product/{id}', 'backend\admin\OrderController@getProduct')->name('getProduct');


//RESELLER
	//KETENTUAN RESELLER
	Route::get('/reseller/ketentuan', 'backend\dropship\DropshipController@ketentuanReseller')->name('ketentuanReseller');

	//LOG
	Route::get('/reseller/listPenjualan', 'backend\reseller\LogController@ListPenjualan')->name('reseller_ListPenjualan');
	Route::get('/reseller/reportPenjualan', 'backend\reseller\LogController@logPenjualan')->name('reseller_logPenjualan');
	Route::post('/reseller/insertPenjualan', 'backend\reseller\LogController@insert')->name('reseller_insertPenjualan');



});