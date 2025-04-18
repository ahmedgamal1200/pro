<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Livewire\Chat;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route لـ Profile Edit
Route::get('/profile/edit', function () {
    return view('profile.edit');
})->name('profile.edit');


// Chat
Route::get('chat/{id}', Chat::class)->name('chat');

Route::get('showJobs', [JobController::class, 'index'])->name('showJobs');
Route::post('createJob', [JobController::class, 'store'])->name('createJob');
Route::get('createJob', [JobController::class, 'create'])->name('createJob');

// Posts
Route::post('/users/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/users/{user_id}', [PostController::class, 'index'])->name('posts.index');

Route::get('/users', [PostController::class, 'index'])->name('posts.index');
Route::get('/users/edit-profile/delete-post/{id}', [PostController::class, 'deletePost']);
Route::get('users/edit-post/{id}', [PostController::class, 'editPost' ])->name('users.editPost');
Route::put('users/update-post/{id}', [PostController::class, 'updatePost' ])->name('users.updatePost');


// Comments
Route::post('/comments/{post}', [CommentController::class, 'store'])->name('comments.store');
Route::get('users/delete-comment/{id}', [CommentController::class, 'deleteComment' ])->name('users.edit');

// Users
Route::get('users/add', [UserController::class, 'add'])->name('users.add');
Route::get('users/edit-profile/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::put('users/update-profile/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('users/delete-image/{id}', [UserController::class, 'deleteImage'])->name('users.deleteImage');
Route::put('users/update-image/{id}', [UserController::class, 'updateImage'])->name('users.updateImage');
Route::put('users/update-image/{id}', [UserController::class, 'updateImage'])->name('users.updateImage');

// Profile
Route::get('profile', [UserController::class, 'profile'])->name('users.profile');

// Application
Route::get('showApplications', [UserController::class, 'showApplications'])->name('showApplications');
Route::get('/applicants/{id}', [UserController::class, 'show'])->name('applicants.show');


require __DIR__.'/auth.php';
