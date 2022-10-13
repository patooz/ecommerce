<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingCountyController;
use App\Http\Controllers\Backend\ShippingSubCountyController;
use App\Http\Controllers\Backend\ShippingWardController;
use App\Http\Controllers\Backend\ReportsController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\SiteSettingsController;
use App\Http\Controllers\Backend\ReturnOrderController;
use App\Http\Controllers\Backend\AdminUsersController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\TagsController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeBlogController;
use App\Http\Controllers\User\WishListController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\ReviewController;
use App\Models\User;



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


Route::group(['prefix'=> 'admin', 'middleware'=> ['admin:admin']], function(){
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
} );

Route::middleware(['auth:admin'])->group(function () {



Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard')->middleware('auth:admin');

##Admin all routes
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('edit/admin/profile', [AdminProfileController::class, 'EditAdminProfile'])->name('edit.admin.profile');
Route::post('store/admin/profile', [AdminProfileController::class, 'StoreAdminProfile'])->name('store.admin.profile');
Route::get('/change/admin/password', [AdminProfileController::class, 'ChangeAdminPassword'])
    ->name('change.admin.password');
Route::post('update/admin/password', [AdminProfileController::class, 'UpdateAdminPassword'])->name('update.admin.password');

});

//all user routes



Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id=Auth::user()->id;
    $user=User::find($id);
    return view('dashboard', compact('user'));
})->name('dashboard');

Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/update/user/profile', [IndexController::class, 'UpdateUserProfile'])->name('update.user.profile');
Route::get('/update/user/password', [IndexController::class, 'UpdateUserPassword'])->name('update.user.password');
Route::post('/change/user/password', [IndexController::class, 'ChangeUserPassword'])->name('change.user.password');

