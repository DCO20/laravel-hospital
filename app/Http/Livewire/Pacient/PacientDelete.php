<?php

namespace App\Http\Livewire\Pacient;

use App\Models\Pacient;
use Livewire\Component;

class PacientDelete extends Component
{
    public $pacient_id;

    public $name;

    public function mount($id)
    {
        $pacient = Pacient::find($id);
        $this->pacient_id = $pacient->id;
        $this->name = $pacient->name;
    }

    public function delete()
    {
        $pacient = Pacient::find($this->pacient_id);

        $pacient->delete();

        session()->flash('message', 'Cadastro excluído com sucesso.');

        return redirect()->route('pacient.index');
    }

    public function render()
    {
        return view('livewire.pacient.pacient-delete');
    }
}
