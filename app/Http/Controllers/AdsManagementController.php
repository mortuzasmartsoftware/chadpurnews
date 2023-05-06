<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\AdsPosition;
use App\Models\AdsSerial;
use App\Traits\FileSaver;
use Illuminate\Http\Request;
use App\Models\AdsManagement;
use App\Models\AdsPlacement;

class AdsManagementController extends Controller
{
    use FileSaver;
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading AdManagement
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $data['all_adds'] = AdsManagement::all();
        return view('backend.ad_management.index', $data);
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
            'position_id' => 'required',
            'serial_num'  => 'required|numeric',
        ]);
        // dd($request);
        try {
            $model = AdsManagement::create([
                'script'     => $request->script,
                'ads_image'  => 'default.jpg',
                'image_url'  => $request->image_url,
                'position_id'=> $request->position_id,
                'serial_num' => $request->serial_num,
                'status'     => $request->status == 'on' ? 1 : 0,
                'script_image_status'   => $request->script_image_status == 'on' ? 1 : 0,
                'created_at' => Carbon::now(),
            ]);
            $this->upload_File($request->ads_image, $model, 'ads_image', 'uploads/ads-image');

            // $this->uploadFileWithResize($request->ads_image, $model, 'ads_image', 'uploads/ads-image', 1000, 120);

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
       
        $data['target_ads'] = AdsManagement::find($id);
        $data['ads_position'] = AdsPosition::where('status',1)->get();

        $positionId = AdsManagement::where('id', $id)->first()->position_id;
        $data['ads_serial'] = AdsPlacement::where('ads_position_id', $positionId)->get();
        // dd($data['ads_serial']);

        return view('backend.ad_management.edit',$data);
    }

    /*
    |--------------------------------------------------------------------------
    | Update Method for Updating AdManagement
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
     
        $request->validate([
            'serial_num' => 'required|numeric',
        ]);
   
        try {
            
            $model = AdsManagement::find($id);
            if($request->file('ads_image') != NULL){
                $model->update([
                    'script'     => $request->script,
                    // 'ads_image'  => $model->ads_image,
                    'image_url'  => $request->image_url,
                    'position_id'=> $request->position_id,
                    'serial_num' => $request->serial_num,
                    'status'     => $request->status == 'on' ? 1 : 0,
                    'script_image_status'   => $request->script_image_status == 'on' ? 1 : 0,
                ]);
                $this->upload_File($request->ads_image, $model, 'ads_image', 'uploads/ads-image');
            }else{
                $model->update([
                    'script'     => $request->script,
                    'image_url'  => $request->image_url,
                    'position_id'=> $request->position_id,
                    'serial_num' => $request->serial_num,
                    'status'     => $request->status == 'on' ? 1 : 0,
                    'script_image_status'   => $request->script_image_status == 'on' ? 1 : 0,
                ]);
            }


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

    //Main Status active inactive condition
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

    // Image or Script Active Inactive Status Condition
    public function change_statusOfscriptORimage($id){
        $ads_manage = AdsManagement::find($id);

        if ($ads_manage->script_image_status == 0) {
            $ads_manage->update([
                'script_image_status'=> 1
            ]);
            return back()->with('success','Script is Activated!');

        }
        else {
            $ads_manage->update([
                'script_image_status'=> 0
            ]);
            return back()->with('success','Image is Activated!');
        }

    }

    public function get_Serial_num(){
        $data['ads_serial'] = AdsSerial::pluck('id');

        return $data;
    }

    public function get_SerialId(Request $request){
        try{
            $data = AdsPlacement::where('ads_position_id', $request->position_id)->with('ads_serial')->get();
            return $data;
        }catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

}
