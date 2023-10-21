<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldProduct extends Model
{
    use HasFactory;
    protected $table = 'sold_products';
    protected $fillable = ['user_id', 'branch_id', 'product_id', 'quantity', 'selling_date', 'time_of_warranty', 'sam'];
}
