<?php

namespace App\Http\Livewire\Specialty;

use App\Models\Specialty;
use Livewire\Component;

class SpecialtyEdit extends Component
{
    public $specialty_id;

    public $name;

    protected array $rules = [
        'name' => 'required|max:50',
    ];

    public function mount($id)
    {
        $specialty = Specialty::find($id);
        $this->specialty_id = $specialty->id;
        $this->name = $specialty->name;
    }

    public function update()
    {
        $this->validate();

        $specialty = specialty::find($this->specialty_id);

        $specialty->update([
            'name' => $this->name,
        ]);

        session()->flash('message', 'Cadastro atualizado com sucesso.');

        return redirect()->route('specialty.edit', $this->specialty_id);
    }

    public function render()
    {
        return view('livewire.specialty.specialty-edit');
    }
}