//Admin Brand Routes
Route::prefix('brand')->group(function(){
Route::get('/view', [BrandController::class, 'ViewBrand'])->name('all.brands');
Route::post('/store', [BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('/edit/{id}', [BrandController::class, 'EditBrand'])->name('edit.brand');
Route::post('/update', [BrandController::class, 'UpdateBrand'])->name('brand.update');
Route::get('/delete/{id}', [BrandController::class, 'DeleteBrand'])->name('delete.brand');


});

//Admin Categories Routes
Route::prefix('category')->group(function(){
    Route::get('/view', [CategoryController::class, 'ViewCategory'])->name('all.categories');
    Route::post('/store', [CategoryController::class, 'StoreCategory'])->name('store.category');
    Route::get('/edit/{id}', [CategoryController::class, 'EditCategory'])->name('edit.category');
    Route::post('/update', [CategoryController::class, 'UpdateCategory'])->name('update.category');
    Route::get('/delete/{id}', [CategoryController::class, 'DeleteCategory'])->name('delete.category');




    //Admin Subategories Routes
    Route::get('sub/view', [SubCategoryController::class, 'ViewSubcategories'])->name('all.subcategories');
    Route::post('sub/store', [SubCategoryController::class, 'StoreSubCategory'])->name('store.subcategory');
    Route::get('sub/edit/{id}', [SubCategoryController::class, 'EditSubCategory'])->name('edit.subcategory');
    Route::post('sub/update', [SubCategoryController::class, 'UpdateSubCategory'])->name('update.subcategory');
    Route::get('sub/delete/{id}', [SubCategoryController::class, 'DeleteSubCategory'])->name('delete.subcategory');


    //Admin Sub Subategories Routes
    Route::get('sub/sub/view', [SubSubCategoryController::class, 'ViewSubSubcategories'])->name('all.subsubcategories');
    Route::get('/subcategory/ajax/{category_id}', [SubSubCategoryController::class, 'GetSubCategory']);
    Route::get('/sub_subcategory/ajax/{subcategory_id}', [SubSubCategoryController::class, 'GetSubSubCategory']);
    Route::post('sub/sub/store', [SubSubCategoryController::class, 'StoreSubSubCategory'])->name('store.subsubcategory');
    Route::get('sub/sub/edit/{id}', [SubSubCategoryController::class, 'EditSubSubCategory'])->name('edit.subsubcategory');
    Route::post('sub/sub/update', [SubSubCategoryController::class, 'UpdateSubSubCategory'])->name('update.subsubcategory');
    Route::get('sub/sub/delete/{id}', [SubSubCategoryController::class, 'DeleteSubSubCategory'])->name('delete.subsubcategory');

});



//Admin Products Routes
Route::prefix('product')->group(function(){
    Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage.products');
    Route::get('/add', [ProductController::class, 'AddProduct'])->name('add.product');
    Route::post('/store', [ProductController::class, 'StoreProduct'])->name('store.product');
    Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('edit.product');
    Route::get('/view/{id}', [ProductController::class, 'ViewProduct'])->name('view.product');
    Route::post('/data/update', [ProductController::class, 'UpdateProductData'])->name('update.product.data');
    Route::post('/multi_image/update', [ProductController::class, 'UpdateProductMulti_image'])->name('update.product.multi_image');
    Route::post('/thumb_nail/update', [ProductController::class, 'UpdateProductThumb_nail'])->name('update.product.thumb_nail');
    Route::get('/delete/multi_img{id}', [ProductController::class, 'DeleteProductMulti_Img'])->name('delete.product.multi_img');
    Route::get('/inactive/{id}', [ProductController::class, 'InactiveProduct'])->name('inactive.product');
    Route::get('/active/{id}', [ProductController::class, 'ActiveProduct'])->name('active.product');
    Route::get('/delete/{id}', [ProductController::class, 'DeleteProduct'])->name('delete.product');




    });


    //Admin Slider Routes
Route::prefix('slider')->group(function(){
    Route::get('/view', [SliderController::class, 'ViewSlider'])->name('manage.slider');
    Route::post('/store', [SliderController::class, 'StoreSlider'])->name('store.slider');
    Route::get('/edit/{id}', [SliderController::class, 'EditSlider'])->name('edit.slider');
    Route::post('/update', [SliderController::class, 'UpdateSlider'])->name('slider.update');
    Route::get('/delete/{id}', [SliderController::class, 'DeleteSlider'])->name('delete.slider');
    Route::get('/inactive/{id}', [SliderController::class, 'InactiveSlider'])->name('inactive.slider');
    Route::get('/active/{id}', [SliderController::class, 'ActiveSlider'])->name('active.slider');


    });

    //Admin Multilanguage Routes
    Route::get('/kiswahili/language', [LanguageController::class, 'Kiswahili'])->name('swa.language');
    Route::get('/english/language', [LanguageController::class, 'English'])->name('en.language');

    //Frontend Product Details page
    Route::get('product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);

    //Frontend Product tags page
    Route::get('/product/tag/{tag}', [TagsController::class, 'TagWiseProducts']);

    //Frontend Subcategorywise Data
    Route::get('/product/subcat/{subcatId}/{slug}', [TagsController::class, 'SubCatWiseProducts']);

    //Frontend Subsubcategorywise Data
    Route::get('/product/subsubcat/{subsubcatId}/{slug}', [TagsController::class, 'SubSubCatWiseProducts']);

    //Product View Modal with Ajax
    Route::get('/product/view/modal/{id}', [IndexController::class, 'AjaxProductsView']);

    //Add to cart store data
    Route::post('/store/cart/data/{id}', [CartController::class, 'AddToCart']);

    //get mini cart data
    Route::get('/product/mini/cart', [CartController::class, 'MiniCart']);

    //remove items from minicart
    Route::get('/mini/cart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCartItems']);

    //Add to wishlist
    Route::post('add-to-wishlist/{productId}', [CartController::class, 'AddToWishList']);

//user must login
    Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'User'], function(){

        //wishlist page
    Route::get('/wishlist', [WishListController::class, 'ViewWishlist'])->name('wishlist');

    //get wishlist product
    Route::get('/get-wishlist-item', [WishListController::class, 'GetwishlistItem']);

    //remove wishlist item
    Route::get('/remove-wishlist-item/{id}', [WishListController::class, 'RemoveWishlistItem']);

    //Stripe order
    Route::post('/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');

    //Cash order
    Route::post('/ash/order', [CashController::class, 'CashOrder'])->name('cash.order');

    //Mpesa Online order
    Route::post('/mpesa/order', [TransactionController::class, 'stkPushRequest'])->name('mpesa.order');

    //my orders
    Route::get('/my/orders', [AllUserController::class, 'Myorders'])->name('my.orders');

    //order details
    Route::get('/order_details/{order_id}', [AllUserController::class, 'OrderDetails']);

    //download invoice
    Route::get('/download-invoice/{order_id}', [AllUserController::class, 'DownloadInvoice']);

    //return reason
    Route::post('/return/order/{order_id}', [AllUserController::class, 'returnOrder'])->name('return_order');

    //returned orders list
    Route::get('/returned/orders', [AllUserController::class, 'returnedOrdersList'])->name('returned_orders_list');

    //canceled orders list
    Route::get('/canceled/orders/list', [AllUserController::class, 'canceledOrdersList'])->name('canceled_orders_list');

    //track order
    Route::post('/track/order', [AllUserController::class, 'trackOrder'])->name('track_order');


    });

    //my cart page
    Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');

     //get my cart ajax products
     Route::get('/user/get-cart-item', [CartPageController::class, 'GetCartItem']);

     //remove cart item
    Route::get('/user/remove-cart-item/{rowId}', [CartPageController::class, 'RemoveCart']);

     //increase cart
     Route::get('/user/increase-cart/{rowId}', [CartPageController::class, 'increaseCart']);

     //derease cart
     Route::get('/user/decrease-cart/{rowId}', [CartPageController::class, 'decreaseCart']);


     //Admin coupon Routes
