<?php

namespace App\Models;

use App\Http\Traits\CreatedUpdatedBy;
use App\Models\Order;
use App\Models\Vendor;
use App\Models\Schedule;
use App\Models\Wishlist;
use App\Models\CourseGoal;
use App\Models\Instructor;
use App\Models\PreRequisite;
use App\Models\Certification;
use App\Models\CourseCategory;
use App\Models\TargetedAudience;
use App\Models\IncludedMaterial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory, CreatedUpdatedBy;

    // Level options
    const level1_en = 'Beginner';
    const level1_fr = 'Débutant';
    const level2_en = 'Intermediate';
    const level2_fr = 'Intermédiaire';
    const level3_en = 'Expert';
    const level3_fr = 'Expert';
    // Status options
    const status_draft_en = 'draft';
    const status_new_en = 'new';
    const status_popularity_en = 'popularity';
    const status_draft_fr = 'brouillon';
    const status_new_fr = 'nouveau';
    const status_popularity_fr = 'populaire';
    protected $fillable = [
        'code',
        'name_en',
        'name_fr',
        'description_en',
        'description_fr',
        'url_tag',
        'level_en',
        'level_fr',
        'duration_en',
        'duration_type',
        'duration_number',
        'duration_fr',
        'after_course',
        'learning_mode_en',
        'learning_mode_fr',
        'price_euro',
        'price_fcfa',
        'status_en',
        'status_fr',
        'published',
        'instructor_id',
        'category_id',
        'certification_id',
        'vendor_id',
    ];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }

    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'category_id');
    }

    public function certification()
    {
        return $this->belongsTo(Certification::class, 'certification_id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function courseGoal()
    {
        return $this->hasMany(CourseGoal::class,'course_id');
    }

    public function enrolledCourse()
    {
        return $this->hasMany(EnrolledCourse::class,'course_id');
    }

    public function order()
    {
        return $this->hasMany(Order::class,'course_id');
    }

    public function preRequisite()
    {
        return $this->hasMany(PreRequisite::class,'course_id');
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class,'course_id');
    }

    public function targetedAudience()
    {
        return $this->hasMany(TargetedAudience::class,'course_id');
    }
    public function IncludedMaterial()
    {
        return $this->hasMany(IncludedMaterial::class,'course_id');
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class,'course_id');
    }
}
