<?php
namespace App\Calendar;
use Carbon\Carbon;
use App\Models\Schedule;
use DB;

class CalendarWeekDay {
	protected $carbon;

	function __construct($date){
		$this->carbon = new Carbon($date);
	}

	function getClassName(){
		return "day-" . strtolower($this->carbon->format("D"));
	}

	/**
	 * @return 
	 */
	function render(){
		
		$schedule = new Schedule;
		$target = $this->carbon->format("Y-m-d");
		$sc = $schedule->where('schedule_date', $target)->first();
		
		if(DB::table('schedule')->where('schedule_date', $target)->exists()){
			$test = '<p class="day">' . $this->carbon->format("j"). '</p>'. '<p class="schedule_name">'. $sc->schedule_name. '</p>';
		}else{
			$test = '<p class="day">' . $this->carbon->format("j"). '</p>';
		}
		
		return $test;

	}
}