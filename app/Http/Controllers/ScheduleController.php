<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Equipments;
use Illuminate\Support\Facades\DB;

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
        $equipment = Equipments::get();
        return view('schedule.register', compact('equipment'));
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
            'belongings' => '持ち物',
            'schedule_color' => $request->schedule_color,
            'optional_item' => '自由項目',
        ]);
        $maxScheduleId = Schedule::max('id');

        foreach (json_decode($request->equipments) as $item) {
            DB::insert('insert into equipment_schedule (schedule_id, equipment_id, checkbox) values (?, ?, ?)', [$maxScheduleId, $item->id, $item->check_value]);
        }

        Equipments::where('check_value', 1)->update([
            'check_value' => 0
        ]);
        return redirect('/schedule');
    }

    public function edit(Request $request)
    {
        $id = $request->query('id');
        $data = Schedule::where('id',$id)->first();
        $equipment = Equipments::get();
        // dd($equipments);
        $equipment_check = DB::table('equipment_schedule')->where('schedule_id', $id)->get();
        // dd($data);
        
        return view('schedule.edit', compact('id','data','equipment','equipment_check'));
    }

    public function update(Request $request)
    {
        Schedule::where('id', $request->id)->update([
            'id' => $request->id,
            'schedule_name' => $request->schedule_name,
            'schedule_date' => $request->year . '-' . $request->month . '-' . $request->day,
            'starting_time' => $request->start_hour . ':' . $request->start_minute,
            'end_time' => $request->end_hour . ':' . $request->end_minute,
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

    public function sort(Request $request)
    {
        $equipment_search = $request->search_equipments;
        $equipment_sort = $request->equipment_sort;


        if ($equipment_sort == "idOld") {
            if (!empty($equipment_search)) {
                $equipment = Equipments::Where('equipment_name', 'LIKE', "%.$equipment_search.%")->orderBy('id', 'desc')->get();
            } else {
                $equipment = Equipments::orderBy('id', 'desc')->get();
            }
        } else {
            if (!empty($equipment_search)) {
                $equipment = Equipments::Where('equipment_name', 'LIKE', "%{$equipment_search}%")->get();
            } else {
                $equipment = Equipments::get();
            }
        }

        return view('schedule.register', compact('equipment'));
    }

    public function sort_edit(Request $request)
    {
        $id = $request->query('id');
        $data = Schedule::where('id',$id)->first();
        $equipment_search = $request->search_equipments;
        $equipment_sort = $request->equipment_sort;
        $equipment_check = DB::table('equipment_schedule')->where('schedule_id', $id)->get();


        if ($equipment_sort == "idOld") {
            if (!empty($equipment_search)) {
                $equipment = Equipments::Where('equipment_name', 'LIKE', "%.$equipment_search.%")->orderBy('id', 'desc')->get();
            } else {
                $equipment = Equipments::orderBy('id', 'desc')->get();
            }
        } else {
            if (!empty($equipment_search)) {
                $equipment = Equipments::Where('equipment_name', 'LIKE', "%{$equipment_search}%")->get();
            } else {
                $equipment = Equipments::get();
            }
        }
        return view('schedule.edit', compact('id','data','equipment','equipment_check'));
    }


    public function checkbox(Request $request)
    {
        Equipments::where('id', $request->form_check_id)->update([
            'id' => $request->form_check_id,
            'check_value' => $request->form_check_value,
        ]);
        return redirect('/schedule/register');
    }

    public function checkbox_edit(Request $request)
    {
        $id = $request->form_schedule_id;
        $data = Schedule::where('id',$id)->first();
        $equipment_check = DB::table('equipment_schedule')->where('schedule_id', $id)->get();
        // dd($equipment_check);
        $a = DB::table('equipment_schedule')->where('schedule_id', $request->form_schedule_id)->where('equipment_id', $request->form_check_id)->first();
        if ($a->checkbox == 1) {
            DB::table('equipment_schedule')->where('schedule_id', $request->form_schedule_id)->where('equipment_id', $request->form_check_id)->update(['checkbox' => 0]);
        } else {
            DB::table('equipment_schedule')->where('schedule_id', $request->form_schedule_id)->where('equipment_id', $request->form_check_id)->update(['checkbox' => 1]);
        }
        $equipment = Equipments::get();
        return redirect()->route('schedule.edit', ['id' => $id]);
    }
}
