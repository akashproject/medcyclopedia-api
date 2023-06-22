<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductConfigPrice extends Model
{
    use HasFactory;
    protected $table = 'product_config_price';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','product_id','config_id','price'
    ];
}
