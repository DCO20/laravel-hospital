<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Doctor;
use App\Models\Specialty;
use Livewire\Component;

class DoctorCreate extends Component
{
    public $name = null;

    public $cpf = null;

    public $email = null;

    public $phone = null;

    public $specialty_id = null;

    protected array $rules = [
        'name' => 'required|max:50|unique:doctors',
        'cpf' => 'required|cpf|max:15|unique:doctors',
        'email' => 'required|email',
        'phone' => 'required|max:15',
        'specialty_id' => 'required',
    ];

    public function store()
    {
        $this->validate();

        Doctor::create([
            'name' => $this->name,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'phone' => $this->phone,
            'specialty_id' => $this->specialty_id,
        ]);

        session()->flash('message', 'Cadastro realizado com sucesso.');

        return redirect()->route('doctor.index');
    }

    public function render()
    {
        return view('livewire.doctor.doctor-create', [
            'specialties' => Specialty::all(),
        ]);
    }
}
