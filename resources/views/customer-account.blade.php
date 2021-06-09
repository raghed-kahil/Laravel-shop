{{Session::get('wrongPassword',123).' '.Auth::user()->password}}
@extends('master')
@section('content')
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">My account</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-3">
              <x-costumer-side-bar-menu :page="3"/>
            </div>
            <div class="col-lg-9">
              <div class="box">
                <h1>My account</h1>
                <p class="lead">Change your personal details or your password here.</p>
                <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                <h3>Change password</h3>
                <form action="" method="post">
                  @csrf
                  <input name="change-password" type="hidden" value=1>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password_old">Old password</label>
                        <input name="password_old" id="password_old" type="password" class="form-control">
                        @if($wrongPassword)
                          <div class="text-danger">Incorrect Password!</div>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password">New password</label>
                        <input id="password" name="password" type="password" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password_confirmation">Retype new password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control">
                        <div id="not-match" style="display: none" class="text-danger">Passwords not match!</div>
                      </div>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="col-md-12 text-center">
                    <button id="submit-pass" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save new password</button>
                  </div>
                </form>
                <h3 class="mt-5">Personal details</h3>
                <form id="pd-form" method="post" action="">
                  @csrf
                  <input name="change-password" type="hidden" value=0>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input id="firstname" name="fname" type="text" class="form-control" value="{{$user->fname}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input id="lastname" name="lname" type="text" class="form-control" value="{{$user->lname}}">
                      </div>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="company">Company</label>
                        <input id="company" name="company" type="text" class="form-control" value="{{$user->company}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="street">Street</label>
                        <input id="street" name="street" type="text" class="form-control" value="{{$user->street}}">
                      </div>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="row">
                    <div class="col-md-6 col-lg-3">
                      <div class="form-group">
                        <label for="city">city</label>
                        <input id="city" name="city" type="text" class="form-control" value="{{$user->city}}">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="form-group">
                        <label for="zip">ZIP</label>
                        <input id="zip" name="zip" type="text" class="form-control" value="{{$user->zip}}">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="form-group">
                        <label for="state">State</label>
                        <input id="state" name="state" class="form-control" value="{{$user->state}}">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="form-group">
                        <label for="country">Country</label>
                        <input id="country" name="country" class="form-control" value="{{$user->country}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="phone">Phone</label>
                        <input id="phone" name="phone" type="tel" class="form-control" value="{{$user->phone}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="text" class="form-control" value="{{$user->email}}">
                        <div id="not-valid-email" style="display: none" class="text-danger">Please enter a valid Email!</div>
                      </div>
                    </div>
                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                    </div>
                  </div>
                </form>
                <script>
                  $(document).ready(function (){
                    const pass = $('#password,#password_confirmation');
                    const NF = $('#not-match');
                    const submit = $('#submit-pass');
                    pass.keyup(function () {
                      if($('#password').val()!==$('#password_confirmation').val()){
                        pass.addClass('border-danger');
                        NF.show();
                        submit.attr('disabled',true)
                      }
                      else {
                        pass.removeClass('border-danger');
                        NF.hide();
                        submit.attr('disabled',false);
                      }})
                    const expression = new RegExp('^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,5})$');
                    const email = $('#email');
                    $('#pd-form').submit(function () {
                      if (expression.test(email.val()))
                        return true;
                      else {
                        email.focus();
                        email.addClass('border-danger');
                        $('#not-valid-email').show();
                        return false;
                      }
                    })
                  });
                </script>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
