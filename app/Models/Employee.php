<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee'; // Ensure the table name is correct
    protected $primaryKey = 'employee_id'; // Specify the primary key if it's not 'id'

    public static function getEmployeeDetails($options = array()) {
        $employee_id = array_key_exists("employee_id", $options) ? $options["employee_id"] : null;

        if ($employee_id) {
            return self::select('employee.employee_id','employee.employee_firstname', 'employee.employee_lastname', 'employee.employee_bio', 'dept.department_name', 'eod.created_date', 'eod.approval_status', 'eod.remarks', 'position.position_name', 'employee.employee_payrolltype', 'employee.employee_dailyrate', 'employee.employee_monthlyrate', 'eod.created_date', 'br.branch_name')
            ->join(DB::raw('employee_other_details AS eod'), 'eod.employee_id', '=', 'employee.employee_id')
            ->leftJoin(DB::raw('r2groupc_crm.departments AS dept'), 'dept.department_id', '=', 'employee.department_id')
            ->leftJoin(DB::raw('r2groupc_crm.position AS position'), 'position.position_id', '=', 'employee.position_id')
            ->leftJoin(DB::raw('r2groupc_crm.branch AS br'), 'br.branch_id', '=', 'employee.branch_id')
            ->where('employee.employee_id', $employee_id)
            ->first();
        }

        return null;
    }

    public static function getAllTeamMember() {
        $employees = DB::table(DB::raw('employee AS emp'))
            ->select('emp.employee_id','emp.employee_firstname', 'emp.employee_lastname', 'emp.employee_bio', 'dept.department_name', 'eod.created_date', 'eod.approval_status', 'eod.remarks', 'position.position_name', 'emp.employee_payrolltype', 'emp.employee_dailyrate', 'emp.employee_monthlyrate', 'eod.created_date', 'br.branch_name')
            ->join(DB::raw('employee_other_details AS eod'), 'eod.employee_id', '=', 'emp.employee_id')
            ->leftJoin(DB::raw('r2groupc_crm.departments AS dept'), 'dept.department_id', '=', 'emp.department_id')
            ->leftJoin(DB::raw('r2groupc_crm.position AS position'), 'position.position_id', '=', 'emp.position_id')
            ->leftJoin(DB::raw('r2groupc_crm.branch AS br'), 'br.branch_id', '=', 'emp.branch_id')
            ->whereIn('eod.approval_status', ['For Approval', 'For Verification', 'Approved', 'Rejected'])
            ->get();

        return $employees;
    }

    public static function getEmployeeStatus($options = array()) {
        $status = array_key_exists("status", $options) ? $options["status"] : null;

        $employees = DB::table(DB::raw('employee AS emp'))
        ->select('emp.employee_id','emp.employee_firstname', 'emp.employee_lastname', 'emp.employee_bio', 'dept.department_name', 'eod.created_date', 'eod.approval_status', 'eod.remarks', 'position.position_name', 'emp.employee_payrolltype', 'emp.employee_dailyrate', 'emp.employee_monthlyrate', 'eod.created_date')
        ->join(DB::raw('employee_other_details AS eod'), 'eod.employee_id', '=', 'emp.employee_id')
        ->leftJoin(DB::raw('r2groupc_crm.departments AS dept'), 'dept.department_id', '=', 'emp.department_id')
        ->leftJoin(DB::raw('r2groupc_crm.position AS position'), 'position.position_id', '=', 'emp.position_id')
        ->whereIn('eod.approval_status', [$status])
        ->get();

    return $employees;
    }
    
}