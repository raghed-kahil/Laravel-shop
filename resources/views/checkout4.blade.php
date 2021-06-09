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
                  <li aria-current="page" class="breadcrumb-item active">Checkout - Order review</li>
                </ol>
              </nav>
            </div>
            <div id="checkout" class="col-lg-9">
              <div class="box">
                <form method="get" action="checkout4">
                  <h1>Checkout - Order review</h1>
                  <div class="nav flex-column flex-sm-row nav-pills"><a href="checkout1" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-map-marker">                  </i>Address</a><a href="checkout2" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-truck">                       </i>Delivery Method</a><a href="checkout3" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-money">                      </i>Payment Method</a><a href="#" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-eye">                     </i>Order Review</a></div>
                  <div class="content">
                    <div class="table-responsive">
                      <x-basket-table :basket="$basket['products']"/>
                    </div>
                    <!-- /.table-responsive-->
                  </div>
                  <!-- /.content-->
                  <div class="box-footer d-flex justify-content-between"><a href="checkout3" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to payment method</a>
                    <button type="submit" class="btn btn-primary">Place an order<i class="fa fa-chevron-right"></i></button>
                  </div>
                </form>
              </div>
              <!-- /.box-->
            </div>
            <!-- /.col-lg-9-->
            <div class="col-lg-3">
              <x-order-summary :basket="$basket"/>
            </div>
            <!-- /.col-lg-3-->
          </div>
        </div>
      </div>
@endsection
