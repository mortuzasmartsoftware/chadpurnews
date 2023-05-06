<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsPlacement extends Model
{
    use HasFactory;

    protected $table = 'ads_placements';
    protected $guarded = [];

    //Relationships
    public function ads_position(){
        return $this->belongsTo(AdsPosition::class);
    }

    public function ads_serial(){
        return $this->belongsTo(AdsSerial::class);
    }
}
