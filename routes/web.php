<?php

// Socialite Route
use App\Http\Controllers\FrontController;

Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');


Route::get('/', [FrontController::class, 'index']);
//auth & user
Auth::routes();


// Newslater

Route::get('admin/newslater', 'Admin\Category\CouponController@Newslater')->name('admin.newsletter');
Route::get('delete/sub/{id}', 'Admin\Category\CouponController@DeleteSub');


// Frontend All Routes
Route::post('store/newslater', 'FrontController@StoreNewsletter')->name('store.newslater');

// ADD Wishlist

Route::get('add/wishlist/{id}', 'WishlistController@addWishlist');

// Add to Cart Route
Route::get('add/to/cart/{id}', 'CartController@AddCart');
Route::get('check', 'CartController@check');

Route::get('product/cart', 'CartController@ShowCart')->name('show.cart');
Route::get('remove/cart/{rowId}', 'CartController@removeCart');
Route::post('update/cart/item/', 'CartController@UpdateCart')->name('update.cartitem');

Route::get('/cart/product/view/{id}', 'CartController@ViewProduct');
Route::post('insert/into/cart/', 'CartController@insertCart')->name('insert.into.cart');

Route::get('user/checkout/', 'CartController@Checkout')->name('user.checkout');
Route::get('user/wishlist/', 'CartController@wishlist')->name('user.wishlist');

Route::post('user/apply/coupon/', 'CartController@Coupon')->name('apply.coupon');
Route::get('coupon/remove/', 'CartController@CouponRemove')->name('coupon.remove');


Route::get('/product/details/{id}/{product_name}', 'ProductController@ProductView');

Route::post('/cart/product/add/{id}', 'ProductController@AddCart');

/// Blog Post Route

Route::get('blog/post/', 'BlogController@blog')->name('blog.post');

Route::get('language/english', 'BlogController@English')->name('language.english');
Route::get('language/hindi', 'BlogController@Hindi')->name('language.hindi');

Route::get('blog/single/{id}', 'BlogController@BlogSingle');

// Pyment Step
Route::get('payment/page', 'CartController@PaymentPage')->name('payment.step');
Route::post('user/payment/process/', 'PaymentController@Payment')->name('payment.process');

Route::post('user/stripe/charge/', 'PaymentController@StripeCharge')->name('stripe.charge');
Route::post('user/oncash/charge/', 'PaymentController@OnCash')->name('oncash.charge');

// Product details Page
Route::get('products/{id}', 'ProductController@ProductsView');
Route::get('allcategory/{id}', 'ProductController@CategoryView');

// Admin Order Route

Route::get('admin/pading/order', 'Admin\OrderController@NewOrder')->name('admin.neworder');
Route::get('admin/view/order/{id}', 'Admin\OrderController@ViewOrder');

Route::get('admin/payment/accept/{id}', 'Admin\OrderController@PaymentAccept');
Route::get('admin/payment/cancel/{id}', 'Admin\OrderController@PaymentCancel');

Route::get('admin/accept/payment', 'Admin\OrderController@AcceptPayment')->name('admin.accept.payment');

Route::get('admin/cancel/order', 'Admin\OrderController@CancelOrder')->name('admin.cancel.order');

Route::get('admin/process/payment', 'Admin\OrderController@ProcessPayment')->name('admin.process.payment');
Route::get('admin/success/payment', 'Admin\OrderController@SuccessPayment')->name('admin.success.payment');

Route::get('admin/delevery/process/{id}', 'Admin\OrderController@DeleveryProcess');
Route::get('admin/delevery/done/{id}', 'Admin\OrderController@DeleveryDone');

/// SEO Setting Route
Route::get('admin/seo', 'Admin\OrderController@seo')->name('admin.seo');
Route::post('admin/seo/update', 'Admin\OrderController@UpdateSeo')->name('update.seo');

// Order Tracking Route
Route::post('order/traking', 'FrontController@OrderTracking')->name('order.tracking');

// Order Report Routes

Route::get('admin/today/order', 'Admin\ReportController@TodayOrder')->name('today.order');
Route::get('admin/today/delivery', 'Admin\ReportController@TodayDelivery')->name('today.delivery');

Route::get('admin/this/month', 'Admin\ReportController@ThisMonth')->name('this.month');
Route::get('admin/search/report', 'Admin\ReportController@Search')->name('search.report');

Route::post('admin/search/by/year', 'Admin\ReportController@SearchByYear')->name('search.by.year');
Route::post('admin/search/by/month', 'Admin\ReportController@SearchByMonth')->name('search.by.month');

Route::post('admin/search/by/date', 'Admin\ReportController@SearchByDate')->name('search.by.date');

// Admin Role Routes

Route::get('admin/all/user', 'Admin\UserRoleController@UserRole')->name('admin.all.user');

Route::get('admin/create/admin', 'Admin\UserRoleController@UserCreate')->name('create.admin');

Route::post('admin/store/admin', 'Admin\UserRoleController@UserStore')->name('store.admin');

Route::get('delete/admin/{id}', 'Admin\UserRoleController@UserDelete');
Route::get('edit/admin/{id}', 'Admin\UserRoleController@UserEdit');

Route::post('admin/update/admin', 'Admin\UserRoleController@UserUpdate')->name('update.admin');

// Admin Site Setting Route
Route::get('admin/site/setting', 'Admin\SettingController@SiteSetting')->name('admin.site.setting');

Route::post('admin/sitesetting', 'Admin\SettingController@UpdateSiteSetting')->name('update.sitesetting');

// Return Order Route

Route::get('success/list/', 'PaymentController@SuccessList')->name('success.orderlist');

Route::get('request/return/{id}', 'PaymentController@RequestReturn');

Route::get('admin/return/request/', 'Admin\ReturnController@ReturnRequest')->name('admin.return.request');

Route::get('admin/approve/return/{id}', 'Admin\ReturnController@ApproveReturn');
Route::get('admin/all/return/', 'Admin\ReturnController@AllReturn')->name('admin.all.return');

// Order Stock Route
Route::get('admin/product/stock', 'Admin\UserRoleController@ProductStock')->name('admin.product.stock');

/// Contact page Routes

Route::get('contact/page', 'ContactController@Contact')->name('contact.page');
Route::post('contact/form', 'ContactController@ContactForm')->name('contact.form');

Route::get('admin/all/message', 'ContactController@AllMessage')->name('all.message');

// Search Route
Route::post('product/search', 'CartController@Search')->name('product.search');
