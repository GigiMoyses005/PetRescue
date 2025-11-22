<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\AdotanteAuthController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class,'index'])->name('home');

Route::resource('animals', AnimalController::class)->except(['index']);
Route::get('animals', [AnimalController::class,'index'])->name('animals.index');

Route::post('adoptions', [AdoptionController::class,'store'])->name('adoptions.store');

/* SOBRE FORA DO ADMIN */
Route::get('/sobre', function () {
    return view('about');
})->name('sobre');


# adotante auth
Route::get('adotante/register',[AdotanteAuthController::class,'showRegister'])->name('adotante.register');
Route::post('adotante/register',[AdotanteAuthController::class,'register'])->name('adotante.register.post');
Route::get('adotante/login',[AdotanteAuthController::class,'showLogin'])->name('adotante.login');
Route::post('adotante/login',[AdotanteAuthController::class,'login'])->name('adotante.login.post');
Route::post('adotante/logout',[AdotanteAuthController::class,'logout'])->name('adotante.logout');

Route::get('/login', function () {
    return redirect()->route('adotante.login');
})->name('login');

Rouute::get('admin/register',[AdminController::class,'showRegister'])->name('admin.register');
Route::post('admin/register',[AdminController::class,'register'])->name('admin.register.post');
Route::get('admin/login',[AdminController::class,'showLogin'])->name('admin.login');
Route::post('admin/login',[AdminController::class,'login'])->name('admin.login.post');


/* ADMIN AREA */
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function(){

    Route::get('adoptions',[AdoptionController::class,'index'])
        ->name('admin.adoptions.index');

    Route::post('adoptions/{id}/approve',[AdoptionController::class,'approve'])
        ->name('admin.adoptions.approve');

    Route::post('adoptions/{id}/reject',[AdoptionController::class,'reject'])
        ->name('admin.adoptions.reject');

    Route::delete('/adoptions/{id}', [AdoptionController::class, 'destroy'])
        ->name('admin.adoptions.destroy');

    Route::get('animals', [AdminController::class, 'animalsCreate'])
        ->name('admin.animals.index');

});
