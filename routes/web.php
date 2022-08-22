<?php

use App\Http\Livewire\Attendance\AttendanceCreate;
use App\Http\Livewire\Attendance\AttendanceEdit;
use App\Http\Livewire\Attendance\AttendanceIndex;
use App\Http\Livewire\Doctor\DoctorCreate;
use App\Http\Livewire\Doctor\DoctorDelete;
use App\Http\Livewire\Doctor\DoctorEdit;
use App\Http\Livewire\Doctor\DoctorIndex;
use App\Http\Livewire\Employee\EmployeeCreate;
use App\Http\Livewire\Employee\EmployeeDelete;
use App\Http\Livewire\Employee\EmployeeEdit;
use App\Http\Livewire\Employee\EmployeeIndex;
use App\Http\Livewire\Occupation\OccupationCreate;
use App\Http\Livewire\Occupation\OccupationDelete;
use App\Http\Livewire\Occupation\OccupationEdit;
use App\Http\Livewire\Occupation\OccupationIndex;
use App\Http\Livewire\Pacient\PacientCreate;
use App\Http\Livewire\Pacient\PacientDelete;
use App\Http\Livewire\Pacient\PacientEdit;
use App\Http\Livewire\Pacient\PacientIndex;
use App\Http\Livewire\Specialty\SpecialtyCreate;
use App\Http\Livewire\Specialty\SpecialtyDelete;
use App\Http\Livewire\Specialty\SpecialtyEdit;
use App\Http\Livewire\Specialty\SpecialtyIndex;
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

    //Atendimento
    Route::prefix('atendimento')->as('attendance.')->group(function () {
        Route::get('/', AttendanceIndex::class)->name('index');
        Route::get('/cadastro', AttendanceCreate::class)->name('create');
        Route::get('/{id}/editar', AttendanceEdit::class)->name('edit');
    });

    //Especialidade
    Route::prefix('especialidade')->as('specialty.')->group(function () {
        Route::get('/', SpecialtyIndex::class)->name('index');
        Route::get('/cadastro', SpecialtyCreate::class)->name('create');
        Route::get('/{id}/editar', SpecialtyEdit::class)->name('edit');
        Route::get('/{id}/confirmar-exclusao', SpecialtyDelete::class)->name('confirm_delete');
    });

    //Funcionário
    Route::prefix('funcionario')->as('employee.')->group(function () {
        Route::get('/', EmployeeIndex::class)->name('index');
        Route::get('/cadastro', EmployeeCreate::class)->name('create');
        Route::get('/{id}/editar', EmployeeEdit::class)->name('edit');
        Route::get('/{id}/confirmar-exclusao', EmployeeDelete::class)->name('confirm_delete');
    });

    //Médico
    Route::prefix('medico')->as('doctor.')->group(function () {
        Route::get('/', DoctorIndex::class)->name('index');
        Route::get('/cadastro', DoctorCreate::class)->name('create');
        Route::get('/{id}/editar', DoctorEdit::class)->name('edit');
        Route::get('/{id}/confirmar-exclusao', DoctorDelete::class)->name('confirm_delete');
    });

    //Ocupação
    Route::prefix('ocupacao')->as('occupation.')->group(function () {
        Route::get('/', OccupationIndex::class)->name('index');
        Route::get('/cadastro', OccupationCreate::class)->name('create');
        Route::get('/{id}/editar', OccupationEdit::class)->name('edit');
        Route::get('/{id}/confirmar-exclusao', OccupationDelete::class)->name('confirm_delete');
    });

    //Paciente
    Route::prefix('paciente')->as('pacient.')->group(function () {
        Route::get('/', PacientIndex::class)->name('index');
        Route::get('/cadastro', PacientCreate::class)->name('create');
        Route::get('/{id}/editar', PacientEdit::class)->name('edit');
        Route::get('/{id}/confirmar-exclusao', PacientDelete::class)->name('confirm_delete');
    });
});
