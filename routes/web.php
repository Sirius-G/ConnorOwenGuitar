<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/tuition', function () {
//     return view('tuition');
// });
// Route::get('/contact', function () {
//     return view('contact');
// });


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
Route::get('/bio', [App\Http\Controllers\HomeController::class, 'bio'])->name('bio');
Route::get('/tuition', [App\Http\Controllers\HomeController::class, 'tuition'])->name('tuition');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
Route::post('/admin/update_contents/{id}', [App\Http\Controllers\HomeController::class, 'update_contents'])->name('update.contents');

Route::get('/admin/add_video', [App\Http\Controllers\HomeController::class, 'show_upload_video'])->name('add.video');
Route::get('/admin/added_videos', [App\Http\Controllers\HomeController::class, 'added_videos'])->name('my.videos');
Route::post('/admin/add_video', [App\Http\Controllers\HomeController::class, 'store_video'])->name('store.video');
Route::get('/admin/edit_video', [App\Http\Controllers\HomeController::class, 'edit_video'])->name('edit.video');
Route::post('/admin/update_video', [App\Http\Controllers\HomeController::class, 'update_video'])->name('update.video');
Route::get('/admin/softdelete_video/{id}', [App\Http\Controllers\HomeController::class, 'softdelete_video'])->name('softdelete.video');
Route::get('/admin/restore_video/{id}', [App\Http\Controllers\HomeController::class, 'restore_video'])->name('restore.video');
