<?php

namespace App\View\Components;

use Illuminate\View\Component;

class product extends Component
{
  public string $price;
  public bool $hasSale, $hasGift, $isNew;

  /**
   * Create a new component instance.
   *
   * @param $price
   */
  public function __construct(string $price)
  {
    $this->price = $price;
    $this->hasSale = false;
    $this->hasGift = true;
    $this->isNew = true;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|string
   */
  public function render()
  {
    return view('components.product');
  }
}
