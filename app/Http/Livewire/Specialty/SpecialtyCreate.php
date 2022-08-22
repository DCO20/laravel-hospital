<?php

namespace App\Http\Livewire\Specialty;

use App\Models\Specialty;
use Livewire\Component;

class SpecialtyCreate extends Component
{
    public $name = null;

    protected array $rules = [
        'name' => 'required|max:50',
    ];

    public function store()
    {
        $this->validate();

        Specialty::create([
            'name' => $this->name,
        ]);

        session()->flash('message', 'Cadastro realizado com sucesso.');

        return redirect()->route('specialty.index');
    }

    public function render()
    {
        return view('livewire.specialty.specialty-create');
    }
}
