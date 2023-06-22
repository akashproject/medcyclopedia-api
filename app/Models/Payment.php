<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','user_id','bank_name','account_no','account_holder_name','ifsc_code','upi_id','online_payment_no'
    ];
}
