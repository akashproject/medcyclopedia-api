<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsEvent extends Model
{
    use HasFactory;
	protected $table = 'newsevents';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title','description','venue','date','time'
    ];
}
