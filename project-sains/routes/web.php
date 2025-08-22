<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudyGroupController;
use App\Http\Controllers\Asisten\WeeklyScoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [HomeController::class, 'index'])-> middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('nilaiperpekan', WeeklyScoreController::class)
    ->middleware('asisten')
    ->names([
        'index' => 'nilaiperpekan.index',
        'create' => 'nilaiperpekan.create',
        'store' => 'nilaiperpekan.store',
        'show' => 'nilaiperpekan.show',         
        'edit' => 'nilaiperpekan.edit',
        'update' => 'nilaiperpekan.update',
        'destroy' => 'nilaiperpekan.destroy',
    ]);

Route::get('/nilaiperpekan/{course_id}/edit', [WeeklyScoreController::class, 'edit'])
    ->name('nilaiperpekan.edit')
    ->middleware('auth', 'asisten');

Route::post('/nilaiperpekan/{course_id}/update-all', [WeeklyScoreController::class, 'updateAll'])
    ->name('nilaiperpekan.updateAll')
    ->middleware('auth', 'asisten');

require __DIR__.'/auth.php';
