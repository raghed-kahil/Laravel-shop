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
                        <li aria-current="page" class="breadcrumb-item active">New account / Sign in</li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-6">
                <div class="box">
                    <h1>New account</h1>
                    <p class="lead">Not our registered customer yet?</p>
                    <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>
                    <p class="text-muted">If you have any questions, please feel free to <a href="contact">contact us</a>, our customer service center is working for you 24/7.</p>
                    <hr>
                    <form id="register-form" name="register-form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input id="firstname" name="fname" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input id="lastname" name="lname" type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="text" class="form-control" required>
                            @error('email')
                            <div id="email-exist" class="text text-danger">Email already exist, login instead?</div>
                            @enderror
                            <div id="not-valid-email" class="text text-danger" style="display: none">Please enter a valid email</div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" name="password" type="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required>
                            <div id="not-match" class="text text-danger" style="display: none">Passwords don't match</div>

                        </div>
                        <div class="text-center">
                            <button id="submit" type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                        </div>
                        <script>
                            $(document).ready(function (){
                                const pass = $('#password,#password_confirmation');
                                const NF = $('#not-match');
                                const submit = $('#submit');
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
                                    }
                                })
                                const expression = new RegExp('^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,5})$');
                                const email = $('#email');
                                $('#register-form').submit(function () {
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
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="box">
                    <h1>Login</h1>
                    <p class="lead">Already our customer?</p>
                    <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                    <hr>
                    <form action="login" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="login-email" name="email" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="login-password" name="password" type="password" class="form-control">
                        </div>
                      @if($errorLogin)
                        <div class="text-danger">Wrong username or password</div>
                      @endif
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
