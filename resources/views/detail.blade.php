@php
$details = json_decode($product->details,true);
@endphp
@extends('master')
@section('content')
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Ladies</a></li>
                  <li class="breadcrumb-item"><a href="#">Tops</a></li>
                  <li aria-current="page" class="breadcrumb-item active">{{$product->name}}</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-12 order-1 order-lg-2">
              <div id="productMain" class="row">
                <div class="col-md-6">
                  <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                    <div class="item"> <img src="{{$product->img1}}" alt="" class="img-fluid"></div>
                    <div class="item"> <img src="{{$product->img2}}" alt="" class="img-fluid"></div>
                    <div class="item"> <img src="/img/detailbig3.jpg" alt="" class="img-fluid"></div>
                  </div>
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
                <div class="col-md-6">
                  <div class="box">
                    <h1 class="text-center">{{$product->name}}</h1>
                    <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material &amp; care and sizing</a></p>
                    <p class="price">
                      @if($product->sale>0)
                        <del>${{$product->price}}</del>
                        ${{$product->price-$product->price*$product->sale}}
                      @else
                        ${{$product->price}}
                      @endif
                    </p>
                    <p class="text-center buttons"><button product="{{$product->id}}" class="btn btn-primary add-to-basket"><i class="fa fa-shopping-cart"></i> Add to cart</button><a href="basket" class="btn btn-outline-primary"><i class="fa fa-heart"></i> Add to wishlist</a></p>
                    <x-add-to-basket-script/>
                  </div>
                  <div data-slider-id="1" class="owl-thumbs">
                    <button class="owl-thumb-item"><img src="/img/detailsquare.jpg" alt="" class="img-fluid"></button>
                    <button class="owl-thumb-item"><img src="/img/detailsquare2.jpg" alt="" class="img-fluid"></button>
                    <button class="owl-thumb-item"><img src="/img/detailsquare3.jpg" alt="" class="img-fluid"></button>
                  </div>
                </div>
              </div>
              <div id="products" class="box">
                <p></p>
                <h4>Product details</h4>
                <p>{{$details['Product details']}}</p>
                <h4>Material &amp; care</h4>
                <ul>
                  @foreach($details['Material & care'] as $item)
                  <li>{{$item}}</li>
                  @endforeach
                </ul>
                <h4>Size &amp; Fit</h4>
                <ul>
                  @foreach($details['Size & Fit'] as $item)
                    <li>{{$item}}</li>
                  @endforeach
                </ul>
                <blockquote>
                  <p><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em></p>
                </blockquote>
                <hr>
                <div class="social">
                  <h4>Show it to your friends</h4>
                  <p><a href="#" class="external facebook"><i class="fa fa-facebook"></i></a><a href="#" class="external gplus"><i class="fa fa-google-plus"></i></a><a href="#" class="external twitter"><i class="fa fa-twitter"></i></a><a href="#" class="email"><i class="fa fa-envelope"></i></a></p>
                </div>
              </div>
              <div class="row same-height-row">
                <div class="col-md-3 col-sm-6">
                  <div class="box same-height">
                    <h3>You may also like these products</h3>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="/products"><img src="/img/product2.jpg" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="/products"><img src="/img/product2_2.jpg" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="/products" class="invisible"><img src="/img/product2.jpg" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Fur coat</h3>
                      <p class="price">$143</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="/products"><img src="/img/product1.jpg" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="/products"><img src="/img/product1_2.jpg" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="/products" class="invisible"><img src="/img/product1.jpg" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Fur coat</h3>
                      <p class="price">$143</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="/products"><img src="/img/product3.jpg" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="/products"><img src="/img/product3_2.jpg" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="/products" class="invisible"><img src="/img/product3.jpg" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Fur coat</h3>
                      <p class="price">$143</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
              </div>
              <div class="row same-height-row">
                <div class="col-md-3 col-sm-6">
                  <div class="box same-height">
                    <h3>Products viewed recently</h3>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="/products"><img src="/img/product2.jpg" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="/products"><img src="/img/product2_2.jpg" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="/products" class="invisible"><img src="/img/product2.jpg" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Fur coat</h3>
                      <p class="price">$143</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="/products"><img src="/img/product1.jpg" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="/products"><img src="/img/product1_2.jpg" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="/products" class="invisible"><img src="/img/product1.jpg" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Fur coat</h3>
                      <p class="price">$143</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="/products"><img src="/img/product3.jpg" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="/products"><img src="/img/product3_2.jpg" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="/products" class="invisible"><img src="/img/product3.jpg" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Fur coat</h3>
                      <p class="price">$143</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
              </div>
            </div>
            <!-- /.col-md-9-->
          </div>
        </div>
      </div>
@endsection
