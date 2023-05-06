<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading Category
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('backend.menu.index',[
            'all_adds'=> Menu::all(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating Category
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('backend.menu.create');
    }

    /*
    |--------------------------------------------------------------------------
    | Store Method for Storing the data into Category
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|unique:menu,name',
            'url' => 'required|unique:menu,url',
        ]);

        try {
            Menu::insert([
                'name'=> $request->name,
                'url'=> $request->url,
                'serial_num'=> $request->serial_num,
                'status'=> $request->status == 'on' ? 1 : 0,
                'created_at'=> Carbon::now(),
            ]);
            return back()->with('success','Menu Added Successfully');
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
        return view('backend.menu.edit',[
            'target_ads'=> Menu::find($id),
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
            Menu::find($id)->update([
                'name'=> $request->name,
                'url'=> $request->url,
                'serial_num'=> $request->serial_num,
                'status'=> $request->status == 'on' ? 1 : 0,
            ]);
            return back()->with('success','Menu Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
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
            $smart_move = Menu::find($id);
            $smart_move->update([
                'status'=> 0,
            ]);
            $smart_move->delete();
            return back()->with('deleted','Menu position Deleted!');
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
        $menu = Menu::find($id);
        if ($menu->status == 0) {
            $menu->update([
                'status'=> 1
            ]);
        } else {
            $menu->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Menu Status Changed!');
    }

}
