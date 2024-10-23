<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Route khusus untuk role "siswa"
Route::group(['middleware' => ['auth', 'role:siswa']], function () {
    // Route::get('/siswa/index', [SiswaController::class, 'index'])->name('siswa.index');
    // Tambahkan route lain khusus siswa di sini

    Route::resource('siswa', SiswaController::class); 
});

// Route khusus untuk role "guru"
Route::group(['middleware' => ['auth', 'role:guru']], function () {
    // Route::get('/siswa/index', [SiswaController::class, 'index'])->name('siswa.index');
    // Tambahkan route lain khusus siswa di sini

    Route::resource('guru', GuruController::class); 
});

route::resource('news', NewsController::class);


require __DIR__.'/auth.php';
