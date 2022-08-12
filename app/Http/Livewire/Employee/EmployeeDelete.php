<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;

class EmployeeDelete extends Component
{
    public $employee_id;

    public $name;

    public function mount($id)
    {
        $employee = Employee::find($id);
        $this->employee_id = $employee->id;
        $this->name = $employee->name;
    }

    public function delete()
    {
        $employee = Employee::find($this->employee_id);

        $employee->delete();

        session()->flash('message', 'Cadastro excluído com sucesso.');

        return redirect()->route('employee.index');
    }

    public function render()
    {
        return view('livewire.employee.employee-delete');
    }
}