Route::prefix('coupon')->group(function(){
    Route::get('/view', [CouponController::class, 'ViewCoupon'])->name('manage.coupon');
    Route::post('/store', [CouponController::class, 'StoreCoupon'])->name('store.coupon');
    Route::get('/edit/{id}', [CouponController::class, 'EditCoupon'])->name('edit.coupon');
    Route::post('/update/{id}', [CouponController::class, 'UpdateCoupon'])->name('update.coupon');
    Route::get('/delete/{id}', [CouponController::class, 'DeleteCoupon'])->name('delete.coupon');


});


 //shipping area Routes
 Route::prefix('shipping')->group(function(){

    //shipping county Routes
    Route::get('/county/view', [ShippingCountyController::class, 'ViewCounty'])->name('manage.county');
    Route::post('/county/store', [ShippingCountyController::class, 'StoreCounty'])->name('store.county');
    Route::get('/edit/county/{id}', [ShippingCountyController::class, 'EditCounty'])->name('edit.county');
    Route::post('/update/county{id}', [ShippingCountyController::class, 'UpdateCounty'])->name('update.county');
    Route::get('/delete/county/{id}', [ShippingCountyController::class, 'DeleteCounty'])->name('delete.county');


    //shipping subcounty Routes
    Route::get('/subcounty/view', [ShippingSubCountyController::class, 'ViewSubCounty'])->name('manage.subcounty');
    Route::post('/subcounty/store', [ShippingSubCountyController::class, 'StoreSubCounty'])->name('store.subcounty');
    Route::get('/edit/subcounty/{id}', [ShippingSubCountyController::class, 'EditSubCounty'])->name('edit.subcounty');
    Route::post('/update/subcounty/{id}', [ShippingSubCountyController::class, 'UpdateSubCounty'])->name('update.subcounty');
    Route::get('/delete/subcounty/{id}', [ShippingSubCountyController::class, 'DeleteSubCounty'])->name('delete.subcounty');


    //shipping wart Routes
    Route::get('/ward/view', [ShippingWardController::class, 'ViewWard'])->name('manage.ward');
    Route::post('/ward/store', [ShippingWardController::class, 'StoreWard'])->name('store.ward');
    Route::get('/edit/ward/{id}', [ShippingWardController::class, 'EditWard'])->name('edit.ward');
    Route::post('/update/ward/{id}', [ShippingWardController::class, 'UpdateWard'])->name('update.ward');
    Route::get('/delete/ward/{id}', [ShippingWardController::class, 'DeleteWard'])->name('delete.ward');
    Route::get('/subcounty/ajax/{county_id}', [ShippingWardController::class, 'GetSubCounty']);


});

//fronten coupon option
Route::post('/apply-coupon', [CartController::class, 'ApplyCoupon']);

