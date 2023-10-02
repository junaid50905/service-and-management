<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitingEngineer extends Model
{
    use HasFactory;
    protected $table = 'recruiting_engineers';
    protected $fillable = ['appiontment_id', 'engineer_id'];
}
