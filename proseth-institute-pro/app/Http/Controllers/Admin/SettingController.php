<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    public function index()
    {

        return view('admin.setting.index')->with([
            'setting'=> Setting::findOrFail(1)
        ]);
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'facebook_link'=>'required',
            'youtube_link'=>'required',
            'twitter_link' => 'required',
            'linkin_link' => 'required',
            'phone_number' => 'required',
            'mail' => 'required',
            'map' => 'required',
            'address' => 'required',
            'footer_text' => 'required',
            'open_daily' => 'required'
        ]);

        $req = $request->all();
        $setting = Setting::findOrFail($id);

        if($request->logo !== null){
            $options=[];
            $img = uploadImage($request->logo,'logo', $options);
            $req['logo'] = $img;
        }
        $setting->update($req);
        return redirect()->route('admin.setting')->with('message', 'The success message!');
    }
}
