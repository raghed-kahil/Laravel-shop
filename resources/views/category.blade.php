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
              <li aria-current="page" class="breadcrumb-item active">Ladies</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-3">
          <!--
          *** MENUS AND FILTERS ***
          _________________________________________________________
          -->
          <div class="card sidebar-menu mb-4">
            <div class="card-header">
              <h3 class="h4 card-title">Categories</h3>
            </div>
            <div class="card-body">
              <ul class="nav nav-pills flex-column category-menu">
                <li><a href="category" class="nav-link">Men <span
                      class="badge badge-secondary">42</span></a>
                  <ul class="list-unstyled">
                    <li><a href="category" class="nav-link">T-shirts</a></li>
                    <li><a href="category" class="nav-link">Shirts</a></li>
                    <li><a href="category" class="nav-link">Pants</a></li>
                    <li><a href="category" class="nav-link">Accessories</a></li>
                  </ul>
                </li>
                <li><a href="category" class="nav-link active">Ladies <span class="badge badge-light">123</span></a>
                  <ul class="list-unstyled">
                    <li><a href="category" class="nav-link">T-shirts</a></li>
                    <li><a href="category" class="nav-link">Skirts</a></li>
                    <li><a href="category" class="nav-link">Pants</a></li>
                    <li><a href="category" class="nav-link">Accessories</a></li>
                  </ul>
                </li>
                <li><a href="category" class="nav-link">Kids <span
                      class="badge badge-secondary">11</span></a>
                  <ul class="list-unstyled">
                    <li><a href="category" class="nav-link">T-shirts</a></li>
                    <li><a href="category" class="nav-link">Skirts</a></li>
                    <li><a href="category" class="nav-link">Pants</a></li>
                    <li><a href="category" class="nav-link">Accessories</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <div class="card sidebar-menu mb-4">
            <div class="card-header">
              <h3 class="h4 card-title">Brands <a href="#" class="btn btn-sm btn-danger pull-right"><i
                    class="fa fa-times-circle"></i> Clear</a></h3>
            </div>
            <div class="card-body">
              <form action="" method="post">
                @method('options')
                <div class="form-group">
                  @foreach($brands as $brand)
                  <div class="checkbox">
                    <label>
                      <input name="{{$brand->id}}" type="checkbox"> {{$brand->name.' ('.$brand->count.')'}}
                    </label>
                  </div>
                  @endforeach
                </div>
                <button id="brand-apply" class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply
                </button>
              </form>
            </div>
          </div>
          <div class="card sidebar-menu mb-4">
            <div class="card-header">
              <h3 class="h4 card-title">Colours <a href="#" class="btn btn-sm btn-danger pull-right"><i
                    class="fa fa-times-circle"></i> Clear</a></h3>
            </div>
            <div class="card-body">
              <form action="." method="post">
                <div class="form-group">
                  @foreach($colors as $color)
                    <div class="checkbox">
                      <label>
                        <input name="{{$color->id}}" type="checkbox"> {{$color->name.' ('.$color->count.')'}}
                      </label>
                    </div>
                  @endforeach
                </div>
                <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply
                </button>
              </form>
            </div>
          </div>
          <!-- *** MENUS AND FILTERS END ***-->
          <div class="banner"><a href="#"><img src="/img/banner.jpg" alt="sales 2014" class="img-fluid"></a>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="box">
            <h1>Ladies</h1>
            <p>In our Ladies department we offer wide selection of the best products we have found and
              carefully selected worldwide.</p>
          </div>
          <div class="box info-bar">
            <div class="row">
              <div class="col-md-12 col-lg-4 products-showing">Showing <strong>{{$total>$show?$show:$total}}</strong> of
                <strong>{{$total}}</strong> products
              </div>
              <div class="col-md-12 col-lg-7 products-number-sort">
                <form
                  class="form-inline d-block d-lg-flex justify-content-between flex-column flex-md-row">
                  <div id="show-select" class="products-number"><strong>Show</strong>
                    <a href="" class="sh btn btn-sm btn-outline-secondary">12</a><a href="" class="sh btn btn-sm btn-outline-secondary">24</a><a href="" class="sh btn btn-sm btn-outline-secondary">36</a>
                    <span>products</span>
                  </div>
                  <div class="products-sort-by mt-2 mt-lg-0"><strong>Sort by</strong>
                    <select name="sort-by" class="form-control">
                      <option>Price</option>
                      <option>Name</option>
                      <option>Sales first</option>
                    </select>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="row products">
            @forelse($products as $product)
              <x-product :product="$product"/>
            @empty
              <p>empty.</p>
            @endforelse
            <!-- /.products-->
          </div>
          <div class="pages">
            <p class="loadMore"><a href="#" class="btn btn-primary btn-lg"><i
                  class="fa fa-chevron-down"></i> Load more</a></p>
            <nav aria-label="Page navigation example" class="d-flex justify-content-center">
              <ul class="pagination">
                <li class="page-item"><a href="?page={{$page>1?$page-1:1}}" aria-label="Previous" class="page-link"><span
                      aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>
                @if($total/$show<1)
                    <li class="page-item active"><a href="?page=1" class="page-link">1</a></li>
                @else
                  @for($i=1;$i<=ceil($total/$show);$i++)
                    <li class="page-item{{$page==$i?' active':''}}"><a href="?{{'show='.$show.'&page='.$i}}" class="page-link">{{$i}}</a></li>
                  @endfor
                @endif
                <li class="page-item"><a href="?page={{$page<$total/$show?$page+1:$page}}" aria-label="Next" class="page-link"><span
                      aria-hidden="true">»</span><span class="sr-only">Next {{$total/$show}}</span></a></li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /.col-lg-9-->
      </div>
    </div>
    @push('scripts')
    <script>
      $(document).ready(function () {
        const params = new URLSearchParams(window.location.search);
        let show, page;
        if (params.has('show'))
          show = params.get('show')
        else
          show = 12;
        if (params.has('page'))
          page = params.get('page')
        else
          page = 1;
        let showSelect = $('#show-select');
        showSelect.find('a').each(function () {
          $(this).attr('href', '?page=1' + '&show=' + $(this).text())
        })
        showSelect.find('a:contains('+show+')').toggleClass('btn-primary').toggleClass('btn-outline-secondary');
      })
    </script>
    @endpush
  </div>
    <!--
    END Category
    -->
@endsection
