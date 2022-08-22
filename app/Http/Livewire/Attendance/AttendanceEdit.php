<?php

namespace App\Http\Livewire\Attendance;

use App\Models\Attendance;
use App\Models\Doctor;
use App\Models\Pacient;
use Livewire\Component;

class AttendanceEdit extends Component
{
    public $attendance_id;

    public $status;

    public $description;

    public $pacient_id;

    public $doctor_id;

    protected array $rules = [
        'status' => 'required',
        'description' => 'nullable',
        'pacient_id' => 'required',
        'doctor_id' => 'required',
    ];

    public function mount($id)
    {
        $attendance = Attendance::find($id);
        $this->attendance_id = $attendance->id;
        $this->status = $attendance->status;
        $this->description = $attendance->description;
        $this->pacient_id = $attendance->pacient_id;
        $this->doctor_id = $attendance->doctor_id;
    }

    public function update()
    {
        $this->validate();

        $attendance = Attendance::find($this->attendance_id);

        $attendance->update([
            'status' => $this->status,
            'description' => $this->description,
            'pacient_id' => $this->pacient_id,
            'doctor_id' => $this->doctor_id,
        ]);

        session()->flash('message', 'Cadastro atualizado com sucesso.');

        return redirect()->route('attendance.edit', $this->attendance_id);
    }

    public function render()
    {
        $pacients = Pacient::all();

        $doctors = Doctor::all();

        return view('livewire.attendance.attendance-edit', compact('pacients', 'doctors'));
    }
}
