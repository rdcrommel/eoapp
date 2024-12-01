<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class NewTeamMemberController extends Controller
{
    function index() {
        $view_data["page_title"] = "New Team Member";
        return view('team_member/index', $view_data);
    }

    function showModalForm(Request $request) {
        $result = Employee::getEmployeeDetails([
            "employee_id" => $request->input('employee_id'),
        ]);

        $view_data["view_data"] = $result;
        
        $viewContent = view('team_member.modal_form', $view_data)->render();
        return response()->json(['data' => $viewContent]);
    }

    function getEmployeeStatus(Request $request) {
        $result = Employee::getEmployeeStatus([
            "status" => $request->input('status'),
        ]);

        return response()->json(['data' => $result]);
    }

    function getAllTeamMember() {
        $employeeModel = new Employee;
        $results = $employeeModel->getAllTeamMember();

        $data = array();

        foreach($results as $result) {
            $data[] = $this->_make_row($result);
        }
        
        return response()->json(['data' => $data]);
    }

    private function _make_row($data) {
        return array(
            $data->employee_id,
            $data->created_date,
            $data->employee_firstname.' '. $data->employee_lastname,
            $data->employee_bio,
            $data->department_name ? $data->department_name : $data->branch_name,
            $data->position_name,
            $data->employee_payrolltype,
            $data->employee_monthlyrate ? $data->employee_monthlyrate : $data->employee_dailyrate,
            $data->approval_status,
            $data->remarks
        );
    }
}
