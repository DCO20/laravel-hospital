<?php

namespace App\Http\Livewire\Occupation;

use App\Models\Occupation;
use Livewire\Component;

class OccupationDelete extends Component
{
    public $occupation_id;

    public $name;

    public function mount($id)
    {
        $occupation = Occupation::find($id);
        $this->occupation_id = $occupation->id;
        $this->name = $occupation->name;
    }

    public function delete()
    {
        $occupation = Occupation::find($this->occupation_id);

        $occupation->delete();

        session()->flash('message', 'Cadastro excluído com sucesso.');

        return redirect()->route('occupation.index');
    }

    public function render()
    {
        return view('livewire.occupation.occupation-delete');
    }
}
