<?php

namespace App\Http\Controllers;

use App\Models\SubMenu;
use App\Models\SubSubMenu;
use Illuminate\Http\Request;
use App\Traits\FileSaver;

class SubSubMenuController extends Controller
{
    use FileSaver;

    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading Category
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('backend.sub-sub-menu.index',[
            'all_adds'=> SubSubMenu::all(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating Category
    |--------------------------------------------------------------------------
    */
    public function create()
    {

        return view('backend.sub-sub-menu.create',[
            'infos'=> SubMenu::all(),
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
            'name'=> 'required|unique:sub_sub_menu,name',
            'url' => 'required|unique:sub_sub_menu,url',
        ]);
        try {
            SubSubMenu::create([
                'name'=> $request->name,
                'url'=> $request->url,
                'status'=> $request->status == 'on' ? 1 : 0,
                'serial_num'=> $request->serial_num,
                'fk_sub_menu_id'=> $request->fk_sub_menu_id,
            ]);
           return back()->with('success','Data Added Successfully');
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
        return view('backend.sub-sub-menu.edit',[
            'target_ads'=> SubSubMenu::find($id),
            'infos'=> SubMenu::all(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Update Method for Updating Category
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {

        try {
            $page = SubSubMenu::find($id);

            $request->validate([
                'name'=> 'required',
                'url' => 'required',
            ]);
            $page->update([
                'name'=> $request->name,
                'url'=> $request->url,
                'status'=> $request->status == 'on' ? 1 : 0,
                'serial_num'=> $request->serial_num,
                'fk_sub_menu_id'=> $request->fk_sub_menu_id,
            ]);

           return back()->with('success','Data Added Successfully');

        } catch(\Exception $ex) {
            return back()->with('error','Operation Unsuccessful');
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
            $smart_move = SubSubMenu::find($id);
            $smart_move->update([
                'status'=> 0,
            ]);
            $smart_move->delete();
            return back()->with('deleted','Deleted!');
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
        $subsub_menu = SubSubMenu::find($id);

        if ($subsub_menu->status == 0) {
            $subsub_menu->update([
                'status'=> 1
            ]);
        } else {
            $subsub_menu->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Status Changed!');
    }
}
