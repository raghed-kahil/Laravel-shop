<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class Basket extends Controller
{
    public function index(Request $request)
    {
//        Session::put('basket',['products'=>[
//            ['id'=>1,'name'=>'White Blouse Armani','price'=>123.00,'discount'=>0,'quantity'=>2,'total'=>246.00],
//            ['id'=>2,'name'=>'White Blouse Armani','price'=>100.00,'discount'=>10,'quantity'=>1,'total'=>90.00],
//        ],'tax'=>10,'shipAndHandle'=>50,'total'=>336]);
        $basket = json_decode(Cookie::get('basket','{}'),true);
        return view('basket')
            ->with('prevUrl', redirect()->back()->getTargetUrl())
            ->with('basket',$basket)
            ->with('products',Product::query()->whereIn('id', array_keys($basket)));
    }

    public function update(Product $item)
    {
        $basket =json_decode(Cookie::get('basket','{}' ),true);
        if(isset($basket[$item->id])){
            $basket[$item->id]++;
        }
        else
            $basket[$item->id]=1;
        $count = array_sum($basket);
        return response($count)
            ->withCookie(cookie('basket', json_encode($basket),60*24*7))
            ->withCookie(cookie('basket-count',$count,60*24*7));
    }
}
