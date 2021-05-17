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
                            <li aria-current="page" class="breadcrumb-item active">Verify Email</li>
                        </ol>
                    </nav>
                    <div id="error-page" class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="box text-center py-5">
                                <p class="text-center"><img src="/img/logo.png" alt="Obaju template"></p>
                                <h3>Please verify your email address</h3>
                                <p class="text-center">if you didn't receive an Email use the <strong>button</strong> below.</p>
                                <form class="buttons" method="post" action="verification-notification">
                                    @csrf
                                    <button type="submit" class="btn btn-lg btn-primary">Resend Email</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div/>
@endsection
