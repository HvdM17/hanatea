<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Setting;

class ContactController extends Controller
{
    public function index()
    {
        $setting = Setting::query()->first();
        return view('public.contact', compact('setting'));
    }
}