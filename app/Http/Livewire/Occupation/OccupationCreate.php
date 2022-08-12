<?php

namespace App\Http\Livewire\Occupation;

use App\Models\Occupation;
use Livewire\Component;

class OccupationCreate extends Component
{
    public $name = null;

    protected array $rules = [
        'name' => 'required|max:50',
    ];

    public function store()
    {
        $this->validate();

        Occupation::create([
            'name' => $this->name,
        ]);

        session()->flash('message', 'Cadastro realizado com sucesso.');

        return redirect()->route('occupation.index');
    }

    public function render()
    {
        return view('livewire.occupation.occupation-create');
    }
}
