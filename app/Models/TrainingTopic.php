<?php

namespace App\Models;

use App\Models\CourseCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingTopic extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en',
        'name_fr',
        'description_en',
        'description_fr',
        'url_tag',
    ];

    public function courseCartegoty()
    {
        return $this->hasMany(CourseCategory::class,'training_topic_id');
    }
}
