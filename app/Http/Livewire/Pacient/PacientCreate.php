<?php

namespace App\Http\Livewire\Pacient;

use App\Models\Pacient;
use Livewire\Component;

class PacientCreate extends Component
{
    public $name = null;

    public $email = null;

    public $cpf = null;

    public $phone = null;

    public $street = null;

    public $number = null;

    public $description = null;

    protected array $rules = [
        'name' => 'required|max:50',
        'email' => 'required|email',
        'cpf' => 'required|cpf|max:15',
        'phone' => 'required|max:15',
        'street' => 'required|max:50',
        'number' => 'required|max:10',
    ];

    public function store()
    {
        $this->validate();

        Pacient::create([
            'name' => $this->name,
            'email' => $this->email,
            'cpf' => $this->cpf,
            'phone' => $this->phone,
            'street' => $this->street,
            'number' => $this->number,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Cadastro realizado com sucesso.');

        return redirect()->route('pacient.index');
    }

    public function render()
    {
        return view('livewire.pacient.pacient-create');
    }
}
