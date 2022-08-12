<?php

use App\Http\Livewire\Occupation\OccupationCreate;
use App\Http\Livewire\Occupation\OccupationDelete;
use App\Http\Livewire\Occupation\OccupationEdit;
use App\Http\Livewire\Occupation\OccupationIndex;
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

    Route::prefix('paciente')->group(function () {
        Route::get('/', PacientIndex::class)->name('pacient.index');
        Route::get('/cadastro', PacientCreate::class)->name('pacient.create');
        Route::get('/{id}/editar', PacientEdit::class)->name('pacient.edit');
        Route::get('/{id}/confirmar-exclusao', PacientDelete::class)->name('pacient.confirm_delete');
    });

    Route::prefix('ocupacao')->group(function () {
        Route::get('/', OccupationIndex::class)->name('occupation.index');
        Route::get('/cadastro', OccupationCreate::class)->name('occupation.create');
        Route::get('/{id}/editar', OccupationEdit::class)->name('occupation.edit');
        Route::get('/{id}/confirmar-exclusao', OccupationDelete::class)->name('occupation.confirm_delete');
    });
});
