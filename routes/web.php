<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\QrController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', App\Http\Middleware\admin::class])->group(function () {
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
Route::get('/escaner', function () {return view('admin.escaner'); })->name('escaner');
Route::post('/escanear-qr', [QrController::class, 'procesarQr'])->name('procesar.qr');

Route::middleware('auth')->get('/admin', [AdminController::class, 'admin'])->name('panel.admin');
});

Route::middleware('auth')->get('/estudiante', [EstudianteController::class, 'index'])->name('panel.estudiante');
