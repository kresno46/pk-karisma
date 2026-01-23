<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CompanyAboutController;
use App\Http\Controllers\CompanyStatisticController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\OurPrincipleController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectClientController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/products', [FrontController::class, 'products'])->name('front.products');
Route::get('/teams', [FrontController::class, 'teams'])->name('front.teams');
Route::get('/about', [FrontController::class, 'about'])->name('front.about');
Route::get('/blogs', [FrontController::class, 'blogs'])->name('front.blogs');
Route::get('/blogs/{slug}', [FrontController::class, 'blogDetail'])->name('front.blog-detail');
Route::get('/appointment', [FrontController::class, 'appointment'])->name('front.appointment');
Route::post('/appointment/store', [FrontController::class, 'storeAppointment'])->name('front.appointment.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        // Kelola Pengguna
        Route::middleware('can: Kelola Pengguna')->group(function () {
            Route::get('users', [AdminUserController::class, 'index'])->name('users.index');
            Route::get('users/create', [AdminUserController::class, 'create'])->name('users.create');
            Route::post('users', [AdminUserController::class, 'store'])->name('users.store');
            Route::get('users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
            Route::put('users/{user}', [AdminUserController::class, 'update'])->name('users.update');
            Route::delete('users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
        });

        // Data Absensi
        Route::middleware('role:super_admin')->group(function () {
            Route::get('attendances', [AttendanceController::class, 'index'])->name('attendances.index');
            Route::get('attendances/pdf', [AttendanceController::class, 'exportPdf'])->name('attendances.pdf');
        });

        // Kelola Statistik
        Route::middleware('can: Kelola Statistik')->group(function () {
            Route::resource('statistics', CompanyStatisticController::class);
        });

        // Kelola Produk
        Route::middleware('can: Kelola Produk')->group(function () {
            Route::resource('products', ProductController::class);
        });

        // Kelola Prinsip
        Route::middleware('can: Kelola Prinsip')->group(function () {
            Route::resource('principles', OurPrincipleController::class);
        });

        // Kelola Testimoni
        Route::middleware('can: Kelola Testimoni')->group(function () {
            Route::resource('testimonials', TestimonialController::class);
        });

        // Kelola Klien
        Route::middleware('can: Kelola Klien')->group(function () {
            Route::resource('clients', ProjectClientController::class);
        });

        // Kelola Tim
        Route::middleware('can: Kelola Tim')->group(function () {
            Route::resource('teams', OurTeamController::class);
        });

        // Kelola Tentang
        Route::middleware('can: Kelola Tentang')->group(function () {
            Route::resource('abouts', CompanyAboutController::class);
        });

        // Kelola Janji Temu
        Route::middleware('can: Kelola Janji Temu')->group(function () {
            Route::resource('appointments', AppointmentController::class);
        });

        // Kelola Bagian Hero
        Route::middleware('can: Kelola Bagian Hero')->group(function () {
            Route::resource('hero-sections', HeroSectionController::class);
        });
    });

    // Absensi untuk user
    Route::middleware('role:user')->group(function () {
        Route::get('/attendance', [AttendanceController::class, 'create'])->name('attendance.create');
        Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');
    });
});

require __DIR__.'/auth.php';
