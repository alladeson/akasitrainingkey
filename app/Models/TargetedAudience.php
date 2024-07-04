<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TargetedAudience extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'description_en',
        'description_fr',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
