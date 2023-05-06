<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllMedia extends Model
{
    use HasFactory;

    protected $table = 'all_media';
    protected $guarded = [];



    // function relationtocategory(){
    //     return $this->hasOne(Category::class,'id','fk_category_id');
    // }



    function media_category() {
        return $this->belongsTo(MediaCategory::class,'fk_category_id');
    }



    function mediacategory() {
        return $this->belongsTo(MediaCategory::class,'id');
    }

    function relationtomediacategory(){
        return $this->belongsTo(MediaCategory::class,'id', 'fk_category_id');
    }
}
