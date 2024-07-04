<?php

namespace App\Models;

use App\Models\Course;
use App\Models\TrainingTopic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en',
        'name_fr',
        'description_en',
        'description_fr',
        'url_tag',
        'training_topic_id',
    ];

    public function trainingTopic()
    {
        return $this->belongsTo(TrainingTopic::class, 'training_topic_id');
    }

    public function course()
    {
        return $this->hasMany(Course::class,'category_id');
    }


}
