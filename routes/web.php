<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\RoleController as AdminRoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckRole;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{slug}', [HomeController::class, 'index'])->name('category.posts');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post.show');

Route::get('/images/{shortUuid}/{id}/{fileName}', [MediaController::class, 'shortShow'])->name('media.short');
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

Route::get('no-role', fn () => view('admin.no-role'))->name('no.role');

Route::prefix('admin')
    ->as('admin.')
    ->middleware(['auth', CheckRole::class])
    ->group(function () {
        Route::view('/', 'admin.index')->name('index');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('posts', AdminPostController::class);
        Route::resource('users', AdminUserController::class);
        Route::resource('roles', AdminRoleController::class); 
        Route::resource('permissions', PermissionController::class);
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
