<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function privacy()
    {
        return view('pages.privacy');
    }

    public function imprint()
    {
        return view('pages.imprint');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
