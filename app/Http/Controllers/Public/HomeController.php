<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $setting = Setting::query()->first();

        $banners = Banner::query()
            ->where('is_active', true)
            ->latest()
            ->take(3)
            ->get();

        $bestSellers = Product::query()
            ->where('status', true)
            ->orderByDesc('sold_count')
            ->take(4)
            ->get();

        $testimonials = Testimonial::query()
            ->latest()
            ->take(6)
            ->get();

        return view('public.home', compact('setting', 'banners', 'bestSellers', 'testimonials'));
    }
}