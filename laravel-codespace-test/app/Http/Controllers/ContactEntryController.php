<?php

namespace App\Http\Controllers;

use App\Models\ContactEntry;
use Illuminate\Http\Request;

class ContactEntryController extends Controller
{
    public function index()
    {
        $entries = ContactEntry::all();
        return view('contact-entries.index', compact('entries'));
    }
}
