<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/all-videos/', [App\Http\Controllers\Video\VideoController::class, 'allVideos'])->name('videos.all')->middleware('auth:web');