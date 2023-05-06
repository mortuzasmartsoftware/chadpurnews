<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\SubMenu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubMenuController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading Category
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('backend.submenu.index',[
            'all_adds'=> SubMenu::all(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating Category
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('backend.submenu.create',[
            'menu_infos' => Menu::where('status',1)->get(),
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
            'name'=> 'required|unique:sub_menu,name',
            'url' => 'required|unique:sub_menu,url',
        ]);
        try {
            SubMenu::insert([
                'name'=> $request->name,
                'url'=> $request->url,
                'fk_menu_id'=> $request->fk_menu_id,
                'serial_num'=> $request->serial_num,
                'status'=> $request->status == 'on' ? 1 : 0,
                'created_at'=> Carbon::now(),
            ]);
            return back()->with('success','Sub Menu Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error'. $th->getMessage);
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Edit Method for Edit the Category
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        return view('backend.submenu.edit',[
            'target_ads'=> SubMenu::find($id),
            'menu_infos'=> Menu::all(),
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
            'name'=> 'required',
            'url' => 'required',
        ]);
        try {
            SubMenu::find($id)->update([
                'name'=> $request->name,
                'url'=> $request->url,
                'fk_category_id'=> $request->fk_category_id,
                'serial_num'=> $request->serial_num,
                'status'=> $request->status == 'on' ? 1 : 0,
            ]);
            return back()->with('success','SubCategory Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error'. $th->getMessage);
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
            $smart_move = SubMenu::find($id);
            $smart_move->update([
                'status'=> 0,
            ]);
            $smart_move->delete();
            return back()->with('deleted','Sub Category Deleted!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error'. $th->getMessage);

        }

    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function change_status($id)
    {
        $sub_menu = SubMenu::find($id);

        if ($sub_menu->status == 0) {
            $sub_menu->update([
                'status'=> 1
            ]);
        } else {
            $sub_menu->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Sub Category Status Changed!');
    }
}
