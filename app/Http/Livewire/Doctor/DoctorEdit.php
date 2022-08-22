<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Doctor;
use App\Models\Specialty;
use Livewire\Component;

class DoctorEdit extends Component
{
    public $doctor_id;

    public $name;

    public $cpf;

    public $email;

    public $phone;

    public $specialty_id;

    protected array $rules = [
        'name' => 'nullable|max:50',
        'cpf' => 'nullable|cpf|max:15',
        'email' => 'required|email',
        'phone' => 'required|max:15',
        'specialty_id' => 'required',
    ];

    public function mount($id)
    {
        $doctor = Doctor::find($id);
        $this->doctor_id = $doctor->id;
        $this->name = $doctor->name;
        $this->cpf = $doctor->cpf;
        $this->email = $doctor->email;
        $this->phone = $doctor->phone;
        $this->specialty_id = $doctor->specialty_id;
    }

    public function update()
    {
        $this->validate();

        $doctor = Doctor::find($this->doctor_id);

        $doctor->update([
            'name' => $this->name,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'phone' => $this->phone,
            'specialty_id' => $this->specialty_id,
        ]);

        session()->flash('message', 'Cadastro atualizado com sucesso.');

        return redirect()->route('doctor.edit', $this->doctor_id);
    }

    public function render()
    {
        return view('livewire.doctor.doctor-edit', [
            'specialties' => Specialty::all(),
        ]);
    }
}
