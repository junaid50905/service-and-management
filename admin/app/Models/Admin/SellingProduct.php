<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellingProduct extends Model
{
    use HasFactory;
    protected $table = 'selling_products';
    protected $guarded = [];
}
