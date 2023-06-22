<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleVariation extends Model
{
    use HasFactory;
    protected $table = 'vehicle_variation';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','category_id','type','name',
    ];
}
