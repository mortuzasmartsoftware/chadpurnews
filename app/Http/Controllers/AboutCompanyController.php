<?php

namespace App\Http\Controllers;

use App\Models\AboutCompany;
use App\Traits\FileSaver;
use Illuminate\Http\Request;

class AboutCompanyController extends Controller
{
    use FileSaver;

    /*
     |--------------------------------------
     |          Index METHOD
     |--------------------------------------
    */
    function index(){
        return view('backend.company_info.company_info',[
            'allSiteInfo'=> AboutCompany::first(),
        ]);
    }

    /*
     |--------------------------------------
     |          Update METHOD
     |--------------------------------------
    */
    function update(Request $request){

        try {
            $model = AboutCompany::first();

            if($request->file('logo') || $request->file('favicon') != NULL)
            {
                $model->update([
                    'company_name'      => $request->company_name,
                    'address'           => $request->address,
                    'email'             => $request->email,
                    'mobile_no'         => $request->mobile_no ?? 0,
                    'fb_link'           => $request->fb_link ?? 0,
                    'short_description' => $request->short_description ?? 0,
                    'description'       => $request->description ?? 0,
                    'map_embed'         => $request->map_embed ?? 0,
                    'logo'              => $model->logo,
                    'favicon'           => $model->favicon,
                ]);

                $this->upload_file($request->logo, $model, 'logo', 'uploads/logo');
                $this->upload_file($request->favicon, $model, 'favicon', 'uploads/favicon');
            }
            else{
                $model->update([
                    'company_name'      => $request->company_name,
                    'address'           => $request->address,
                    'email'             => $request->email,
                    'mobile_no'         => $request->mobile_no ?? 0,
                    'fb_link'           => $request->fb_link ?? 0,
                    'short_description' => $request->short_description ?? 0,
                    'description'       => $request->description ?? 0,
                    'map_embed'         => $request->map_embed ?? 0,
                ]);
            }


            return back()->with('success','Data Updated Successfully');

        }
        catch(\Exception $ex) {
            return redirect()->back()->withError($ex->getMessage());
        }


    }
}
