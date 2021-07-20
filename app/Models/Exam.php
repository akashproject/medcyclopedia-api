<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table = 'exams';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title','description','application_procedure','course_id','subject_marking','time','duration','fees','cutofflastyear','important_date_current_year','link','important_date_last_year'
    ];
}
