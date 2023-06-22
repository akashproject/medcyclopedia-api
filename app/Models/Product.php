<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','brand_id','category_id','series_id','name','slug','image','variant','type','max_price'
    ];
}
