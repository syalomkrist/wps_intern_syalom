<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index() {
        $data = array('title' => 'Dashboard User');
        return view('userdashboard.index', $data);
    }
}
