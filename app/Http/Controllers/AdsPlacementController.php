<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\AdsPosition;
use App\Models\AdsSerial;
use App\Traits\FileSaver;
use Illuminate\Http\Request;
use App\Models\AdsPlacement;

class AdsPlacementController extends Controller
{
    use FileSaver;
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading AdManagement
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $data['all_placements'] = AdsPlacement::all();
        return view('backend.ad_placement.index', $data);
    }

    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating AdManagement
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        $data['ads_position'] = AdsPosition::where('status',1)->get();
        $data['ads_serial'] = AdsSerial::where('status',1)->get();
        return view('backend.ad_placement.create', $data);
    }

    /*
    |--------------------------------------------------------------------------
    | Store Method for Storing the data into AdManagement
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'ads_position_id' => 'required',
            'ads_serial_id'  => 'required',
        ]);

        try {
            AdsPlacement::create([
                'ads_position_id'=> $request->ads_position_id,
                'ads_serial_id' => $request->ads_serial_id,
                'status'     => $request->status == 'on' ? 1 : 0,
                'created_at' => Carbon::now(),
            ]);

            return back()->with('success','Ads Placement Successfully');
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
        $data['target_place'] = AdsPlacement::find($id);
        $data['ads_position'] = AdsPosition::where('status',1)->get();
        $data['ads_serial'] = AdsSerial::where('status',1)->get();

        return view('backend.ad_placement.edit',$data);
    }

    /*
    |--------------------------------------------------------------------------
    | Update Method for Updating AdPlacement
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ads_position_id' => 'required',
            'ads_serial_id'  => 'required',
        ]);

        try {
            AdsPlacement::find($id)->update([
                'ads_position_id'=> $request->ads_position_id,
                'ads_serial_id' => $request->ads_serial_id,
                'status'=> $request->status == 'on' ? 1 : 0,
            ]);
            return back()->with('success','Ads Placement Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting AdPlacement
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        try {
            $ads_place = AdsPlacement::find($id);
            $ads_place->update([
                'status'=> 0,
            ]);
            $ads_place->delete();
            return back()->with('deleted','Ads Placement Deleted!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Status Chamge Method of AdPlacement
    |--------------------------------------------------------------------------
    */
    public function change_status($id)
    {
        $ads_place = AdsPlacement::find($id);
        if ($ads_place->status == 0) {
            $ads_place->update([
                'status'=> 1
            ]);
        } else {
            $ads_place->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Status Changed!');
    }

}
