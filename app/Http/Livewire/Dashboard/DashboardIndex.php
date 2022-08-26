<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Attendance;
use App\Models\Doctor;
use App\Models\Employee;
use App\Models\Pacient;
use Livewire\Component;

class DashboardIndex extends Component
{
    public function render()
    {
        $attendances = Attendance::count();

        $employees = Employee::count();

        $doctors = Doctor::count();

        $pacients = Pacient::count();

        return view('livewire.dashboard.dashboard-index', compact(
            'attendances',
            'employees',
            'doctors',
            'pacients'
        ));
    }
}
