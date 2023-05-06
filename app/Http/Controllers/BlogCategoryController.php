<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading Category
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('backend.blog_category.index',[
            'all_adds'=> BlogCategory::all(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating Category
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('backend.blog_category.create');
    }

    /*
    |--------------------------------------------------------------------------
    | Store Method for Storing the data into Category
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:category',
            'serial_num' => 'required',
        ]);

        BlogCategory::insert([
            'name'=> $request->name,
            'serial_num'=> $request->serial_num,
            'status'=> $request->status,
            'created_at'=> Carbon::now(),
        ]);
        return back()->with('success','Added Successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Method for Edit the Category
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        return view('backend.blog_category.edit',[
            'target_ads'=> BlogCategory::find($id),
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
            'name' => 'required',
        ]);

        BlogCategory::find($id)->update([
            'name'=> $request->name,
            'serial_num'=> $request->serial_num,
            'status'=> $request->status,
        ]);
        return back()->with('success','Updated Successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $smart_move = BlogCategory::find($id);
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
        if (BlogCategory::find($id)->status == 0) {
            BlogCategory::find($id)->update([
                'status'=> 1
            ]);
        } else {
            BlogCategory::find($id)->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Status Changed!');
    }
}
