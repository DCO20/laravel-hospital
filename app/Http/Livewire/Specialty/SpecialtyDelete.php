<?php

namespace App\Http\Livewire\Specialty;

use App\Models\Specialty;
use Livewire\Component;

class SpecialtyDelete extends Component
{
    public $specialty_id;

    public $name;

    public function mount($id)
    {
        $specialty = Specialty::find($id);
        $this->specialty_id = $specialty->id;
        $this->name = $specialty->name;
    }

    public function delete()
    {
        $specialty = Specialty::find($this->specialty_id);

        $specialty->delete();

        session()->flash('message', 'Cadastro excluído com sucesso.');

        return redirect()->route('specialty.index');
    }

    public function render()
    {
        return view('livewire.specialty.specialty-delete');
    }
}
