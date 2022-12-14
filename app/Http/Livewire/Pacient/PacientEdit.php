<?php

namespace App\Http\Livewire\Pacient;

use App\Models\Pacient;
use Livewire\Component;

class PacientEdit extends Component
{
    public $pacient_id;

    public $name;

    public $email;

    public $cpf;

    public $phone;

    public $street;

    public $number;

    public $description;

    protected array $rules = [
        'name' => 'required|max:50',
        'email' => 'required|email',
        'cpf' => 'required|cpf|max:15',
        'phone' => 'required|max:15',
        'street' => 'required|max:50',
        'number' => 'required|max:10',
    ];

    public function mount($id)
    {
        $pacient = Pacient::find($id);
        $this->pacient_id = $pacient->id;
        $this->name = $pacient->name;
        $this->email = $pacient->email;
        $this->cpf = $pacient->cpf;
        $this->phone = $pacient->phone;
        $this->street = $pacient->street;
        $this->number = $pacient->number;
        $this->description = $pacient->description;
    }

    public function update()
    {
        $this->validate();

        $pacient = Pacient::find($this->pacient_id);

        $pacient->update([
            'name' => $this->name,
            'email' => $this->email,
            'cpf' => $this->cpf,
            'phone' => $this->phone,
            'street' => $this->street,
            'number' => $this->number,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Cadastro atualizado com sucesso.');

        return redirect()->route('pacient.edit', $this->pacient_id);
    }

    public function render()
    {
        return view('livewire.pacient.pacient-edit');
    }
}
