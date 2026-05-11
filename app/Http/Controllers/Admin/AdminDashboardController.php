<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Testimonial;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $testimonialCount = Testimonial::count();

        $topProducts = Product::query()
            ->orderByDesc('sold_count')
            ->orderBy('name')
            ->take(5)
            ->get();

        // Jika belum bikin tracking pengunjung, pakai placeholder dulu
        $visitorCount = 0;

        return view('admin.dashboard', compact(
            'productCount',
            'testimonialCount',
            'topProducts',
            'visitorCount'
        ));
    }
}