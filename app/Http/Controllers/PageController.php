<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PagePhoto;
use Illuminate\Http\Request;
use App\Traits\FileSaver;

class PageController extends Controller
{
    use FileSaver;
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading Category
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('backend.page.index',[
            'all_adds'=> Page::all(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating Category
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('backend.page.create');
    }

    /*
    |--------------------------------------------------------------------------
    | Store Method for Storing the data into Category
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'link'  => 'required|max:50|unique:page,link',
            'name'  => 'required',
            'title' => 'required',
            'file' => 'mimes:pdf',
        ]);
        try {

            $page = Page::create([
                'name'=> $request->name,
                'title'=> $request->title,
                'description'=> $request->description,
                'status'=> $request->status,
                'link'=> $request->link,
                'file'=> 'default.pdf',
            ]);

           $this->upload_file($request->file, $page, 'file', 'uploads/page');

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
        return view('backend.page.edit',[
            'target_ads'=> Page::find($id),
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
            $page = Page::find($id);

            $request->validate([
                'link'  => "required|max:50|unique:page,link,$id",
                'name'  => 'required',
                'title' => 'required',
            ]);
            if($request->hasFile('file')){
                $request->validate([
                    'file'=> 'required|mimes:pdf',
                ]);
            }
            $page->update([
                'name'=> $request->name,
                'title'=> $request->title,
                'description'=> $request->description,
                'file'=> $page->file,
                'status'=> $request->status,
                'link'=> $request->link,
            ]);
            $this->upload_file($request->file, $page, 'file', 'uploads/page');
            return back()->with('success','Data Updated Successfully');

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
        $smart_move = Page::find($id);
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
        if (Page::find($id)->status == 0) {
            Page::find($id)->update([
                'status'=> 1
            ]);
        } else {
            Page::find($id)->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Status Changed!');
    }

    /*
     |--------------------------------------------------------------------------
     | PAGE METHOD
     |--------------------------------------------------------------------------
    */

    public function page($link)
    {
        $pages = Page::get();
        $single = Page::where('link',$link)->first();
        $pagePics = PagePhoto::where('fk_page_id',$single->id)->get();
        return view('frontend.pagescreation',compact('pages','single','pagePics','page'));
    }
}
