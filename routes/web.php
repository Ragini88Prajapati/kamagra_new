<?php

use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

// Route::get('/', function () {
//     return view('home');
// });



Route::get('/clean', function() 
{
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('route:clear');
   Artisan::call('route:cache');
   Artisan::call('view:clear'); 
   Artisan::call('cache:clear');
   Artisan::call('optimize');
   
   return REDIRECT() -> BACK();
});

Route::get('/', 'Client\HomeController@index')->name('home.index');
Route::get('/test_email', 'Client\HomeController@test_email')->name('home.test_email');
Route::post('/save_contactus', 'Client\HomeController@save_contactus')->name('home.save_contactus');
Route::post('/save_newsletter', 'Client\HomeController@save_newsletter')->name('home.save_newsletter');
Route::get('/forget-password', 'Client\UserController@forgetPassPage')->name('home.forgetPassPage');
Route::post('/reset-mail', 'Client\UserController@forgot')->name('home.forgot');
Route::get('/reset-password-form', 'Client\UserController@resetPassword')->name('home.resetPassword');
Route::post('/reset-password', 'Client\UserController@reset')->name('home.reset');

Route::get('/product', 'Client\ProductController@index')->name('product.product-list');
Route::get('/product/product-filter', 'Client\ProductController@product_list_filter')->name('product.product-list-filter');
Route::post('/product/add-to-cart', 'Client\ProductController@add_to_cart')->name('product.add-to-cart');
Route::post('/product/update-cart', 'Client\CartController@update_cart')->name('product.update-cart');
Route::get('/product/cart', 'Client\CartController@show_cart')->name('product.show-cart');
Route::get('/product/{product_slug}', 'Client\ProductController@product_preview')->name('client.product.product-preview');
Route::post('/delete-from-cart', 'Client\ProductController@delete_from_cart')->name('product.delete-from-cart');

//ragini
Route::get('/category/{category_id}/products', 'Client\ProductController@productsByCategory')->name('client2.category-product');
// Route::get('/category/{category_id}/products', 'Client\ProductController@getProductsByCategory')->name('client2.get-products-by-category');



Route::get('/login', 'Auth\LoginController@show_login_form')->name('login');
// Route::post('/login', 'Auth\LoginController@show_login_form')->name('client.login');

Route::post('/authenticate', 'Auth\LoginController@login_client')->name('client.authenticate');
Route::post('/ajax-authenticate', 'Auth\LoginController@ajax_login_client')->name('client.ajax-authenticate');
Route::get('/sign-up', 'Client\HomeController@signup')->name('home.signup');
Route::post('/register', 'Auth\RegisterController@register_client_user')->name('auth.register.register_client_user');




Route::get('/admin', 'Auth\LoginController@admin_show_login_form')->name('admin.login');
Route::post('/admin/login', 'Auth\LoginController@admin_login_user')->name('admin.authenticate_login');






Route::get('/admin/dashboard', 'Admin\AdminController@index')->name('admin.dashboard');

