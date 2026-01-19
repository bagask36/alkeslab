<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Phone;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    // Display all addresses, phones, and social links
    public function index()
    {
        return view('back.contact.index');
    }
}
