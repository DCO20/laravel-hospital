<?php

namespace App\Http\Livewire\Occupation;

use App\Models\Occupation;
use Livewire\Component;

class OccupationEdit extends Component
{
    public $occupation_id;

    public $name;

    protected array $rules = [
        'name' => 'required|max:50',
    ];

    public function mount($id)
    {
        $occupation = occupation::find($id);
        $this->occupation_id = $occupation->id;
        $this->name = $occupation->name;
    }

    public function update()
    {
        $this->validate();

        $occupation = Occupation::find($this->occupation_id);

        $occupation->update([
            'name' => $this->name,
        ]);

        session()->flash('message', 'Cadastro atualizado com sucesso.');

        return redirect()->route('occupation.edit', $this->occupation_id);
    }

    public function render()
    {
        return view('livewire.occupation.occupation-edit');
    }
}
