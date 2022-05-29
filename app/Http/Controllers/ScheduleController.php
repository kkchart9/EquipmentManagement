<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('schedule.register');
    }

    public function edit()
    {
        return view('schedule.edit');
    }
}
