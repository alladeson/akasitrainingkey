<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;

    const status_draft = 'draft';
    const status_published = 'published';
    protected $fillable = [
        'course_id',
        'started_date',
        'end_date',
        'started_time',
        'end_time',
        'location_en',
        'location_fr',
        'status',
        'published',
        'time_zone',
        'description_en',
        'description_fr',
        'amount_euro',
        'amount_fcfa',
        'tax',//en pourcentage(%)
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function order()
    {
        return $this->hasMany(Order::class,'schedule_id');
    }
}
