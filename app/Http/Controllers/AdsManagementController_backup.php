<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\AdsPosition;
use Illuminate\Http\Request;
use App\Models\AdsManagement;

class AdsManagementController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading AdManagement
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('backend.ad_management.index',[
            'all_adds'=> AdsManagement::all(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating AdManagement
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        $data['ads_position'] = AdsPosition::where('status',1)->get();
        return view('backend.ad_management.create', $data);
    }




    /*
    |--------------------------------------------------------------------------
    | Store Method for Storing the data into AdManagement
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'script'      => 'required',
            'position_id' => 'required',
            'serial_num'  => 'required|numeric',
        ]);
        try {
            AdsManagement::insert([
                'script'     => $request->script,
                'position_id'=> $request->position_id,
                'serial_num' => $request->serial_num,
                'status'     => $request->status == 'on' ? 1 : 0,
                'created_at' => Carbon::now(),
            ]);
            return back()->with('success','Ads Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Edit Method for Edit the AdManagement
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        return view('backend.ad_management.edit',[
            'target_ads'   => AdsManagement::find($id),
            'ads_position' => AdsPosition::all(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Update Method for Updating AdManagement
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'script'     => 'required',
            'serial_num' => 'required|numeric',
        ]);
        try {
            AdsManagement::find($id)->update([
                'script'     => $request->script,
                'position_id'=> $request->position_id,
                'serial_num' => $request->serial_num,
                'status'     => $request->status == 'on' ? 1 : 0,
            ]);
            return back()->with('success','Ads Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

    }


    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting AdManagement
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        try {
            $smart_move = AdsManagement::find($id);
            $smart_move->update([
                'status'=> 0,
            ]);
            $smart_move->delete();
            return back()->with('deleted','Ads Deleted!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting AdManagement
    |--------------------------------------------------------------------------
    */
    public function change_status($id)
    {
        $ads_manage = AdsManagement::find($id);

        if ($ads_manage->status == 0) {
            $ads_manage->update([
                'status'=> 1
            ]);
        }
        else {
            $ads_manage->update([
                'status'=> 0
            ]);
        }

        return back()->with('success','Status Changed!');
    }


}
