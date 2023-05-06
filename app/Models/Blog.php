<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';
    protected $guarded = [];



    function relationtocategory(){
        return $this->hasOne(Category::class,'id','category');
    }



    function category(){
        return $this->belongsTo(Category::class, 'category');
    }

}
