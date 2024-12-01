<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewTeamMemberController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/team_member', [NewTeamMemberController::class, 'index']);
Route::get('/showModalForm', [NewTeamMemberController::class, 'showModalForm']);
Route::get('/getEmployeeStatus', [NewTeamMemberController::class, 'getEmployeeStatus']);
Route::get('/getAllTeamMember', [NewTeamMemberController::class, 'getAllTeamMember']);

