<?php

namespace App\Http\Controllers;

use App\Models\AdsManagement;
use App\Models\News;

class ArchiveController extends Controller
{
    public function index($date)
    {
    	$newDate=date('Y-m-d',strtotime($date));
    	$datenews=News::where('status',1)->whereDate('created_at',$newDate)->paginate(10);
    	$popular_news=News::where('status',1)->orderby('hit_counter','DSC')->paginate(5);

    	$ads_manages = AdsManagement::where('status',1)->where('position_id',5)->get();

    	return view('frontend.archive',compact('datenews','newDate','popular_news','ads_manages'));

    }
}
