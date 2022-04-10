<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\LanguageController;
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



Route::middleware(['auth:sanctum,web', 'verified'])->get('/web/dashboard', function () {
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









