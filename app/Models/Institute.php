<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    use HasFactory;
    protected $table = 'institutes';
    protected $primaryKey = 'id';

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'shortname', 'likecount', 'contact_no','email', 'admin_email', 'year_of_inception', 'website', 'hospital','placement', 'food_availablity', 'wifi', 'library', 'scholarships','address', 'how_to_reach', 'ownership_type', 'state_id', 'city',
        'course_id', 'album_id', 'brouchure'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            $model->setAttribute($model->getKeyName(), Uuid::uuid4());
        });
    }

}
