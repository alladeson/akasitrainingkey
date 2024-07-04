<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'number',
        'file_path',
        'receipt_number',
        'student_id',
        'total_amount',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
