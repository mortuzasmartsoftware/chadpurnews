<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsManagement extends Model
{
    use HasFactory;

    protected $table = 'ads_management';
    protected $guarded = [];

    function ads_position(){
        return $this->belongsTo(AdsPosition::class, 'position_id');
    }

    function ads_serial(){
        return $this->belongsTo(AdsSerial::class, 'serial_num');
    }
}
