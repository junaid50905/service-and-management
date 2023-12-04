<?php

namespace App\Models\Engineer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;
    protected $table = 'inspections';
    protected $fillable = ['appiontment_id', 'engineer_id', 'inspection', 'start_date', 'start_time', 'end_time', 'longitude', 'latitude', 'status'];
}
