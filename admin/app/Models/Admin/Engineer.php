<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engineer extends Model
{
    use HasFactory;
    protected $table = "engineers";
    protected $fillable = ["category_id", "subcategory_id", "name", "phone", "address"];
}