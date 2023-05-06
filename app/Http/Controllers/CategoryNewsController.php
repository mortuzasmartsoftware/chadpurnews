<?php

namespace App\Http\Controllers;

use App\Models\AboutCompany;
use App\Models\AdsManagement;
use App\Models\Category;
use App\Models\News;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryNewsController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | INDEX METHOD
    |--------------------------------------------------------------------------
    */
    public function index($link)
    {
        $category = Category::where('link', $link)->first();
        if ($category == null) {
            return redirect()->back();
        }
        $cat_id = $category->id;



        $subcategory = SubCategory::where('status', '1')->where('fk_category_id', $cat_id)->get();

        $allData = News::where('status', '1')
            ->where('fk_category_id', $cat_id)
            ->orderBy('id', 'DESC')

            ->paginate(30);



        $info = AboutCompany::first();
        Session::put('title_msg', $info->comapny_name . "$category->name");




        $popular_news = News::where('status', 1)->orderBy('hit_counter', 'DESC')->where('fk_category_id', $cat_id)->paginate(20);

        $ads_manages = AdsManagement::where('status', 1)->where('position_id', 2)->get();




        return view('frontend.category-news', compact('category', 'subcategory', 'allData', 'popular_news', 'ads_manages'));
    }

    /*
    |--------------------------------------------------------------------------
    | SUB CATEGORY NEWS METHOD
    |--------------------------------------------------------------------------
    */


    public function sub_category_news($cat_link, $sub_link)
    {
        $category = Category::where('link', $cat_link)->first();
        $subcategory = SubCategory::where('status', '1')->where('link', $sub_link)->first();
        if ($subcategory == null) {
            return redirect()->back();
        }
        $cat_id = $category->id;
        $sub_cat_id = $subcategory->id;

        $allData = News::where('status', '1')->where('fk_sub_category_id', $sub_cat_id)->orderBy('id', 'DESC')->paginate(10);
        // return $allData;
        // die();

        $popular_news = News::where('status', 1)->orderBy('hit_counter', 'DESC')->where('fk_sub_category_id', $sub_cat_id)->paginate(5);
        $info = AboutCompany::first();
        Session::put('title_msg', $info->comapny_name . "$subcategory->name");

        $ads_manages = AdsManagement::where('status', 1)->where('position_id', 3)->get();

        return view('frontend.sub-category-news', compact('category', 'subcategory', 'allData', 'popular_news', 'ads_manages'));
    }


    /*
    |--------------------------------------------------------------------------
    | SEARCH METHOD
    |--------------------------------------------------------------------------
    */

    public function search(Request $request)
    {
        $result = $request->search;
        $allData = News::where('status', '1')
            ->where('title', 'like', "%$result%")
            ->orwhere('short_description', 'like', "%$result%")
            ->orderBy('id', 'DESC')

            ->paginate(10);

        $popular_news = News::where('status', 1)->orderBy('hit_counter', 'DESC')->paginate(5);
        $ads1 = AdsManagement::where('status', 1)->where('position_id', 6)->where('serial_num', 1)->first();
        $ads2 = AdsManagement::where('status', 1)->where('position_id', 6)->where('serial_num', 2)->first();

        return view('frontend.search', compact('allData', 'popular_news', 'ads1', 'ads2'));
    }
}
