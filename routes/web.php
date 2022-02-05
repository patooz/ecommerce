<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\BrandController;
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

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');

##Admin all routes
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('edit/admin/profile', [AdminProfileController::class, 'EditAdminProfile'])->name('edit.admin.profile');
Route::post('store/admin/profile', [AdminProfileController::class, 'StoreAdminProfile'])->name('store.admin.profile');
Route::get('/change/admin/password', [AdminProfileController::class, 'ChangeAdminPassword'])
    ->name('change.admin.password');
Route::post('update/admin/password', [AdminProfileController::class, 'UpdateAdminPassword'])->name('update.admin.password');

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
