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
}
