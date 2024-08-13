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
        
        $viewContent = view('team_member.modal_form', $result)->render();
        return response()->json(['data' => $viewContent]);
    }
}
