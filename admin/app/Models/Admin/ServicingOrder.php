<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicingOrder extends Model
{
    use HasFactory;
    protected $table = 'servicing_orders';
    protected $fillable = ['appiontment_id'];
}
