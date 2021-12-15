<?php

use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeAppController;
use App\Http\Controllers\HomeCheckController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SiteMapController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeCheckController::class, 'HomePage'])->name('Home');
// ../home url
Route::get('/home', [HomeCheckController::class, 'HomePage'])->name('HomePage');