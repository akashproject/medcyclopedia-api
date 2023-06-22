<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    use HasFactory;
    protected $table = 'conditions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','icon','category_id','condition','deducted_amount','brand_id','extra_deducted_amount'
    ];
}
