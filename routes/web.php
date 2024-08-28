<?php
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;




// Route::view('/', 'auth.register');

Route::get('/landing', [LandingPageController::class, 'index'])->name('landing');



Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Define profile routes with authentication middleware
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');
Route::view('/', 'auth.register')->middleware('guest');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboard')->name('dashboard');
});



require __DIR__.'/auth.php';
