<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Traits\FileSaver;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use FileSaver;
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading Category
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('backend.blog.index',[
            'all_adds'=> Blog::all(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating Category
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('backend.blog.create',[
            'category_infos'=> BlogCategory::where('status',1)->get(),
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
            'title' => 'required|max:100',
            'short_description' => 'required|max:120',
            'description' => 'required',
            'category' => 'required',
            'photo' => 'required|image|Max:1000',
        ]);

        try {
            $model = Blog::create([
                'title'=> $request->title,
                'short_description'=> $request->short_description,
                'link'=> $request->link,
                'category'=> $request->category,
                'description'=> $request->description,
                'status'=> $request->status,
                'hit_count'=> $request->hit_count,
                'is_apporved'=> $request->is_apporved,
                'apporved_by'=> $request->apporved_by,
                'created_by'=> $request->created_by,
                'updated_by'=> $request->updated_by,
                'photo'=> 'default.jpg',
            ]);

            $this->upload_file($request->photo, $model, 'photo', 'uploads/blog');
           return back()->with('success','Data Added Successfully');

        } catch(\Exception $ex) {
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
        return view('backend.blog.edit',[
            'target_ads'=> Blog::find($id),
            'category_infos'=> BlogCategory::where('status',1)->get(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Update Method for Updating Category
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:100',
            'short_description' => 'required|max:200',
            'description' => 'required',

        ]);
        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'image|Max:1000',
            ]);
        }
        try {
            $model = Blog::find($id);

            $model->update([
                'title'=> $request->title,
                'short_description'=> $request->short_description,
                'link'=> $request->link,
                'category'=> $request->category,
                'description'=> $request->description,
                'status'=> $request->status,
                'hit_count'=> $request->hit_count,
                'is_apporved'=> $request->is_apporved,
                'apporved_by'=> $request->apporved_by,
                'created_by'=> $request->created_by,
                'updated_by'=> $request->updated_by,
                'photo'=> $model->photo,
            ]);

            $this->upload_file($request->photo, $model, 'photo', 'uploads/blog');

           return back()->with('success','Data Edited Successfully');

        } catch(\Exception $ex) {
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
        $smart_move = Blog::find($id);
        $smart_move->update([
            'status'=> 0,
        ]);
        $smart_move->delete();
        return back()->with('deleted','Deleted!');
    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function change_status($id)
    {
        if (Blog::find($id)->status == 0) {
            Blog::find($id)->update([
                'status'=> 1
            ]);
        } else {
            Blog::find($id)->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Status Changed!');
    }
}
