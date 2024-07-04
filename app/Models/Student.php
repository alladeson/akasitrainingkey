<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use App\Models\EnrolledCourse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'address_en',
        'address_fr',
        'phone',
        'biography_en',
        'biography_fr',
        'occupation_en',
        'occupation_fr',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function enrolledCourse()
    {
        return $this->hasMany(EnrolledCourse::class,'student_id');
    }

    public function order()
    {
        return $this->hasMany(Order::class,'student_id');
    }
}
