<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    use HasFactory;
    protected $table = 'accessories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','icon','category_id','name','deducted_amount','brand_id','extra_deducted_amount'
    ];
}
