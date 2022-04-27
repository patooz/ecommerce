<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];


    /**
     * Get the user associated with the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function subcategories(): HasOne
    {
        return $this->hasOne(Subcategory::class, 'pro_id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }

    public function brands()
    {
        return $this->belongsTo(Brand::class,'brand_id', 'id');
    }



}


