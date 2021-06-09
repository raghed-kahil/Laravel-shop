@extends('master')
@section('content')
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item"><a href="./..">My orders</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Order # {{$order->id}}</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-3">
              <x-costumer-side-bar-menu :page="1"/>
            </div>
            <div id="customer-order" class="col-lg-9">
              <div class="box">
                <h1>Order #{{$order->id}}</h1>
                <p class="lead">Order #{{$order->id}} was placed on <strong>{{date('d/m/Y',strtotime($order->created_at))}}</strong> and is currently <strong>{{$order->status}}</strong>.</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="/contact">contact us</a>, our customer service center is working for you 24/7.</p>
                <hr>
                <div class="table-responsive mb-4">
                  <table class="table">
                    <thead>
                      <tr>
                        <th colspan="2">Product</th>
                        <th>Quantity</th>
                        <th>Unit price</th>
                        <th>Discount</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                    @php
                      $json = json_decode($order->products,true);
                      $total=0;
                    @endphp
                    @foreach($json['products'] as $product)
                      <tr>
                        <td><a href="#"><img src="/img/detailsquare.jpg" alt="White Blouse Armani"></a></td>
                        <td><a href="#">White Blouse Armani</a></td>
                        <td>{{$product['quantity']}}</td>
                        <td>${{$product['price']}}</td>
                        <td>${{$product['discount']}}</td>
                        <td>${{$total+=($product['price']*$product['quantity']-$product['discount'])}}</td>
                      </tr>
                    @endforeach
                      <tr>
                        <td><a href="#"><img src="/img/basketsquare.jpg" alt="Black Blouse Armani"></a></td>
                        <td><a href="#">Black Blouse Armani</a></td>
                        <td>1</td>
                        <td>$200.00</td>
                        <td>$0.00</td>
                        <td>$200.00</td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="5" class="text-right">Order subtotal</th>
                        <th>${{$total}}</th>
                      </tr>
                      <tr>
                        <th colspan="5" class="text-right">Shipping and handling</th>
                        <th>$10.00</th>
                      </tr>
                      <tr>
                        <th colspan="5" class="text-right">Tax</th>
                        <th>$0.00</th>
                      </tr>
                      <tr>
                        <th colspan="5" class="text-right">Total</th>
                        <th>$456.00</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.table-responsive-->
                <div class="row addresses">
                  <div class="col-lg-6">
                    <h2>Invoice address</h2>
                    <p>John Brown<br>13/25 New Avenue<br>New Heaven<br>45Y 73J<br>England<br>Great Britain</p>
                  </div>
                  <div class="col-lg-6">
                    <h2>Shipping address</h2>
                    <p>John Brown<br>13/25 New Avenue<br>New Heaven<br>45Y 73J<br>England<br>Great Britain</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
