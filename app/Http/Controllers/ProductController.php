<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get(Request $request)
    {
        $type = $request->input('type');
        $size = $request->input('size');

        return Product::where('type', '=', $type)
            ->where('size', '=', $size)->get();
    }
}
