<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellRequest extends Model
{
    use HasFactory;
    protected $table = 'sell_request';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','username','mobile','alt_mobile','email','category_id','brand_id','name','ram','storage','question_id'
    ];
}
