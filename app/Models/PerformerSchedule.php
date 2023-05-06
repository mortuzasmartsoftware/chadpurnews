<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformerSchedule extends Model
{
    use HasFactory;

    protected $table = 'performer_schedule';
    protected $guarded = [];


    
    function relationtoEvent(){
        return $this->hasOne(Event::class,'id','fk_event_id');
    }
}
