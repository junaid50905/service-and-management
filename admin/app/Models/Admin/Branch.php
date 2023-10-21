<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $table = 'branches';
    protected $fillable = ['user_id', 'branch_name', 'branch_address', 'admin_name', 'admin_email', 'admin_phone'];
}
