<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','user_id','product_id','variation_type','device_condition','service_no','amount','payment_mode','pickup_schedule','address_id','pickup_address','pickup_city','pickup_state','pincode','created_at','status','reason'
    ];
}
