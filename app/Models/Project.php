<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'title',
        'description',
        'short_description',
    ];

    // public function SubCategory()
    // {
    //  return $this->belongsTo(SubCategory::class);
    // }

    // public function ProjectImage()
    // {
    //  return $this->hasMany(ProjectImage::class,'id','project_id');
    // }

    
}
