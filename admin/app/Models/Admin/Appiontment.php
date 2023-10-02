<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appiontment extends Model
{
    use HasFactory;
    protected $table = 'appiontments';
    protected $fillable = ['selling_product_id'];
}
