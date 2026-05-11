<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Setting;

class AboutController extends Controller
{
    public function index()
    {
        $setting = Setting::query()->first();
        return view('public.about', compact('setting'));
    }
}