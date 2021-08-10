<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class Products extends Controller
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
        $colors = json_decode(Cookie::get('colors', '{}'), true);
        $brands = json_decode(Cookie::get('brands', '{}'), true);
        if (Cookie::has('colors'))
            $products = $products->whereIn('color', $colors);
        if (Cookie::has('brands'))
            $products = $products->whereIn('brand', $brands);
        if (Cookie::has('sort-by'))
            $products = $products->orderBy(Cookie::get('sort-by','id'),'desc');
        return view('products')
            ->with('products', $products->paginate($show))
            ->with('total', $products->count())
            ->with('brands', DB::table('brands')->get()->sortByDesc('count'))
            ->with('checkedBrands', $brands)
            ->with('checkedColors', $colors)
            ->with('colors', DB::table('colors')->get()->sortByDesc('count'))
            ->with('show', $show)
            ->with('page', $page);

    }

    public function store(Request $request)
    {
        if ($request->has('clear'))
            return redirect()->back()->withCookie(cookie()->forget($request->get('clear')));
        if($request->has('sort-by')) {
            $this->validate($request, [ 'sort-by' => Rule::in(['created_at','sale','price','name']) ]);
            return redirect()->back()
                ->withCookie(cookie('sort-by', $request->get('sort-by'), 60));
        }
            $this->validate($request, ['filter' => ['required', Rule::in(['colors', 'brands'])]]);
        $filter = $request->get('filter');
        $filters = $request->except('filter');
        if (sizeof($filters)==0)
            return redirect()->back()->withCookie(cookie()->forget($filter));
        if (sizeof($filters) > DB::table($filter)->count())
            return response('', 400);
        return redirect()->back()
            ->withCookie(cookie($filter, json_encode(array_keys($filters)), 60));
    }
}
