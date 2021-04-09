<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'short_description', 'category_id', 'subcategories_id'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id')->withDefault();
    }
}
