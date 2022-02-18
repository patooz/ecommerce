<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name_en',
        'category_name_swa',
        'category_slug_en',
        'category_slug_swa',
        'category_icon',
    ];

    /**
     * Get the subcategory associated with the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function subcategory(): HasOne
    {
        return $this->hasOne(Subcategory::class);
    }

}
