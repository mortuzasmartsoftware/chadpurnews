<?php

namespace App\Http\Controllers;

use App\Models\AdsSerial;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdsSerialController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading AdSerial
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('backend.ad_serial.index',[
            'all_adds'=> AdsSerial::all(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating AdSerial
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('backend.ad_serial.create');
    }

    /*
    |--------------------------------------------------------------------------
    | Store Method for Storing the data into AdSerial
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            '*'=>'required',
        ]);

        try {
            AdsSerial::insert([
                'serial_name'=> $request->serial_name,
                'status'=> $request->status == 'on' ? 1 : 0,
                'created_at'=> Carbon::now(),
            ]);
            return back()->with('success','Ads Serial Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Edit Method for Edit the AdSerial
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        return view('backend.ad_serial.edit',[
            'target_ads'=> AdsSerial::find($id),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Update Method for Updating AdSerial
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            '*'=>'required',
        ]);

        try {
            AdsSerial::find($id)->update([
                'serial_name'=> $request->serial_name,
                'status'=> $request->status == 'on' ? 1 : 0,
            ]);
            return back()->with('success','Ads Serial Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting AdSerial
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        try {
            $smart_move = AdsSerial::find($id);
            $smart_move->update([
                'status'=> 0,
            ]);
            $smart_move->delete();
            return back()->with('deleted','Ads serial Deleted!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting AdSerial
    |--------------------------------------------------------------------------
    */
    public function change_status($id)
    {
        $ads_serial = AdsSerial::find($id);
        if ($ads_serial->status == 0) {
            $ads_serial->update([
                'status'=> 1
            ]);
        } else {
            $ads_serial->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Status Changed!');
    }
}
