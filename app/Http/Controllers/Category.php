<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Category extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, ['show' => 'integer', 'page' => 'integer']);
        $show = $request->get('show', 12);
        $page = $request->get('page', 1);
        if ($show > 36)
            $show = 36;
        $show = round($show / 12) * 12;
        $products = Product::query();
        if (Cookie::has('colors'))
            $products = $products->whereIn('color', Cookie::get('colors', ['*']));
        if (Cookie::has('brands'))
            $products = $products->whereIn('brand', Cookie::get('brands', ['*']));
        return view('category')
            ->with('products', $products->paginate($show))
            ->with('total', Product::query()->count())
            ->with('brands', DB::table('brands')->get()->sortByDesc('count'))
            ->with('colors', DB::table('colors')->get()->sortByDesc('count'))
            ->with('show', $show)
            ->with('page', $page);
    }


}
