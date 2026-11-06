<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Models\Plan;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\StudentResult;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'plans' => Plan::all(),
        'services' => Service::all(),
        'testimonials' => Testimonial::all(),
        'studentResults' => StudentResult::all()
    ]);
})->name('home');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

    Route::get('/plans', [AdminController::class, 'plansIndex'])->name('plans.index');
    Route::post('/plans', [AdminController::class, 'plansStore'])->name('plans.store');
    Route::delete('/plans/{plan}', [AdminController::class, 'plansDestroy'])->name('plans.destroy');

    Route::get('/services', [AdminController::class, 'servicesIndex'])->name('services.index');
    Route::post('/services', [AdminController::class, 'servicesStore'])->name('services.store');
    Route::delete('/services/{service}', [AdminController::class, 'servicesDestroy'])->name('services.destroy');

    Route::get('/testimonials', [AdminController::class, 'testimonialsIndex'])->name('testimonials.index');
    Route::post('/testimonials', [AdminController::class, 'testimonialsStore'])->name('testimonials.store');
    Route::delete('/testimonials/{testimonial}', [AdminController::class, 'testimonialsDestroy'])->name('testimonials.destroy');

    // Gestão da Galeria de Resultados
    Route::get('/results', [AdminController::class, 'resultsIndex'])->name('results.index');
    Route::post('/results', [AdminController::class, 'resultsStore'])->name('results.store');
    Route::delete('/results/{result}', [AdminController::class, 'resultsDestroy'])->name('results.destroy');

    Route::post('/settings/popup', [AdminController::class, 'updatePopup'])->name('settings.update-popup');
});

Route::get('/dashboard', function () { return redirect()->route('admin.dashboard'); })->middleware(['auth'])->name('dashboard');
Route::redirect('/admin', '/admin/dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';