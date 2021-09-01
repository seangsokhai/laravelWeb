<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\About;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::findOrFail(1);
        return view('admin.about.index')->with([
            'about'=> $about,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'over_view'=>'required',
            'mission'=>'required',
            'vision' => 'required',
            'value' => 'required',
            'csr' => 'required',
            'link' => 'required',
        ]);
        $req = $request->all();
        $about = About::findOrFail($id);

        if($request->thumbnail !== null){
            $options=[];
            $img = uploadImage($request->thumbnail,'about', $options);
            $req['thumbnail'] = $img;
        }
        $about->update($req);
        return redirect()->route('admin.about')->with('message', 'The success message!');
    }
}
