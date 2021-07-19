<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'countries';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name','code','currency','medicaleducation','about','place_of_attraction','food_hobbits','culture','weather','how_to_reach'
    ];
}
