<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SocialLinksController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading Category
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('backend.social-links.index',[
            'all_adds'=> SocialLink::all(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating Category
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('backend.social-links.create');
    }

    /*
    |--------------------------------------------------------------------------
    | Store Method for Storing the data into Category
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'link' => 'required|url',
            'icon_class' => 'required',
        ]);

        try {
            SocialLink::insert([
                'name'=> $request->name,
                'link'=> $request->link,
                'serial_num'=> $request->serial_num,
                'status'=> $request->status == 'on' ? 1 : 0,
                'icon_class'=> $request->icon_class,
                'created_at'=> Carbon::now(),
            ]);
            return back()->with('success',' Added Successfully');
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
        return view('backend.social-links.edit',[
            'target_ads'=> SocialLink::find($id),
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
            'link' => 'required|url',
            'icon_class' => 'required',
        ]);

        try {
            SocialLink::find($id)->update([
                'name'=> $request->name,
                'link'=> $request->link,
                'serial_num'=> $request->serial_num,
                'status'=> $request->status == 'on' ? 1 : 0,
                'icon_class'=> $request->icon_class,
            ]);
            return back()->with('success',' Updated Successfully');
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
            $smart_move = SocialLink::find($id);
            $smart_move->update([
                'status'=> 0,
            ]);
            $smart_move->delete();
            return back()->with('deleted','Ads position Deleted!');
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
        $social_link = SocialLink::find($id);

        if ($social_link->status == 0) {
            $social_link->update([
                'status'=> 1
            ]);
        } else {
            $social_link->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Ads Status Changed!');
    }
}
