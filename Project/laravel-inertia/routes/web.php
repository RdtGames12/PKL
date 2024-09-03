<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Cms\BooksController;
use App\Http\Controllers\Cms\CategoriesController;
use App\Http\Controllers\Cms\ProfilesController;
use App\Http\Controllers\Cms\DashboardController;
use App\Http\Controllers\Cms\PermissionsController;
use App\Http\Controllers\Cms\RolesController;
use App\Http\Controllers\Cms\UsersController;
use App\Http\Libraries\ManaCms;
use Illuminate\Support\Facades\Route;

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

// Auth

Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login')
    ->middleware('guest');

Route::post('login', [AuthenticatedSessionController::class, 'store'])
    ->name('login.store')
    ->middleware('guest');

Route::delete('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');



Route::group(['middleware' => 'auth'], function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    //Permissions
    Route::get('permissions', [PermissionsController::class, 'index'])->name('permissions.index');
    Route::get('permissions/{permission}/edit', [PermissionsController::class, 'edit'])->name('permissions.edit');
    Route::put('permissions/{permission}', [PermissionsController::class, 'update'])->name('permissions.update');

    //Profile
    Route::get('profiles', [ProfilesController::class, 'index'])->name('profiles');
    Route::put('profiles', [ProfilesController::class, 'update'])->name('profiles.update');

    //Roles
    Route::get('roles', [RolesController::class, 'index'])->name('roles');
    Route::get('roles/create', [RolesController::class, 'create'])->name('roles.create');
    Route::post('roles', [RolesController::class, 'store'])->name('roles.store');
    Route::get('roles/{role}/edit', [RolesController::class, 'edit'])->name('roles.edit');
    Route::put('roles/{role}', [RolesController::class, 'update'])->name('roles.update');
    Route::delete('roles/{role}', [RolesController::class, 'destroy'])->name('roles.destroy');

    // Users
    Route::get('users', [UsersController::class, 'index'])->name('users');
    Route::get('users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('users', [UsersController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
    Route::put('users/{user}/restore', [UsersController::class, 'restore'])->name('users.restore');

    // Books
    Route::get('/books', [BooksController::class, 'index'])->name('books.index');
    // Route::resource('books',\App\Http\Controllers\cms\booksController::class);
    Route::get('books/create', [BooksController::class, 'create'])->name('books.create');
    Route::post('books', [BooksController::class, 'store'])->name('books.store');
    Route::get('/books/{id}/edit', [BooksController::class, 'edit'])->name('books.edit');
    Route::put('/books/{id}', [BooksController::class, 'update'])->name('books.update');
    Route::delete('books/{book}', [BooksController::class, 'destroy'])->name('books.destroy');

    // Categories
    Route::get('categories', [CategoriesController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('categories/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

    //Menu
    Route::get('menu', function () {
        return response()->json(ManaCms::listMenu());
    });

    Route::get('menu_version', function () {
        return response()->json(['version' => 1]);
    });
});
