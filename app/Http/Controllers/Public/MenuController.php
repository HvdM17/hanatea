<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->string('q')->toString();
        $category = $request->string('category')->toString();

        $categories = Product::query()
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        $products = Product::query()
            ->when($q, fn ($qq) => $qq->where('name', 'like', "%{$q}%"))
            ->when($category, fn ($qq) => $qq->where('category', $category))
            ->orderBy('status', 'desc')
            ->orderBy('price', 'asc')
            ->paginate(9)
            ->withQueryString();

        return view('public.menu', compact('products', 'categories', 'q', 'category'));
    }
}