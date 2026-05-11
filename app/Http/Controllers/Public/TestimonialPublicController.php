<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;

class TestimonialPublicController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::query()->latest()->paginate(9);
        return view('public.testimonials', compact('testimonials'));
    }
}