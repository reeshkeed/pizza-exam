<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get(Request $request)
    {
        $size = $request->input('size');
        $type = $request->input('type');

        $query = Product::query();

        if ($size) {
            $query->where('size', '=', $size);
        }

        if ($type) {
            $query->where('type', '=', $type);
        }

        return $query->get();
    }
}
