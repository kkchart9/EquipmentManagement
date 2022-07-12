<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

use App\Models\Equipments;

use App\Calendar\CalendarView;

class HomeController extends Controller

{

    public function index()
    {
        $today = date('Y-m-d');
        $schedule = new Schedule;
        $data = $schedule->orderBy('schedule_date', 'asc')->where('schedule_date', '>=', $today)->get();
		$calendar = new CalendarView(time());
        return view('home.index', compact('data','calendar'));
    }

}