<!--
              *** CUSTOMER MENU ***
              _________________________________________________________
              -->
<div class="card sidebar-menu">
  <div class="card-header">
    <h3 class="h4 card-title">Customer section</h3>
  </div>
  <div id="card-div" page={{$page}} class="card-body">
    <ul class="nav nav-pills flex-column">
      <a href="/customer-orders" class="nav-link"><i class="fa fa-list"></i> My orders</a>
      <a href="/customer-wishlist" class="nav-link"><i class="fa fa-heart"></i> My wishlist</a>
      <a href="/customer-account" class="nav-link"><i class="fa fa-user"></i> My account</a>
      <a href="/logout" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a>
      <script>
        $(document).ready(function () {
          let card = $('#card-div');
          card.find('a:nth-child('+card.attr('page')+')').toggleClass('active');
        });
      </script>
    </ul>
  </div>
</div>
<!-- /.col-lg-3-->
<!-- *** CUSTOMER MENU END ***-->
