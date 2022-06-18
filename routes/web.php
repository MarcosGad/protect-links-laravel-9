<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckPasswordController;
use Illuminate\Support\Facades\Gate;


Route::get('/', function () { return view('welcome');  });
Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth'])->name('dashboard');


// Route::get('/users', function () { return view('users'); })->name('users')->middleware('check_password_route');

Route::get('/users', function () {
    if (Gate::allows('check_password')) {
        abort(403);
    }
    return view('users');
})->name('users');


Route::get('create_password',[CheckPasswordController::class,'createPassword'])->name('create.password');
Route::post('update_password',[CheckPasswordController::class,'updatePassword'])->name('update.password');


require __DIR__.'/auth.php';
