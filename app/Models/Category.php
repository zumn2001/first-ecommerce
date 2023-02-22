<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }

}
