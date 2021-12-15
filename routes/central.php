<?php

use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\HomeAppController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SiteMapController;
use App\Http\Controllers\TenantController;
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
Route::get('/e-install', [TenantController::class, 'install'])->name('install');

Route::group(['prefix' => 'app'], function () {
    Route::get('/', [HomeAppController::class, 'AppPage'])->name('AppPage');
    Route::get('/tenant', [TenantController::class, 'createTenant'])->name('createTenant');
    Route::get('/privacidade', [HomeAppController::class, 'PrivacyPage'])->name('PrivacyPage');
    Route::get('/termos', [HomeAppController::class, 'TermsPage'])->name('TermsPage');
    Route::get('/duvidas', [HomeAppController::class, 'FaqPage'])->name('FaqPage');
    Route::get('/contato', [HomeAppController::class, 'ContactPage'])->name('ContactPage');
    Route::post('/contact', [HomeAppController::class, 'ContactPageSubmit'])->name('ContactPageSubmit');
    Route::get('/coming-soon', [HomeAppController::class, 'ComingPage'])->name('ComingPage');

    // ../search
    Route::get('/pesquisa', [HomeAppController::class, 'searchHomeTopics'])->name('searchHomeTopics');

    Route::get('/{seo_url_slug}', [HomeAppController::class, 'SEO']);
});