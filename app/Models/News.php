<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $guarded = [];


    function category()
    {
        return $this->belongsTo(Category::class,'fk_category_id');
    }

    function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'fk_sub_category_id');
    }

    function relationtocategory(){
        return $this->hasOne(Category::class,'id','fk_category_id');
    }


    function relationtoSubCategory(){
        return $this->hasOne(SubCategory::class,'id','fk_sub_category_id');
    }
}
