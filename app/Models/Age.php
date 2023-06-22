<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    use HasFactory;
    protected $table = 'ages';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','category_id','age','deducted_amount','brand_id','extra_deducted_amount'
    ];
}
