<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use HasFactory;
    protected $table = 'checklists';
    protected $fillable = ['appiontment_id', 'appliance_name', 'appliance_price'];
}
