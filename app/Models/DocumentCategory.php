<?php

namespace App\Models;

use App\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',

    ];
     public function document()
    {
        return $this->hasMany(Document::class,'document_category_id');
    }
}
