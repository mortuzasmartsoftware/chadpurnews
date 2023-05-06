<?php

namespace App\Http\Controllers;

use App\Models\AboutCompany;
use App\Models\AdsManagement;
use App\Models\News;
use App\Models\Category;
use App\Models\SubCategory;
use App\Traits\FileSaver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    use FileSaver;

    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading Category
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('backend.news.index', [
            'all_adds'  => News::latest()->paginate(15),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating Category
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('backend.news.create', [
            'category_infos'    => Category::all(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Store Method for Storing the data into Category
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {

        $request->validate([
            'title'             => 'required|max:200',
            'link'              => 'required|max:70|unique:news',
            'fk_category_id'    => 'required',
            'short_description' => 'required|max:200',
            'description'       => 'required',
            'photo'             => 'required',
        ]);

        // check if a user login or not
        if (is_null(auth()->id())) {
            $logged_id = 0; //user is not login
        } else {
            $logged_id = auth()->id();  //user is loged in
        }

        // dd($logged_id);
        try {
            $model = News::create([
                'title'                 => $request->title,
                'link'                  => $request->link,
                'fk_category_id'        => $request->fk_category_id,
                'fk_sub_category_id'    => $request->fk_sub_category_id,
                'short_description'     => $request->short_description ?? NULL,
                'description'           => $request->description ?? NULL,
                'is_featured'           => $request->is_featured == 'on' ? 1 : 0,
                'is_not_home'           => $request->is_not_home == 'on' ? 1 : 0,
                'is_slider'             => $request->is_slider == 'on' ? 1 : 0,
                'tags'                  => $request->tags,
                'status'                => $request->status == 'on' ? 1 : 0,
                'publish_status'        => $request->publish_status == 'on' ? 1 : 0,
                'created_by'            => $logged_id,
                'photo'                 => 'default.jpg',
                'video_link'            => $request->video_link,
                'quote'                 => $request->quote,
                'whose_quote'           => $request->whose_quote,
            ]);

            $this->uploadFileWithResize($request->photo, $model, 'photo', 'uploads/news', 470, 365);

            return back()->with('success', 'Data Added Successfully');
        } catch (\Exception $ex) {
            return redirect()->back()->withError($ex->getMessage());
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Method for Edit the Category
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $data['news']               = News::find($id);
        $data['categories']         = Category::all();
        $data['subcategories']      = SubCategory::all();

        // dd($data);
        return view('backend.news.edit', $data);
    }

    /*
    |--------------------------------------------------------------------------
    | Update Method for Updating Category
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {

        $request->validate([
            'title'             => 'required|max:255',
            'link'              => 'required|max:70',
            'short_description' => 'required|max:255',
            'description'       => 'required',

        ]);

        // check if a user login or not
        if (is_null(auth()->id())) {
            $logged_id = 0; //user is not login
        } else {
            $logged_id = auth()->id(); //user is loged in
        }

        try {
            $model = News::find($id);
            if ($request->file('photo') != NULL) {
                $model->update([
                    'title'                 => $request->title,
                    'link'                  => $request->link,
                    'fk_category_id'        => $request->fk_category_id,
                    'fk_sub_category_id'    => $request->fk_sub_category_id,
                    'short_description'     => $request->short_description ?? NULL,
                    'description'           => $request->description ?? NULL,
                    'is_featured'           => $request->is_featured == 'on' ? 1 : 0,
                    'is_not_home'           => $request->is_not_home == 'on' ? 1 : 0,
                    'is_slider'             => $request->is_slider == 'on' ? 1 : 0,
                    'tags'                  => $request->tags,
                    'status'                => $request->status == 'on' ? 1 : 0,
                    'publish_status'        => $request->publish_status == 'on' ? 1 : 0,
                    'updated_by'            => $logged_id,
                    'photo'                 => $model->photo,
                    'video_link'            => $request->video_link,
                    'quote'                 => $request->quote,
                    'whose_quote'           => $request->whose_quote,
                ]);

                $this->uploadFileWithResize($request->photo, $model, 'photo', 'uploads/news', 470, 365);
            } else {
                $model->update([
                    'title'                 => $request->title,
                    'link'                  => $request->link,
                    'fk_category_id'        => $request->fk_category_id,
                    'fk_sub_category_id'    => $request->fk_sub_category_id,
                    'short_description'     => $request->short_description ?? NULL,
                    'description'           => $request->description ?? NULL,
                    'is_featured'           => $request->is_featured == 'on' ? 1 : 0,
                    'is_not_home'           => $request->is_not_home == 'on' ? 1 : 0,
                    'is_slider'             => $request->is_slider == 'on' ? 1 : 0,
                    'tags'                  => $request->tags,
                    'status'                => $request->status == 'on' ? 1 : 0,
                    'publish_status'        => $request->publish_status == 'on' ? 1 : 0,
                    'updated_by'            => $logged_id,
                    'video_link'            => $request->video_link,
                    'quote'                 => $request->quote,
                    'whose_quote'           => $request->whose_quote,
                ]);
            }


            return back()->with('success', 'Data Edited Successfully');
        } catch (\Exception $ex) {
            return redirect()->back()->withError($ex->getMessage());
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $smart_move = News::find($id);
        $smart_move->update([
            'status' => 0,
        ]);
        $smart_move->delete();
        return back()->with('deleted', 'Deleted!');
    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function change_status($id)
    {
        $news = News::find($id);
        if ($news->status == 0) {
            $news->update([
                'status' => 1
            ]);
        } else {
            $news->update([
                'status' => 0
            ]);
        }
        return back()->with('success', 'Status Changed!');
    }

    /*
    |--------------------------------------------------------------------------
    | Get Sub Category Method for getting sub Category info
    |--------------------------------------------------------------------------
    */
    public function getsubcat_method(Request $request)
    {
        $show_cat = "<option value=''>-Select a Sub Category-</option>";
        foreach (SubCategory::where('fk_category_id', $request->catx_id)->get(['id', 'name']) as $subcat_data) {
            $show_cat .= "<option value='$subcat_data->id'>$subcat_data->name</option>";
        }

        echo $show_cat;
    }

    /*
    |--------------------------------------------------------------------------
    | NEWS Details Method for article
    |--------------------------------------------------------------------------
    */

    public function news_details($id, $link)
    {
        
        $news_details = News::where('link', $link)->first();
        $data = array();
        $data['hit_counter'] = $news_details->hit_counter + 1;
        $news_details = News::where('link', $link)->update($data);

        $news_details = News::leftJoin('category', 'news.fk_category_id', 'category.id')

            ->leftJoin('sub_category', 'news.fk_sub_category_id', 'sub_category.id')
            ->leftJoin('users', 'news.created_by', 'users.id')
            ->select('category.name as cat_name', 'category.id as category_id', 'news.*', 'users.id as user_id', 'users.name as admin_name', 'sub_category.name as sub_cat_name')
            ->where('news.link', $link)


            ->first();
        if ($news_details == null) {
            return redirect()->back();
        }
        $category_id = $news_details->category_id;

        $related_news = News::where('fk_category_id', $category_id)->where('status', 1)->orderby('id', 'DESC')->paginate(10);
        $popular_news = News::where('status', 1)->orderBy('hit_counter', 'DESC')->where('fk_category_id', $category_id)->paginate(5);
        //title message
        $info = AboutCompany::first();
        Session::put('title_msg', $news_details->title);
        Session::put('metaDescription', $news_details->short_description);
        Session::put('tags', $news_details->tags);

        $singleTitle = $news_details->title . " |  Daily Chandpur Sangbad ";
        $ogImage = $news_details->photo;

        $ads_manages = AdsManagement::where('status', 1)->where('position_id', 4)->get();

        return view('frontend.article', compact('news_details', 'related_news', 'popular_news', 'ads_manages', 'singleTitle', 'ogImage'));
    }
}