Route::group(['middleware' => 'auth:admin'], function () {

    Route::get('/admin/product/list', 'Admin\Product\ProductController@lists')->name('admin.product.list');
    Route::get('/admin/product/add', 'Admin\Product\ProductController@add')->name('admin.product.add');
    Route::post('/admin/product/insert', 'Admin\Product\ProductController@insert')->name('admin.product.insert');
    Route::get('/admin/product/edit', 'Admin\Product\ProductController@edit')->name('admin.product.edit');
    Route::post('/admin/product/update', 'Admin\Product\ProductController@update')->name('admin.product.update');
    Route::post('/admin/product/delete', 'Admin\Product\ProductController@delete')->name('admin.product.delete');

    Route::get('/admin/product-variant/list', 'Admin\Product\ProductController@variant_lists')->name('admin.product-variant.list');
    Route::get('/admin/product-variant/add', 'Admin\Product\ProductController@variant_add')->name('admin.product-variant.add');
    Route::post('/admin/product-variant/insert', 'Admin\Product\ProductController@variant_insert')->name('admin.product-variant.insert');
    Route::get('/admin/product-variant/edit', 'Admin\Product\ProductController@variant_edit')->name('admin.product-variant.edit');
    Route::post('/admin/product-variant/update', 'Admin\Product\ProductController@variant_update')->name('admin.product-variant.update');
    Route::post('/admin/product-variant/delete', 'Admin\Product\ProductController@variant_delete')->name('admin.product-variant.delete');

    // ragini
    Route::get('/admin/category/list', 'Admin\CategoryController@lists')->name('admin.category.list');
    Route::get('/admin/category/add', 'Admin\CategoryController@add')->name('admin.category.add');
    Route::post('/admin/category/insert', 'Admin\CategoryController@insert')->name('admin.category.insert');
    Route::get('/admin/category/edit/{id}', 'Admin\CategoryController@edit')->name('admin.category.edit');
    Route::post('/admin/category/update/{id}', 'Admin\CategoryController@update')->name('admin.category.update');
    Route::post('/admin/category/delete', 'Admin\CategoryController@delete')->name('admin.category.delete');
    
    Route::get('/admin/collection/list', 'Admin\GenderController@lists')->name('admin.gender.list');
    Route::get('/admin/collection/add', 'Admin\GenderController@add')->name('admin.gender.add');
    Route::post('/admin/collection/insert', 'Admin\GenderController@insert')->name('admin.gender.insert');
    Route::get('/admin/collection/edit', 'Admin\GenderController@edit')->name('admin.gender.edit');
    Route::post('/admin/collection/update', 'Admin\GenderController@update')->name('admin.gender.update');
    Route::post('/admin/collection/delete', 'Admin\GenderController@delete')->name('admin.gender.delete');

    Route::get('/admin/brand/list', 'Admin\BrandController@lists')->name('admin.brand.list');
    Route::get('/admin/brand/add', 'Admin\BrandController@add')->name('admin.brand.add');
    Route::post('/admin/brand/insert', 'Admin\BrandController@insert')->name('admin.brand.insert');
    Route::get('/admin/brand/edit', 'Admin\BrandController@edit')->name('admin.brand.edit');
    Route::post('/admin/brand/update', 'Admin\BrandController@update')->name('admin.brand.update');
    Route::post('/admin/brand/delete', 'Admin\BrandController@delete')->name('admin.brand.delete');

    Route::get('/admin/youtubelink/list', 'Admin\YoutubeLinkController@lists')->name('admin.youtube_link.list');
    Route::get('/admin/youtubelink/add', 'Admin\YoutubeLinkController@add')->name('admin.youtube_link.add');
    Route::post('/admin/youtubelink/insert', 'Admin\YoutubeLinkController@insert')->name('admin.youtube_link.insert');
    Route::get('/admin/youtubelink/edit', 'Admin\YoutubeLinkController@edit')->name('admin.youtube_link.edit');
    Route::post('/admin/youtubelink/update', 'Admin\YoutubeLinkController@update')->name('admin.youtube_link.update');
    Route::post('/admin/youtubelink/delete', 'Admin\YoutubeLinkController@delete')->name('admin.youtube_link.delete');

    Route::get('/admin/order/list', 'Admin\OrderController@lists')->name('admin.order.list');
    Route::get('/admin/order/add', 'Admin\OrderController@add')->name('admin.order.add');
    Route::post('/admin/order/insert', 'Admin\OrderController@insert')->name('admin.order.insert');
    Route::get('/admin/order/edit', 'Admin\OrderController@edit')->name('admin.order.edit');
    Route::post('/admin/order/update', 'Admin\OrderController@update')->name('admin.order.update');
    Route::post('/admin/order/delete', 'Admin\OrderController@delete')->name('admin.order.delete');
    Route::get('/admin/order/preview', 'Admin\OrderController@preview')->name('admin.order.preview');
    Route::post('/admin/order/save-order-status', 'Admin\OrderController@save_order_status')->name('admin.order.save_order_status');
    Route::get('/admin/order/order-invoice', 'Admin\OrderController@order_invoice')->name('admin.order.order-invoice');

    Route::get('/admin/product_type/list', 'Admin\Product\ProductTypeController@lists')->name('admin.product_type.list');
    Route::get('/admin/product_type/add', 'Admin\Product\ProductTypeController@add')->name('admin.product_type.add');
    Route::post('/admin/product_type/insert', 'Admin\Product\ProductTypeController@insert')->name('admin.product_type.insert');
    Route::get('/admin/product_type/edit', 'Admin\Product\ProductTypeController@edit')->name('admin.product_type.edit');
    Route::post('/admin/product_type/update', 'Admin\Product\ProductTypeController@update')->name('admin.product_type.update');
    Route::post('/admin/product_type/delete', 'Admin\Product\ProductTypeController@delete')->name('admin.product_type.delete');
    

    Route::get('/admin/banner/list', 'Admin\AdminBannerController@bannerList')->name('admin.banner.list');
    Route::get('/admin/banner/add', 'Admin\AdminBannerController@bannerAdd')->name('admin.banner.add');
    Route::get('/admin/banner/edit', 'Admin\AdminBannerController@bannerEdit')->name('admin.banner.edit');
    Route::post('/admin/banner/insert', 'Admin\AdminBannerController@store')->name('admin.banner.insert');
    Route::post('/admin/banner/update', 'Admin\AdminBannerController@update')->name('admin.banner.update');
    Route::post('/admin/banner/delete', 'Admin\AdminBannerController@delete')->name('admin.banner.delete');

    Route::get('/admin/user-list', 'Admin\UserController@index')->name('admin.user');
    Route::post('/admin/user/delete', 'Admin\UserController@delete')->name('admin.user.delete');
    Route::post('/admin/user/reset-login', 'Admin\UserController@loginReset')->name('admin.user.reset.login');

    Route::get('/admin/contact-us', 'Admin\UserController@adminContactUs')->name('admin.contactus');
    Route::get('/admin/newsletter', 'Admin\UserController@adminNewsletter')->name('admin.newsletter');

    Route::get('/admin/blog/list', 'Admin\BlogController@lists')->name('admin.blog.list');
    Route::get('/admin/blog/add', 'Admin\BlogController@add')->name('admin.blog.add');
    Route::post('/admin/blog/insert', 'Admin\BlogController@insert')->name('admin.blog.insert');
    Route::get('/admin/blog/edit', 'Admin\BlogController@edit')->name('admin.blog.edit');
    Route::post('/admin/blog/update', 'Admin\BlogController@update')->name('admin.blog.update');
    Route::post('/admin/blog/delete', 'Admin\BlogController@delete')->name('admin.blog.delete');

    Route::get('/admin/blog/reviews', 'Admin\BlogController@reviewList')->name('admin.blog.reviewList');
    Route::post('/admin/blog/reviews/delete', 'Admin\BlogController@reviewDelete')->name('admin.blog.reviewDelete');

    Route::get('/admin/testimonial/list', 'Admin\TestimonialController@lists')->name('admin.testimonial.list');
    Route::get('/admin/testimonial/add', 'Admin\TestimonialController@add')->name('admin.testimonial.add');
    Route::post('/admin/testimonial/insert', 'Admin\TestimonialController@insert')->name('admin.testimonial.insert');
    Route::get('/admin/testimonial/edit', 'Admin\TestimonialController@edit')->name('admin.testimonial.edit');
    Route::post('/admin/testimonial/update', 'Admin\TestimonialController@update')->name('admin.testimonial.update');
    Route::post('/admin/testimonial/delete', 'Admin\TestimonialController@delete')->name('admin.testimonial.delete');

    Route::get('/admin/static/view', 'Admin\StaticController@staticView')->name('admin.static.view');
    Route::post('/admin/static/update', 'Admin\StaticController@update')->name('admin.static.update');
    
    Route::get('/admin/static/about-us', 'Admin\StaticController@aboutUs')->name('admin.static.about-us');
    Route::post('/admin/static/update-about-us', 'Admin\StaticController@updateaboutUs')->name('admin.static.update-about-us');
    
    Route::get('/admin/static/home-seo', 'Admin\StaticController@homeSEO')->name('admin.static.home-seo');
    Route::post('/admin/static/update-home-seo', 'Admin\StaticController@updatehomeSEO')->name('admin.static.update-home-seo');

    Route::get('/admin/static/free-shipping', 'Admin\StaticController@service1')->name('admin.static.free-shipping');
    Route::post('/admin/static/update-free-shipping', 'Admin\StaticController@updateservice1')->name('admin.static.update-free-shipping');

    Route::get('/admin/static/satisfaction', 'Admin\StaticController@satisfaction')->name('admin.static.satisfaction');
    Route::post('/admin/static/update-satisfaction', 'Admin\StaticController@updatesatisfaction')->name('admin.static.update-satisfaction');

    Route::get('/admin/static/shipping', 'Admin\StaticController@shipping')->name('admin.static.shipping');
    Route::post('/admin/static/update-shipping', 'Admin\StaticController@updateshipping')->name('admin.static.update-shipping');

    Route::get('/admin/static/glossary', 'Admin\StaticController@glossary')->name('admin.static.glossary');
    Route::post('/admin/static/update-glossary', 'Admin\StaticController@updateglossary')->name('admin.static.update-glossary');

    Route::get('/admin/static/sexual-enhancer', 'Admin\StaticController@sexual')->name('admin.static.sexual');
    Route::post('/admin/static/update-sexual-enhancer', 'Admin\StaticController@updatesexual')->name('admin.static.update-sexual');

    Route::get('admin/logout', function () {
        auth()->guard('admin')->logout();

        // redirect to homepage
        return redirect('/admin');
    })->name('admin.logout');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/select-address', 'Client\PaymentGatewayController@select_address')->name('user.select-address');
    Route::get('/order-history', 'Client\UserController@order_history')->name('client.user.order_history');
    Route::get('/address-list', 'Client\UserController@addressList')->name('client.user.address.list');
    Route::get('/address-delete', 'Client\UserController@deleteAddress')->name('client.user.address.delete');
    Route::get('/add-address', 'Client\UserController@add_address')->name('client.user.add_address');
    Route::post('/add-address', 'Client\UserController@add_address_post')->name('client.user.add_address_post');
    Route::post('/save-address-and-checkout', 'Client\PaymentGatewayController@save_address_and_deliver')->name('client.user.save_address_and_deliver');
    Route::post('/checkout', 'Client\PaymentGatewayController@checkout')->name('checkout');
    Route::post('/process-payment', 'Client\PaymentGatewayController@process_payment')->name('process-payment');

    // Wishlist
    Route::get('/wishlist', 'Client\UserController@viewWishlist')->name('home.viewWishlist');
    Route::post('/add-to-wishlist', 'Client\UserController@addToWishlist')->name('home.addToWishlist');
    Route::post('/remove-from-wishlist', 'Client\UserController@removeFromWishlist')->name('home.removeFromWishlist');
    
    Route::get('/user-profile', 'Client\HomeController@user_profile')->name('home.user-profile');
    // Route::post('/user-profile', 'Client\UserController@profileEdit')->name('home.user-profile');
    Route::post('/user-profile-update', 'Client\UserController@profileUpdate')->name('home.user-profile-update');


    Route::get('/logout', function () {
        auth()->logout();
        // redirect to homepage
        return redirect('');
    })->name('logout');
});

Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::post('process-transaction', 'Client\PaymentGatewayController@processTransaction')->name('processTransaction');
Route::get('success-transaction', 'Client\PaymentGatewayController@successTransaction')->name('successTransaction');
Route::get('cancel-transaction', 'Client\PaymentGatewayController@cancelTransaction')->name('cancelTransaction');

