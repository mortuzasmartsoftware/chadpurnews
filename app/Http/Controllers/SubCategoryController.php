<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading Category
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        
        return view('backend.subcategory.index',[
            'all_adds' => SubCategory::all(),
            // 'cat_name' => Category::select('name')->where($all_adds->fk_category_id,'id'),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating Category
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('backend.subcategory.create',[
            'category_infos'=> Category::where('status',1)->get(),
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
            'fk_category_id'=> 'required',
            'name'          => 'required|unique:sub_category',
            'link'          => 'required|unique:sub_category',
            'serial_num'    => 'required|numeric',
        ]);

        try {
            SubCategory::insert([
                'name'          => $request->name,
                'link'          => $request->link,
                'fk_category_id'=> $request->fk_category_id,
                'serial_num'    => $request->serial_num,
                'status'        => $request->status== 'on' ? 1 : 0,
                'created_at'    => Carbon::now(),
            ]);
            return back()->with('success','Sub Category Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Edit Method for Edit the Category
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        return view('backend.subcategory.edit',[
            'target_ads'=> SubCategory::find($id),
            'category_infos'=> Category::all(),
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
            'fk_category_id'=> 'required',
            'name'          => 'required',
            'link'          => 'required',
            'serial_num'    => 'required|numeric',
        ]);
        try {
            SubCategory::find($id)->update([
                'name'          => $request->name,
                'link'          => $request->link,
                'fk_category_id'=> $request->fk_category_id,
                'serial_num'    => $request->serial_num,
                'status'        => $request->status == 'on' ? 1 : 0,
            ]);
            return back()->with('success','Sub Category Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        try {
            $smart_move = SubCategory::find($id);
            $smart_move->update([
                'status'=> 0,
            ]);
            $smart_move->delete();
            return back()->with('deleted','Sub Category Deleted!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function change_status($id)
    {
        if (SubCategory::find($id)->status == 0) {
            SubCategory::find($id)->update([
                'status'=> 1
            ]);
        } else {
            SubCategory::find($id)->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Sub Category Status Changed!');
    }
}
