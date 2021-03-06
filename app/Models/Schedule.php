<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedule';

    protected $fillable = [
        'user_id',
        'schedule_name',
        'schedule_date',
        'starting_time',
        'end_time',
        'location',
        'schedule_color',
        'optional_item',
        'belongings',
    ];
}
