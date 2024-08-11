<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewTeamMemberController extends Controller
{
    function index() {
        $view_data["page_title"] = "New Team Member";
        return view('team_member/index', $view_data);
    }
}
