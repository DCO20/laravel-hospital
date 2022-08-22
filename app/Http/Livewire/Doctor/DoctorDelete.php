<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Doctor;
use Livewire\Component;

class DoctorDelete extends Component
{
    public $doctor_id;

    public $name;

    public function mount($id)
    {
        $doctor = Doctor::find($id);
        $this->doctor_id = $doctor->id;
        $this->name = $doctor->name;
    }

    public function delete()
    {
        $Doctor = Doctor::find($this->doctor_id);

        $Doctor->delete();

        session()->flash('message', 'Cadastro excluído com sucesso.');

        return redirect()->route('doctor.index');
    }

    public function render()
    {
        return view('livewire.doctor.doctor-delete');
    }
}
