<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// for admin
Route::get('/adminLogout', [AdminController::class, 'destroy'])->name('admin.logout');
// for register
// Route::get('/register',[])

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// user controller group
Route::controller(UsersController::class)->group(function(){
    // for users
    Route::get('/users','index')->name('users.index');
    // for add users form
    Route::get('/addUserForm','addUserForm')->name('users.addUserForm');
    // for add users
    Route::post('/addUser','addUser')->name('users.addUser');
    // for users delete
    Route::get('deleteUser/{id}','deleteUser')->name('user.deleteUser');
    // for users edit
    Route::get('editUser/{id}','editUser')->name('user.editUser');
    // for users Update
    Route::post('updateUser/{id}','updateUser')->name('user.updateUser');
});

Route::controller(ProductController::class)->group(function(){
    // for manage product
    Route::get('/products','index')->name('products.index');
    // for add product input form
    Route::get('/addProductForm','addProductForm')->name('products.addProductForm');
    // for store product
    Route::post('/addProduct','addProduct')->name('products.addProduct');
    // for delete product
    Route::get('/deleteProduct/{id}','deleteProduct')->name('products.deleteProduct');
    // for edit product
    Route::get('/editProduct/{id}','editProduct')->name('products.editProduct');
    // for update product
    Route::post('/updateProduct/{id}','updateProduct')->name('products.updateProduct');


});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
