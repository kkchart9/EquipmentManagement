<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Calendar\CalendarView;
use App\Http\Controllers\Controller;

class HomeScreenController extends Controller
{
    public function index()
    {
        $today = date('Y-m-d');
        $schedule = new Schedule;
        $data = $schedule->orderBy('schedule_date', 'asc')->where('schedule_date', '>=', $today)->get();
		$calendar = new CalendarView(time());
        return view('homescreen.index', compact('data','calendar'));
    }
}
