<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagePhoto extends Model
{
    use HasFactory;

    protected $table = 'page_photo';
    protected $guarded = [];


    function relationtopage(){
        return $this->hasOne(Page::class,'id','fk_page_id');
    }

}
