<?php

use App\Http\Controllers\contactoController;
use App\Http\Controllers\nosotrosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\serviciosController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;



Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Rutas públicas
Route::get('/nosotros', [nosotrosController::class, 'index'])->name('public.nosotros.Index');
Route::get('/servicios', [serviciosController::class, 'index'])->name('public.servicios.Index');
Route::get('/contacto', [contactoController::class, 'index'])->name('public.contacto.Index');
Route::get('/blog', [BlogController::class, 'index'])->name('public.blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'showPublic'])->name('blog.showPublic');

// Rutas con peticiones
Route::post('/contact', [ContactController::class, 'store']);


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

     // BLOG
     Route::get('/admin/blog', [BlogController::class, 'indexAdm'])->name('admin.blog.index');
     Route::get('/admin/blog/create', [BlogController::class, 'create'])->name('admin.blog.create');
     Route::post('/admin/blog', [BlogController::class, 'store'])->name('admin.blog.store');
     Route::get('/admin/blog/{id}/edit', [BlogController::class, 'edit'])->name('admin.blog.edit');
     Route::post('/admin/blog/{id}', [BlogController::class, 'update'])->name('admin.blog.update');
     Route::delete('/admin/blog/{id}', [BlogController::class, 'destroy'])->name('admin.blog.destroy');
     Route::get('/admin/blog/{id}', [BlogController::class, 'show'])->name('admin.blog.show');
});

require __DIR__.'/auth.php';
