<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\QrController;
use App\Http\Controllers\FaltaController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth', App\Http\Middleware\admin::class])->group(function () {
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

Route::get('/usuarios/{numero_control}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{numero_control}', [UsuarioController::class, 'update'])->name('usuarios.update');

Route::delete('/usuarios/{numero_control}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

Route::get('/escaner', function () {return view('admin.escaner'); })->name('escaner');
Route::post('/escanear-qr', [QrController::class, 'procesarQr'])->name('procesar.qr');

Route::get('/admin/perfil', [AdminController::class, 'editarPerfil'])->name('admin.perfil');
Route::put('/admin/perfil', [AdminController::class, 'actualizarPerfil'])->name('admin.perfil.update');

Route::get('/faltas', [FaltaController::class, 'index'])->name('faltas.index');
Route::delete('/faltas/{id}', [FaltaController::class, 'destroy'])->name('faltas.destroy');

Route::middleware('auth')->get('/admin', [AdminController::class, 'admin'])->name('panel.admin');
});

Route::middleware('auth')->get('/estudiante', [EstudianteController::class, 'index'])->name('panel.estudiante');
