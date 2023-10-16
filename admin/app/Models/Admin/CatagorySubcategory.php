<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatagorySubcategory extends Model
{
    use HasFactory;
    protected $table = 'category_subcategory';
    protected $fillable = ['category_id', 'subcategory_id'];
}
