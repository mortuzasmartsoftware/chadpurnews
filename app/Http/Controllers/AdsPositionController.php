<?php

namespace App\Http\Controllers;

use App\Models\AdsPosition;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdsPositionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading AdPosition
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('backend.ad_position.index',[
            'all_adds'=> AdsPosition::all(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating AdPosition
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('backend.ad_position.create');
    }

    /*
    |--------------------------------------------------------------------------
    | Store Method for Storing the data into AdPosition
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            '*'=>'required',
        ]);

        try {
            AdsPosition::insert([
                'position_name'=> $request->position_name,
                'status'=> $request->status == 'on' ? 1 : 0,
                'created_at'=> Carbon::now(),
            ]);
            return back()->with('success','Ads Position Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Edit Method for Edit the AdPosition
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        return view('backend.ad_position.edit',[
            'target_ads'=> AdsPosition::find($id),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Update Method for Updating AdPosition
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            '*'=>'required',
        ]);

        try {
            AdsPosition::find($id)->update([
                'position_name'=> $request->position_name,
                'status'=> $request->status == 'on' ? 1 : 0,
            ]);
            return back()->with('success','Ads Position Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting AdPosition
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        try {
            $smart_move = AdsPosition::find($id);
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
    | Destroy Method for deleting AdPosition
    |--------------------------------------------------------------------------
    */
    public function change_status($id)
    {
        $ads_position = AdsPosition::find($id);
        if ($ads_position->status == 0) {
            $ads_position->update([
                'status'=> 1
            ]);
        } else {
            $ads_position->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Status Changed!');
    }
}
