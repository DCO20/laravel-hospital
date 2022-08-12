<?php

namespace App\Http\Livewire\Pacient;

use App\Models\Pacient;
use Livewire\Component;

class PacientCreate extends Component
{
    public $name = null;

    public $email = null;

    public $document = null;

    public $phone = null;

    public $street = null;

    public $number = null;

    public $description = null;

    protected array $rules = [
        'name' => 'required|max:50',
        'email' => 'required|email',
        'document' => 'required|max:20',
        'phone' => 'required|max:10',
        'street' => 'required|max:50',
        'number' => 'required|max:10',
    ];

    public function store()
    {
        $this->validate();

        Pacient::create([
            'name' => $this->name,
            'email' => $this->email,
            'document' => $this->document,
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
        return view('livewire.pacient.create');
    }
}
