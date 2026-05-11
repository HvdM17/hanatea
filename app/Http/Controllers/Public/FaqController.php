<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Product;

class FaqController extends Controller
{
    public function index()
    {
        $setting = Setting::query()->first();
        $bestSeller = Product::query()->orderByDesc('sold_count')->first();

        return view('public.faq', compact('setting', 'bestSeller'));
    }
}