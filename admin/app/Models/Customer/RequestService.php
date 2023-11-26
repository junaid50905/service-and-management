<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestService extends Model
{
    use HasFactory;
    protected $table = 'service_requests';
    protected $fillable = ['user_id', 'usertype', 'sold_product_id', 'status'];
}
