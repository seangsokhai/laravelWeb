<?php

namespace App\Http\Controllers\Websites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmailRequest;

use App\Setting;
use App\Slide;
use App\Email;
use App\Mail\StoreMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        $setting = Setting::first();
        return view('websites.contact.index')->with([
            'setting' => $setting,
            "slide" => Slide::where('page_id', 5)->inRandomOrder()->get(),
        ]);
    }

    public function storeEmail(StoreEmailRequest $request)
    {
        $email = Email::create($request->all());
        Mail::to('email@email.com')->send( new StoreMail( $email ));
        return redirect()->route('contact')->with('message', 'The success message!');
    }
}
