<?php

namespace App\Models\Engineer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartsForProduct extends Model
{
    use HasFactory;
    protected $table = 'parts_for_product';
    protected $fillable = ['appiontment_id', 'appliance_name', 'updated_at', 'created_at'];
}
