<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use App\Models\Occupation;
use Livewire\Component;

class EmployeeEdit extends Component
{
    public $employee_id;

    public $name;

    public $email;

    public $phone;

    public $occupation_id;

    protected array $rules = [
        'name' => 'required|max:50',
        'email' => 'required|email',
        'phone' => 'required|max:10',
        'occupation_id' => 'required',
    ];

    public function mount($id)
    {
        $employee = employee::find($id);
        $this->employee_id = $employee->id;
        $this->name = $employee->name;
        $this->email = $employee->email;
        $this->phone = $employee->phone;
        $this->occupation_id = $employee->occupation_id;
    }

    public function update()
    {
        $this->validate();

        $employee = Employee::find($this->employee_id);

        $employee->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'occupation_id' => $this->occupation_id,
        ]);

        session()->flash('message', 'Cadastro atualizado com sucesso.');

        return redirect()->route('employee.edit', $this->employee_id);
    }

    public function render()
    {
        return view('livewire.employee.employee-edit', [
            'occupations' => Occupation::all(),
        ]);
    }
}
