<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appiontment extends Model
{
    use HasFactory;
    protected $table = 'appiontments';
    protected $fillable = ['sold_product_id', 'status', 'usertype', 'appiontment_taken_date', 'appiontment_taken_time', 'inspection_date', 'inspection_time'];
}
