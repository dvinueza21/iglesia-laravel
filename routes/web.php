<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\MemberController; // ✅ CORRECTO: en el namespace Admin

/*
|--------------------------------------------------------------------------
| Páginas públicas
|--------------------------------------------------------------------------
*/
Route::view('/',        'index')->name('home');
Route::view('/about',   'about')->name('about');
Route::view('/gallery', 'gallery')->name('gallery');
Route::view('/donate',  'donate')->name('donate');
Route::view('/causes',  'causes')->name('causes');
Route::view('/contact', 'contact')->name('contact');

// Formulario de contacto
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Dashboard (usuarios logueados)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| Documentos (Spatie)
|  - Ver/descargar: permission:documents.view
|  - Subir/eliminar: permission:documents.manage
|--------------------------------------------------------------------------
*/

// Lista + descarga (usuarios con documents.view)
Route::middleware(['auth', 'permission:documents.view'])->group(function () {
    Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::get('/documents/{filename}/download', [DocumentController::class, 'download'])->name('documents.download');

    // Misma lista/descarga bajo /admin para botón del panel
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
        Route::get('/documents/{filename}/download', [DocumentController::class, 'download'])->name('documents.download');
    });
});

// Gestión (solo quien tenga documents.manage)
Route::middleware(['auth', 'permission:documents.manage'])
    ->prefix('admin/documents')
    ->name('admin.documents.')
    ->group(function () {
        Route::get('/create',        [DocumentController::class, 'create'])->name('create');
        Route::post('/',             [DocumentController::class, 'store'])->name('store');
        Route::delete('/{filename}', [DocumentController::class, 'destroy'])->name('destroy');
    });

/*
|--------------------------------------------------------------------------
| Área de administración (rol admin)
|  - Usuarios
|  - Miembros de la iglesia
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Usuarios
        Route::get('/users', [UserController::class, 'index'])->name('users.index');

        // Miembros
        Route::get('/members',             [MemberController::class, 'index'])->name('members.index');
        Route::post('/members',            [MemberController::class, 'store'])->name('members.store');
        Route::delete('/members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');
    });

/*
|--------------------------------------------------------------------------
| Auth (Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
