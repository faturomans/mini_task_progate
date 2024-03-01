<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Companies;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard() {
        $companies = Companies::count();
        $employees = Employee::count();
        return view('admin.dashboard-admin.dashboard',compact('companies', 'employees'),
        ["title" => "Dashboard"]);
    }
}
