<div class="product">
  <div class="flip-container">
    <div class="flipper">
      <div class="front"><a href="/products"><img src="{{$product->img1}}" alt="" class="img-fluid"></a></div>
      <div class="back"><a href="/products"><img src="{{$product->img2}}" alt="" class="img-fluid"></a></div>
    </div>
  </div><a href="/products" class="invisible"><img src="{{$product->img1}}" alt="" class="img-fluid"></a>
  <div class="text">
    <h3><a href="/products">{{$product->name}}</a></h3>
    <p class="price">
      @if($product->sale>0)
        <del>${{$product->price}}</del>
        ${{$product->price-$product->price*$product->sale}}
      @else
        ${{$product->price}}
      @endif
    </p>
  </div>
  <!-- /.text-->
  @if($product->sale>0)
  <div class="ribbon sale">
    <div class="theribbon">SALE</div>
    <div class="ribbon-background"></div>
  </div>
  <!-- /.ribbon-->
  @endif
  @if(strtotime($product->created_at) > strtotime('-7 days'))
  <div class="ribbon new">
    <div class="theribbon">NEW</div>
    <div class="ribbon-background"></div>
  </div>
  <!-- /.ribbon-->
  @endif
  @if($product->gift!=null)
  <div class="ribbon gift">
    <div class="theribbon"><a style="color: white" href="/products/{{$product->gift}}">GIFT</a></div>
    <div class="ribbon-background"></div>
  </div>
  <!-- /.ribbon-->
  @endif
</div>
<!-- /.product-->
