<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en',
        'name_fr',
        'description_en',
        'description_fr',
        'url_tag',
    ];
    public function course()
    {
        return $this->hasMany(Course::class,'vendor_id');
    }

}
