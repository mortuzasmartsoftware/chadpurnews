<?php

namespace App\Http\Controllers;

use App\Models\AllMedia;
use App\Models\MediaCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AllMediaShowController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX METHOD
    |--------------------------------------------------------------------------
    */
    public function index()
    {

        $mediaWithCategories = MediaCategory::with(['all_medias' => function ($q) {

                $q->where('status', 1)
                ->select('id', 'fk_category_id', 'media_name', 'media_link', 'photo')
                ->orderBy('serial_number', 'ASC');

            }])->where('status', 1)->select('id', 'category_name')->get();



    	Session::put('title_msg','All Bangla Newspaper & Media  List');
        Session::put('metaDescription','All Bangla Newspapaers by Category such as National, Online, Sharenews, International, Print, Business, IT  Energy-news etc. Newspapers like Prothom Alo, Bdnews24.com, Banglanews24.com, Sharenews24.com, BBC Bangla, Bangladesh Pratidin, Kaler Kantho, Ittefaq, Amardesh, Samakal, Amader Shomoys, Daily Naya Diganta, Daily Inqilab, Manab Zamin, Jai Jai Din, Jugantor etc. are in One Page.');
        Session::put('keywords','All Bangla Newspapaers by Category such as National, Online, Sharenews, International, Print, Business, IT  Energy-news etc. Newspapers like Prothom Alo, Bdnews24.com, Banglanews24.com, Sharenews24.com, BBC Bangla, Bangladesh Pratidin, Kaler Kantho, Ittefaq, Amardesh, Samakal, Amader Shomoys, Daily Naya Diganta, Daily Inqilab, Manab Zamin, Jai Jai Din, Jugantor etc. are in One Page.');

        return view('frontend.allMedia',compact('mediaWithCategories'));

    }

    /*
    |--------------------------------------------------------------------------
    | CATEGORY METHOD
    |--------------------------------------------------------------------------
    */
    public function category($id){

        $category = MediaCategory::findOrFail($id);

        if($category==null){
            return redirect()->back();
        }
        $allMedia = AllMedia::where('status',1)->where('fk_category_id',$id)->select('id', 'fk_category_id', 'media_name', 'media_link', 'photo')->get();

        Session::put('title_msg',$category->category_name);
        Session::put('metaDescription',$category->category_name);

        return view('frontend.categoryMedia',compact('category','allMedia'));
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW METHOD
    |--------------------------------------------------------------------------
    */
    public function show(Request $request){
        $data = AllMedia::where('media_link',$request->url)->first();
        if($data==null){
           return redirect()->back();
        }
        Session::put('title_msg',$data->media_name);
         Session::put('metaDescription',$data->media_name);
        return view('frontend.mediaShow',compact('data'));
    }
}