//fronten coupon option
Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);

//remove coupon
Route::get('/remove-coupon', [CartController::class, 'removeCoupon']);


//remove coupon
Route::get('/chekout', [CartController::class, 'Checkout'])->name('chekout');

//get subcounty ajax
Route::get('/get-subcounty/ajax/{county_id}', [CheckoutController::class, 'GetSubcounty'])->name('get-subcounty');

//get ward ajax
Route::get('/get-ward/ajax/{subcounty_id}', [CheckoutController::class, 'GetWard']);

//store checkout
Route::post('/store/checkout', [CheckoutController::class, 'StoreCheckout'])->name('store-checkout');

//Order order routes
Route::prefix('orders')->group(function(){
    Route::get('/pending/orders', [OrderController::class, 'PendingOrders'])->name('pending.orders');
    Route::get('/pending/order/details/{order_id}', [OrderController::class, 'PendingorderDetails'])->name('pending.order.details');
    Route::get('/confirmed/orders', [OrderController::class, 'ConfirmedOrders'])->name('confirmed.orders');
    Route::get('/processing/orders', [OrderController::class, 'ProcessingOrders'])->name('processing.orders');
    Route::get('/picked/orders', [OrderController::class, 'Pickedorders'])->name('picked.orders');
    Route::get('/shipped/orders', [OrderController::class, 'ShippedOrders'])->name('shipped.orders');
    Route::get('/delivered/orders', [OrderController::class, 'DeliveredOrders'])->name('delivered.orders');
    Route::get('/canceled/orders', [OrderController::class, 'CanceledOrders'])->name('canceled.orders');
    Route::get('/trashed/orders', [OrderController::class, 'trashedOrders'])->name('trashed.orders');

    //update order status
    Route::get('/confirm/pending/order/{order_id}', [OrderController::class, 'confirmPendindOrder'])->name('confirm_pending');

    Route::get('/process/confirmed/order/{order_id}', [OrderController::class, 'processConfirmedOrder'])->name('process_confirmed');

    Route::get('/picked/order/{order_id}', [OrderController::class, 'pickedOrder'])->name('picked_order');

    Route::get('/ship/order/{order_id}', [OrderController::class, 'shipOrder'])->name('ship_order');

    Route::get('/delivered/order/{order_id}', [OrderController::class, 'deliveredOrder'])->name('delivered_order');


    Route::get('/cancel/order/{order_id}', [OrderController::class, 'cancelOrder'])->name('cancel_Order');

    Route::get('/restore/canceled/order/{order_id}', [OrderController::class, 'restoreCanceledOrder'])->name('restore_canceled_order');


     Route::get('/restore/deleted/order/{order_id}', [OrderController::class, 'restoreDeleted'])->name('restore_deleted_order');


     Route::get('/delete/order/{order_id}', [OrderController::class, 'softDeleteOrder'])->name('soft_delete_order');


     Route::get('/download/invoice/{order_id}', [OrderController::class, 'adminDownloadInvoice'])->name('download_invoice');

});

//Admin Reports routes
Route::prefix('reports')->group(function(){

    Route::get('/view', [ReportsController::class, 'viewReports'])->name('view_reports');
    Route::post('search/by/date', [ReportsController::class, 'reportsByDate'])->name('search_by_date');
    Route::post('search/by/month', [ReportsController::class, 'reportsByMonth'])->name('search_by_month');
    Route::post('search/by/year', [ReportsController::class, 'reportsByYear'])->name('search_by_year');


});

//Admin Reports routes
Route::prefix('users')->group(function(){

    Route::get('/view', [AdminProfileController::class, 'viewUsers'])->name('view_users');
    

});

