<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaCategory extends Model
{
    use HasFactory;

    protected $table = 'media_categories';
    protected $guarded = [];


    function relationtocategory(){
        return $this->hasOne(Category::class,'id','fk_category_id');
    }


    function all_medias() {
        return $this->hasMany(AllMedia::class, 'fk_category_id');
    }

}
