<?php

use App\Http\Livewire\Pacient\PacientCreate;
use App\Http\Livewire\Pacient\PacientDelete;
use App\Http\Livewire\Pacient\PacientEdit;
use App\Http\Livewire\Pacient\PacientIndex;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/pacientes', PacientIndex::class)->name('pacient.index');
    Route::get('/paciente/cadastro', PacientCreate::class)->name('pacient.create');
    Route::get('/paciente/{id}/editar', PacientEdit::class)->name('pacient.edit');
    Route::get('/paciente/{id}/confirmar-exclusao', PacientDelete::class)->name('pacient.confirm_delete');
});