Route::post('/getState', 'Client\UserController@getState')->name('user.getState');

// Route::get('/admin', 'Auth\LoginController@admin_show_login_form')->name('admin.login');



Route::get('/checkout_form', 'Client\PaymentGatewayController@checkout_form')->name('home.checkout_form');
Route::get('/address_form', 'Client\HomeController@address_form')->name('home.address_form');
Route::get('/privacy-policy', 'Client\HomeController@privacy_policy')->name('home.privacy-policy');
Route::get('/terms-and-refund-policy', 'Client\HomeController@terms_and_refund_policy')->name('home.terms-and-refund-policy');

Route::get('/contact-us', 'Client\HomeController@contact_us')->name('home.contact_us');

Route::get('/kamagra-glossary', 'Client\HomeController@kamagra_glossary')->name('home.kamagra-glossary');
Route::get('sexual-enhance', 'Client\HomeController@sexual_enhance')->name('home.sexual-enhance');
Route::get('/partner', 'Client\HomeController@partner_page')->name('home.partner');
Route::get('/partner-register', 'Client\HomeController@partner_register')->name('home.partner-register');

Route::get('/about_us', 'Client\HomeController@about_us')->name('home.about_us');

Route::get('/edit_details', 'Client\HomeController@edit_details')->name('home.edit_details');
Route::get('/change_password', 'Client\HomeController@change_password')->name('home.change_password');


Route::get('/order-summary', 'Client\HomeController@order_summary')->name('home.order-summary');
Route::get('/order-confirmation', 'Client\HomeController@order_confirmation')->name('home.order-confirmation');

// Route::get('/product-list', 'Client\HomeController@product_list')->name('home.product-list');

Route::get('/free-shipping', 'Client\HomeController@free_shipping')->name('home.free-shipping');
Route::get('/satisfaction', 'Client\HomeController@satisfaction')->name('home.satisfaction');
Route::get('/delivery-information', 'Client\HomeController@delivery_information')->name('home.delivery-information');

Route::get('/thank-you', 'Client\HomeController@thank_you')->name('home.thank-you');

Route::get('/blog', 'Client\HomeController@blog')->name('home.blog');
Route::get('/blog/{url}', 'Client\HomeController@blog_detail')->name('home.blog-detail');
Route::post('/blog-review-save', 'Client\HomeController@saveBlogReview')->name('home.blog-review-save');

Route::get('/sitemap.xml', 'Client\HomeController@sitemapXml');