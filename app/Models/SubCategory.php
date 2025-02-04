<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'title',
        'image',
    ];
    public function subCat()
    {
     return $this->hasMany(Project::class,'subcategory_id');
    }
   
}

