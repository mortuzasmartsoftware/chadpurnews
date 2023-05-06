<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Traits\FileSaver;

class SliderController extends Controller
{
    use FileSaver;
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading Category
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('backend.slider.index',[
            'all_adds'=> Slider::all(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating Category
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('backend.slider.create');
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
            'caption1'=>'required',
            'caption2'=> 'required',
            'serialno'=> 'numeric',
        ]);
        try {

            $page = Slider::create([
                'photo'=> 'default.jpg',
                'caption1'=> $request->caption1,
                'caption2'=> $request->caption2,
                'serialno'=> $request->serialno,
                'status'=> $request->status,
            ]);

           $this->upload_file($request->photo, $page, 'photo', 'uploads/slider');

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
        return view('backend.slider.edit',[
            'target_ads'=> Slider::find($id),
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
            $page = Slider::find($id);

            $request->validate([
                'caption1'=>'required',
                'caption2'=> 'required',
                'serialno'=> 'numeric',
            ]);
            if($request->hasFile('photo')){
                $request->validate([
                    'photo'=> 'image|max:1000',
                ]);
            }
            $page->update([
                'caption1'=> $request->caption1,
                'caption2'=> $request->caption2,
                'serialno'=> $request->serialno,
                'status'=> $request->status,
                'photo'=> $page->photo,
            ]);

            $this->upload_file($request->photo, $page, 'photo', 'uploads/slider');

           return back()->with('success','Data Added Successfully');

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
        $smart_move = Slider::find($id);
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
        if (Slider::find($id)->status == 0) {
            Slider::find($id)->update([
                'status'=> 1
            ]);
        } else {
            Slider::find($id)->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Status Changed!');
    }

}
