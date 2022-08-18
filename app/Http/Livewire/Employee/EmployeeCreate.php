<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use App\Models\Occupation;
use Livewire\Component;

class EmployeeCreate extends Component
{
    public $name = null;

    public $email = null;

    public $phone = null;

    public $occupation_id = null;

    protected array $rules = [
        'name' => 'required|max:50',
        'email' => 'required|email',
        'phone' => 'required|max:14',
        'occupation_id' => 'required',
    ];

    public function store()
    {
        $this->validate();

        Employee::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'occupation_id' => $this->occupation_id,
        ]);

        session()->flash('message', 'Cadastro realizado com sucesso.');

        return redirect()->route('employee.index');
    }

    public function render()
    {
        return view('livewire.employee.employee-create', [
            'occupations' => Occupation::all(),
        ]);
    }
}
