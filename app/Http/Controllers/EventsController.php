<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading Category
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        // return Event::all();
        // die();
        return view('backend.events.index',[
            'all_adds'=> Event::all(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating Category
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('backend.events.create');
    }

    /*
    |--------------------------------------------------------------------------
    | Store Method for Storing the data into Category
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            '*'=>'required',
        ]);

        Event::insert([
            'events_name'=> $request->events_name,
            'start_date'=> $request->start_date,
            'days'=> $request->days,
            'status'=> $request->status,
            'created_at'=> Carbon::now(),
        ]);
        return back()->with('success','Category Added Successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Method for Edit the Category
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        return view('backend.events.edit',[
            'target_ads'=> Event::find($id),
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
            '*'=>'required',
        ]);

        Event::find($id)->update([
            'events_name'=> $request->events_name,
            'start_date'=> $request->start_date,
            'days'=> $request->days,
            'status'=> $request->status,
        ]);
        return back()->with('success','Category Updated Successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $smart_move = Event::find($id);
        $smart_move->update([
            'status'=> 0,
        ]);
        $smart_move->delete();
        return back()->with('deleted','Ads position Deleted!');
    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function change_status($id)
    {
        if (Event::find($id)->status == 0) {
            Event::find($id)->update([
                'status'=> 1
            ]);
        } else {
            Event::find($id)->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Ads Status Changed!');
    }
}
