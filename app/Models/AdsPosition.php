<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsPosition extends Model
{
    use HasFactory;

    protected $table = 'ads_position';
    protected $guarded = [];

    function ads_management(){
        return $this->hasMany(AdsManagement::class,'position_id');
    }
}
