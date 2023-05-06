<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\PerformerSchedule;
use App\Traits\FileSaver;
use Illuminate\Http\Request;

class PerformerScheduleController extends Controller
{
    use FileSaver;
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading Category
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('backend.performer-schedule.index',[
            'all_adds'=> PerformerSchedule::all(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating Category
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('backend.performer-schedule.create',[
            'events_infos'=> Event::all(),
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
            'photo'=> 'required|image|max:1000',
            'name'=> 'required',
            'designation'=> 'required',
            'serialno'=> 'numeric'
        ]);

        try {
            $model = PerformerSchedule::create([
                'fk_event_id'=> $request->fk_event_id,
                'day_number'=> $request->day_number,
                'time_schedule'=> $request->time_schedule,
                'name'=> $request->name,
                'designation'=> $request->designation,
                'serialno'=> $request->serialno,
                'details'=> $request->details,
                'status'=> $request->status,
                'photo'=> 'default.jpg',
            ]);

        $this->upload_file($request->photo, $model, 'photo', 'uploads/schedule');

           return back()->with('success','Data Added Successfully');

        } catch(\Exception $ex) {
            return redirect()->back()->withError($ex->getMessage());
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Edit Method for Edit the Category
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        return view('backend.performer-schedule.edit',[
            'target_ads'=> PerformerSchedule::find($id),
            'event_infos'=> Event::all(),
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
            'designation'=> 'required',
            'serialno'=> 'numeric'
        ]);
        if($request->hasFile('photo')){
            $request->validate([
                'photo'=> 'image|max:1000',
            ]);
        }
        try {
            $model = PerformerSchedule::find($id);

            $model->update([
                'fk_event_id'=> $request->fk_event_id,
                'day_number'=> $request->day_number,
                'time_schedule'=> $request->time_schedule,
                'name'=> $request->name,
                'designation'=> $request->designation,
                'serialno'=> $request->serialno,
                'details'=> $request->details,
                'status'=> $request->status,
                'photo'=> $model->photo,
            ]);

          $this->upload_file($request->photo, $model, 'photo', 'uploads/schedule');

           return back()->with('success','Data Edited Successfully');

        } catch(\Exception $ex) {
            return redirect()->back()->withError($ex->getMessage());
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $smart_move = PerformerSchedule::find($id);
        $smart_move->update([
            'status'=> 0,
        ]);
        $smart_move->delete();
        return back()->with('deleted','Deleted!');
    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function change_status($id)
    {
        if (PerformerSchedule::find($id)->status == 0) {
            PerformerSchedule::find($id)->update([
                'status'=> 1
            ]);
        } else {
            PerformerSchedule::find($id)->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Ads Status Changed!');
    }

}
