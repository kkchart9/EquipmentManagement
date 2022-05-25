<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipments extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipment_name',
        'equipment_vale',
        'equipment_genre',
        'manufacturer',
        'color_coding',
    ];


}
