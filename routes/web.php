<?php

use Illuminate\Support\Facades\Route;

//LINK AdminController FILE PATH
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
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

/* START - ROUTE FOR ADMIN */
Route::group(['prefix'=>'admin', 'middleware'=>['admin:admin']], function(){
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');



//Admin Logout Route
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

//Show Admin Profile Route
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');

//Show Admin Profile Edit Page
Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');

//Update Admin Profile
Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');

//Show Admin Change Password Page
Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');

//Admin Update Password
Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');




/* END - ROUTE FOR ADMIN */




/* USER ALL ROUTES */

/* define defaut guard for user */
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::Find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');

//Show Frontend Home Page 
Route::get('/', [IndexController::class, 'index']);

//User Logout 
Route::get('/user/logout', [IndexController::class, 'Logout'])->name('user.logout');

//Show User Profile Page 
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');

//User Profile Update Route 
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');

//show change password page 
Route::get('/change/password', [IndexController::class, 'UserChangePassword'])->name('change.password');

//user update password  
Route::post('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');
