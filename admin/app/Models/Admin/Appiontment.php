<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appiontment extends Model
{
    use HasFactory;
    protected $table = 'appiontments';
    protected $fillable = ['engineer_id', 'reserve', 'blockedEngineerId', 'sold_product_id', 'status', 'user_id', 'usertype', 'appiontment_taken_date', 'appiontment_taken_time', 'inspection_date', 'inspection_time'];
}
