<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
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
    return view('reception');
});

Route::middleware(['auth'])->group(function(){
    Route::get('posts/index',[PostController::class,'index'])->name('index');
    Route::post('/posts',[PostController::class,'store'])->name('store');
    Route::get('/posts/{post}',[PostController::class,'show'])->name('show');
    Route::get('/create',[PostController::class,'create'])->name('create');
    Route::get('/like/{post}',[LikeController::class,'like'])->name('like');
    Route::get('/unlike/{post}',[LikeController::class,'unlike'])->name('unlike');
    Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('edit');
    Route::put('/posts/{post}',[PostController::class,'update'])->name('update');
    Route::delete('/posts/{post}',[PostController::class,'delete'])->name('delete');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/like/{post}',[LikeController::class,'like'])->name('like');
    Route::get('/unlike/{post}',[LikeController::class,'unlike'])->name('unlike');
    Route::get('/like_in_show/{post}',[LikeController::class,'like_in_show'])->name('like_in_show');
    Route::get('/unlike_in_show/{post}',[LikeController::class,'unlike_in_show'])->name('unlike_in_show');


});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
