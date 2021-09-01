<?php

namespace App\Http\Controllers\Websites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShareSocialController extends Controller
{
    public function shareSocial( $id )
    {
        $socialShare = \Share::page(
            'http://proseth.institute.pro/blog/show/4',
            'Laravel Custom Foreign Key Name Example',
        )
        ->facebook()
        ->twitter()
        ->reddit()
        ->linkedin()
        ->whatsapp()
        ->telegram();
        
        return view('share-social', compact('socialShare'));
    }
}
