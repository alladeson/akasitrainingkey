<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncludedMaterial extends Model
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
