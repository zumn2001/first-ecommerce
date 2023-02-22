<?php

namespace App\Models;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function category() 
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory() 
    {
        return $this->belongsTo(SubCategory::class);
    }
   
}
