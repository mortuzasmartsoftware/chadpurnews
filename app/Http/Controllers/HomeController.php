<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AdsManagement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /*
     |--------------------------------------------------------------------------
     | Index METHOD for Home page view
     |--------------------------------------------------------------------------
    */
    public function index()
    {
        
        $data['total_news']   = News::count();
        $data['total_ads']    = AdsManagement::count();
        $data['total_users']  = User::count();
        $data['latest_news']  = News::latest()->limit(10)->get();

        return view('home', $data);
    }

    /*
     |--------------------------------------------------------------------------
     | Index METHOD for user information edit & view
     |--------------------------------------------------------------------------
    */
    public function user_index()
    {
        return view('backend.user_info.user_info',[
            'allUserInfo'=> User::find(auth()->id()),
        ]);
    }

    public function user_create(){
        return view('backend.user_info.user_create');
    }

    /*
     |--------------------------------------------------------------------------
     | Update METHOD for user information update
     |--------------------------------------------------------------------------
    */
    function admin_update(Request $request){
        $id = 1;

        if (isset($request->password)) {
            if (Hash::check($request->old_password, Auth::user()->password)) {
                $request->validate([
                    'password'=>'required | min:8',
                    'password_confirmation'=>'required',
                ]);
                if ($request->password == $request->password_confirmation){
                    User::find($id)->update([
                        'password' => bcrypt($request->password),
                    ]);
                    return back()->with('success',"Password Changed Successfully");
                }
                else {
                    return back()->with('error',"New password & Confirm Password doesn't matched");
                }
            }
            else {
                return back()->with('error',"Old password doesn't matched");
            }
        }
        User::find($id)->update([
            'name'=> $request->name,
        ]);
        return back();
    }

}
