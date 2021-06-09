<!--
    *** TOPBAR ***
    _________________________________________________________
    -->
<div id="top">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offer mb-3 mb-lg-0"><a href="#" class="btn btn-success btn-sm">Offer of the day</a><a
          href="#" class="ml-1">Get flat 35% off on orders over $50!</a></div>
      <div class="col-lg-6 text-center text-lg-right">
        <ul class="menu list-inline mb-0">
          @if(Auth::check())
            <li class="list-inline-item"><a href="/customer-account">{{Auth::user()->fname.' '.Auth::user()->lname}}</a></li>
            <li class="list-inline-item"><a href="/logout">Logout</a></li>
          @else
          <li class="list-inline-item"><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
          <li class="list-inline-item"><a href="/register">Register</a></li>
          @endif
          <li class="list-inline-item"><a href="/contact">Contact</a></li>
          <li class="list-inline-item"><a>Recently viewed</a></li>
          <li class="list-inline-item"><a id="colour" href="#">Switch color</a></li>
          <script>
            let colors = [
              '/css/style.default.css','/css/style.blue.css','/css/style.red.css','/css/style.violet.css',
              '/css/style.green.css','/css/style.pink.css','/css/style.sea.css'];
            let counter = 0;
            $(document).ready(function () {
              $('#colour').off('click').on('click',function () {
                $('#theme-stylesheet').attr('href',colors[++counter%7]);
              })
            })
          </script>
        </ul>
      </div>
    </div>
  </div>
  <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Customer login</h5>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/login" method="post">
            @csrf
            <div class="form-group">
              <input id="email-modal" name="email" type="text" placeholder="email" class="form-control">
            </div>
            <div class="form-group">
              <input id="password-modal" name="password" type="password" placeholder="password" class="form-control">
            </div>
            <p class="text-center">
              <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
            </p>
          </form>
          <p class="text-center text-muted">Not registered yet?</p>
          <p class="text-center text-muted"><a href=/register"><strong>Register now</strong></a>! It is easy and done in
            1 minute and gives you access to special discounts and much more!</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- *** TOP BAR END ***-->
