<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class TeamMember extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10; // Default number of entries per page
    protected $queryString = ['search'];
    public $modalData;

    public function loadData($id){
        $this->modalData = Employee::find($id);
        $this->dispatch('openModal'); // Emit an event to open the modal
    }

    function render() {
        $employees = DB::table(DB::raw('employee AS emp'))
            ->select('emp.employee_id','emp.employee_firstname', 'emp.employee_lastname', 'emp.employee_bio', 'dept.department_name', 'eod.created_date', 'eod.approval_status', 'eod.remarks', 'position.position_name', 'emp.employee_payrolltype', 'emp.employee_dailyrate', 'emp.employee_monthlyrate', 'eod.created_date')
            ->join(DB::raw('employee_other_details AS eod'), 'eod.employee_id', '=', 'emp.employee_id')
            ->leftJoin(DB::raw('tbl_department AS dept'), 'dept.department_id', '=', 'emp.department_id')
            ->leftJoin(DB::raw('r2groupc_crm.position AS position'), 'position.position_id', '=', 'emp.position_id')
            ->get();

        return view('livewire.team_member.team-member', ['employees' => $employees]);
    }
  
}
