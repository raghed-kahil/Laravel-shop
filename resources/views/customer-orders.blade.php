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
              <li aria-current="page" class="breadcrumb-item active">My orders</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-3">
          <x-costumer-side-bar-menu :page='1'/>
        </div>
        <div id="customer-orders" class="col-lg-9">
          <div class="box">
            <h1>My orders</h1>
            <p class="lead">Your orders on one place.</p>
            <p class="text-muted">If you have any questions, please feel free to <a href="contact">contact us</a>, our
              customer service center is working for you 24/7.</p>
            <hr>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                <tr>
                  <th>Order</th>
                  <th>Date</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                  <tr>
                    <th># {{$order->id}}</th>
                    <td>{{date('d/m/Y',strtotime($order->updated_at))}}</td>
                    <td>$ {{$order->total}}</td>
                    @switch($order->status)
                      @case('Being prepared')
                        <td><span class="badge badge-info">Being prepared</span></td>
                        @break
                      @case('Received')
                        <td><span class="badge badge-success">Received</span></td>
                        @break
                      @case('Cancelled')
                        <td><span class="badge badge-danger">Cancelled</span></td>
                        @break
                      @case('On hold')
                        <td><span class="badge badge-warning">On hold</span></td>
                    @endswitch
                      <td><a href="/customer-orders/{{$order->id}}" class="btn btn-primary btn-sm">View</a></td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
