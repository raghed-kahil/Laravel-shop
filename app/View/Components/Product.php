<?php

namespace App\View\Components;

use Illuminate\View\Component;
use \App\Models\Product as ProductModel;

class Product extends Component
{
    protected ProductModel $product;

    public function __construct(ProductModel $product)
    {
        $this->product = $product;
        $product->created_at;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.product')->with('product',$this->product);
    }
}
