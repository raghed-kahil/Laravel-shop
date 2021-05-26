<div class="col-lg-4 col-md-6">
    <div class="product">
        <div class="flip-container">
            <div class="flipper">
                <div class="front">
                    <a href="/detail">
                        <img src="/img/product2.jpg" alt="" class="img-fluid">
                    </a>
                </div>
                <div class="back">
                    <a href="detail">
                        <img src="/img/product2_2.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>
        </div>
        <a href="detail" class="invisible"><img src="/img/product2.jpg" alt="" class="img-fluid"></a>
        <div class="text">
            <h3><a href="detail">White Blouse Armani</a></h3>
            <p class="price">
                @if($hasSale)
                    <del>$280</del>
                @endif
                ${{$price}}
            </p>
            <p class="buttons">
                <a href="detail" class="btn btn-outline-secondary">View detail</a>
                <a href="basket" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </p>
        </div>
        <!-- /.text-->
        @if($hasSale)
            <div class="ribbon sale">
                <div class="theribbon">SALE</div>
                <div class="ribbon-background"></div>
            </div>
            <!-- /.ribbon-->
        @endif
        @if($isNew)
            <div class="ribbon new">
                <div class="theribbon">NEW</div>
                <div class="ribbon-background"></div>
            </div>
            <!-- /.ribbon-->
        @endif
        @if($hasGift)
            <div class="ribbon gift">
                <div class="theribbon">GIFT</div>
                <div class="ribbon-background"></div>
            </div>
            <!-- /.ribbon-->
        @endif
    </div>
    <!-- /.product -->
</div>
