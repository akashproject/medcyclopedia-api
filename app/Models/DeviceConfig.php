<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceConfig extends Model
{
    use HasFactory;
    protected $table = 'device_config';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','type','value','price',
    ];
}
