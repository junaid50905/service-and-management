<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engineer extends Model
{
    use HasFactory;
    protected $table = "engineers";
    protected $fillable = ["category_id", "subcategory_id", "name", "email", "password", "phone", "address"];
}