//blog routes
Route::prefix('blog')->group(function(){

    Route::get('/category', [BlogController::class, 'blogCategory'])->name('blog_category');
    Route::post('/category/store', [BlogController::class, 'storeBlogCategory'])->name('store_blog_category');
    Route::get('/category/edit/{blog_id}', [BlogController::class, 'editBlogCategory'])->name('edit_blog_category');
    Route::post('/category/update/{blog_id}', [BlogController::class, 'updateBlogCategory'])->name('update_blog_category');
    Route::get('/category/delete/{blog_id}', [BlogController::class, 'deleteBlogCategory'])->name('delete_blog_category');

    //admin view blog
    Route::get('/view/blog/post', [BlogController::class, 'viewBlogPost'])->name('view_blog_post');

    //admin add blog
    Route::get('/add/blog/post', [BlogController::class, 'addBlogPost'])->name('add_blog_post');

    //admin store blog
    Route::post('/store/blog/post', [BlogController::class, 'storeBlogPost'])->name('store_blog_post');

    //admin edit blog
    Route::get('/edit/blog/post/{post_id}', [BlogController::class, 'editBlogPost'])->name('edit_blog_post');

    //admin update blog
    Route::post('/update/blog/post/{post_id}', [BlogController::class, 'updateBlogPost'])->name('update_blog_post');

    //admin update blog
    Route::get('/delete/blog/post/{post_id}', [BlogController::class, 'deleteBlogPost'])->name('delete_blog_post');

});

//admin update blog
Route::get('/blog', [HomeBlogController::class, 'frontBlog'])->name('front_blog');

// blog post details
Route::get('/blog/details/{id}', [HomeBlogController::class, 'blogPostDetails'])->name('blog_post_details');

// blog post category
Route::get('/blog/post/category/{id}', [HomeBlogController::class, 'blogPostCategory'])->name('blog_post_category');

// site settings routes
Route::prefix('settings')->group(function(){

    Route::get('/site/settings', [SiteSettingsController::class, 'siteSettings'])->name('site_setting');
    Route::post('/update/site/settings/{setting_id}', [SiteSettingsController::class, 'updatSiteSettings'])->name('update_site_setting');

    Route::get('/seo/settings', [SiteSettingsController::class, 'seoSettings'])->name('seo_setting');
    Route::post('/update/seo/settings/{seo_id}', [SiteSettingsController::class, 'updateSeoSettings'])->name('update_seo_setting');

});


// admin return order routes
Route::prefix('return')->group(function(){

    Route::get('/all/requests', [ReturnOrderController::class, 'allRequests'])->name('all_requests');

    Route::get('/approved/returned/requests', [ReturnOrderController::class, 'approvedReturnedRequests'])->name('approved_returned_requests');

    Route::get('/approve/returned/requests/{request_id}', [ReturnOrderController::class, 'approveReturnedRequests'])->name('approve_returned_requests');


});

//frontend product review
Route::post('add/product/review/{product_id}', [ReviewController::class, 'addProductReview'])->name('add_product_review');

// admin review  routes
Route::prefix('review')->group(function(){

    Route::get('/pending/reviews', [ReviewController::class, 'pendingReviews'])->name('pending_reviews');

    Route::get('/approve/review/{review_id}', [ReviewController::class, 'approvedReview'])->name('approve_review');

    Route::get('/approved/reviews', [ReviewController::class, 'approvedReviews'])->name('approved_reviews');

    Route::get('/delete/review/{review_id}', [ReviewController::class, 'deletedReview'])->name('delete_review');


});

// admin review  routes
Route::prefix('stock')->group(function(){

    Route::get('/product', [ProductController::class, 'productStock'])->name('product_stock');

});

// admin users role
Route::prefix('adminroles')->group(function(){

    Route::get('admin/users', [AdminUsersController::class, 'adminUsers'])->name('admin_users');
    Route::get('add/admin/user', [AdminUsersController::class, 'addAdminUser'])->name('add_admin_user');
    Route::post('store/admin/user', [AdminUsersController::class, 'storeAdminUser'])->name('store_admin_user');
    Route::get('edit/admin/user/{user_id}', [AdminUsersController::class, 'editAdminUser'])->name('edit_admin_user');
    Route::post('update/admin/user/{user_id}', [AdminUsersController::class, 'updateAdminUser'])->name('update_admin_user');
    Route::get('delete/admin/user/{user_id}', [AdminUsersController::class, 'deleteAdminUser'])->name('delete_admin_user');
});

//front end product search
Route::post('product/search', [IndexController::class, 'productSearch'])->name('product_search');

//front end advanced product search
Route::post('advanced/product/search', [IndexController::class, 'advancedProductSearch'])->name('advanced_product_search');


















