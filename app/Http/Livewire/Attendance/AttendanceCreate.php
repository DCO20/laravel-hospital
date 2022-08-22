<?php

namespace App\Http\Livewire\Attendance;

use App\Models\Attendance;
use App\Models\Doctor;
use App\Models\Pacient;
use Livewire\Component;

class AttendanceCreate extends Component
{
    public $status = null;

    public $description = null;

    public $pacient_id = null;

    public $doctor_id = null;

    protected array $rules = [
        'status' => 'required',
        'description' => 'nullable',
        'pacient_id' => 'required',
        'doctor_id' => 'required',
    ];

    public function store()
    {
        $this->validate();

        Attendance::create([
            'status' => $this->status,
            'description' => $this->description,
            'pacient_id' => $this->pacient_id,
            'doctor_id' => $this->doctor_id,
        ]);

        session()->flash('message', 'Cadastro realizado com sucesso.');

        return redirect()->route('attendance.index');
    }

    public function render()
    {
        $pacients = Pacient::all();

        $doctors = Doctor::all();

        return view('livewire.attendance.attendance-create', compact('pacients', 'doctors'));
    }
}
