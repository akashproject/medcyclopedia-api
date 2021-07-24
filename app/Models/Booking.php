<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
	protected $table = 'booking';
    protected $primaryKey = 'id';

    protected $fillable = [
        'date','time','media','language','order_id','payment_id','payment_status'
    ];
}
