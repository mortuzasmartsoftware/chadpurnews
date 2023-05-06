<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = 'sub_category';
    protected $guarded = [];

    function category()
    {
        return $this->belongsTo(Category::class,'fk_category_id');
    }


    function news()
    {
        return $this->hasMany(News::class,'fk_sub_category_id');
    }











    function relationtocategory(){
        return $this->belongsTo(Category::class,'fk_category_id');
    }

}
