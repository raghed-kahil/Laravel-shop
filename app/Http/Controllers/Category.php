<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class Category extends Controller
{
    public $products;
    public function __construct()
    {
        $this->products = product::all()->take(6);
    }

    public function __invoke()
    {
        return view('category');
    }
}
