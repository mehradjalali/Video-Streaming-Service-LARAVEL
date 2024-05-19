<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Redirect::route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/all-videos/', [App\Http\Controllers\Video\VideoController::class, 'allVideos'])->name('videos.all')->middleware('auth:web');
Route::get('/upload-video', [App\Http\Controllers\Video\VideoController::class, 'uploadVideo'])->name('video.upload');
Route::post('/upload-video', [App\Http\Controllers\Video\VideoController::class, 'storeVideo'])->name('video.store');
Route::get('/delete-video/{id}', [App\Http\Controllers\Video\VideoController::class, 'deleteVideo'])->name('video.delete');
Route::get('/edit-video/{id}', [App\Http\Controllers\Video\VideoController::class, 'videoDetails'])->name('video.details');
Route::post('/edit-video/{id}', [App\Http\Controllers\Video\VideoController::class, 'editVideo'])->name('video.update');