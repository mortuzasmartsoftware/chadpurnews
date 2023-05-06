<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsSerial extends Model
{
    use HasFactory;

    protected $table = 'ads_serials';
    protected $guarded = [];

    function ads_management(){
        return $this->hasMany(AdsManagement::class,'serial_num');
    }
}
