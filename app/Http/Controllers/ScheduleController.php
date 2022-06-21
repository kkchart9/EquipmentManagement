<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        $today = date('Y-m-d');
        $schedule = new Schedule;
        $data = $schedule->orderBy('schedule_date', 'asc')->where('schedule_date', '>=', $today)->get();

        return view('schedule.index', compact('data'));
    }

    public function register()
    {
        return view('schedule.register');
    }

    public function store(Request $request)
    {

        // 新規作成
        Schedule::create([
            'user_id' => 1,
            'schedule_name' => $request->schedule_name,
            $date = $request->year . '-' . $request->month . '-' . $request->day,
            'schedule_date' => $date,
            $starting_time = $request->start_hour . ':' . $request->start_minute,
            $end_time = $request->end_hour . ':' . $request->end_minute,
            'starting_time' => $starting_time,
            'end_time' => $end_time,
            'location' => $request->location,
        ]);
        return redirect('/schedule');
    }

    public function edit(Request $request)
    {
        $id = $request->query('id');
        $data = Schedule::where('id',$id)->first();
        return view('schedule.edit', compact('id','data'));
    }

    public function update(Request $request)
    {
        Schedule::where('id', $request->id)->update([
            'id' => $request->id,
            'schedule_name' => $request->schedule_name,
            'location' => $request->location,
        ]);
        return redirect('/schedule');
    }

    public function destroy(Request $request)
    {
        $id = $request->query('id');
        $data = Schedule::where('id',$id)->first();
        return view('schedule.destroy', compact('id','data'));
    }

    public function delete(Request $request)
    {
        Schedule::where('id', $request->id)->delete();
        return redirect('/schedule');
    }
}
