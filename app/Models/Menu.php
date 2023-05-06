<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $guarded = [];


    
    // function relationtocategory(){
    //     return $this->hasOne(Category::class,'id','fk_category_id');
    // }
}
