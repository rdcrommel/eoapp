<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Employee;

class TeamMember extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = 10; // Default number of entries per page
    protected $queryString = ['search'];
    
    public function render() {
        $employees = Employee::query()
        ->leftJoin('employee_other_details', 'employee.employee_id', '=', 'employee_other_details.employee_id') // Adjust column names if necessary
        ->select(
            'employee.*', // Get all fields from the employee table
            'employee_other_details.created_date', // Replace with actual fields from employee_other_details
            'employee_other_details.remarks' // Replace with actual fields from employee_other_details
        )
        ->where(function ($query) {
            if ($this->search) {
                $query->where('employee.employee_lastname', 'like', '%' . $this->search . '%')
                      ->orWhere('employee.employee_firstname', 'like', '%' . $this->search . '%');
            }
        })
        ->paginate($this->perPage);
        
        return view('livewire.team-member', ['employees' => $employees]);
    }
}
