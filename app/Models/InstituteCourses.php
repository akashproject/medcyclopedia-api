<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituteCourses extends Model
{
    use HasFactory;
    protected $table = 'institute_course';
    protected $primaryKey = 'id';

    protected $fillable = [
        'course_name', 'eligibility', 'duration', 'seat', 'last_enrolment_date','fee', 'course_id', 'institute_id'
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            $model->setAttribute($model->getKeyName(), Uuid::uuid4());
        });
    }
}
