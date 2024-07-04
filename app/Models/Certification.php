<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certification extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en',
        'name_fr',
        'description_en',
        'description_fr',
        'url_tag',
        'fees_euro',
        'fees_fcfa',
        'fees_description_en',
        'fees_description_fr',
        'tax',//en pourcentage(%)
    ];

    public function course()
    {
        return $this->hasMany(Course::class,'certification_id');
    }

}
