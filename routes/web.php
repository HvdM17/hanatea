<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\AboutController;
use App\Http\Controllers\Public\MenuController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\TestimonialPublicController;
use App\Http\Controllers\Public\FaqController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\SettingController;

Route::get('/', [HomeController::class, 'index'])->name('public.home');
Route::get('/tentang', [AboutController::class, 'index'])->name('public.about');
Route::get('/menu', [MenuController::class, 'index'])->name('public.menu');
Route::get('/kontak', [ContactController::class, 'index'])->name('public.contact');
Route::get('/testimoni', [TestimonialPublicController::class, 'index'])->name('public.testimonials');
Route::get('/faq', [FaqController::class, 'index'])->name('public.faq');

Route::middleware(['auth', 'verified', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        Route::resource('/products', ProductController::class);
        Route::resource('/banners', BannerController::class)->except(['show']);
        Route::resource('/testimonials', TestimonialController::class)->except(['show','edit','update']);

        Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
        Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
    });

require __DIR__.'/auth.php';