<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'calculation_question';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','category_id','question','description','deducted_amount'
    ];
}
