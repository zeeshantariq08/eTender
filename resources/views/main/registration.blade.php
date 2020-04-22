@extends('layouts.mainlayout')
@section('content')

   <!-- breadcrumb area start -->
    <div class="breadcrumb-area jarallax" style="background-image:url({{ asset('img/bg/4.png') }}) ;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <ul class="page-list">
                            <li><a href="index-2.html">Home</a></li>
                            <li>Registration</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
         <div class="register-page-area pd-bottom-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-6 mb-5 mb-md-0">
                    <form class="contact-form-wrap contact-form-bg">
                        <h4 class="text-center">Login</h4>
                        <div class="rld-single-input">
                            <input type="text" placeholder="Entry Login">
                        </div>
                        <div class="rld-single-input">
                            <input type="password" placeholder="Entry Password">
                        </div>
                        <div class="btn-wrap">
                            <button class="btn btn-yellow">Sign In</button>
                        </div>
                    </form>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <form class="contact-form-wrap contact-form-bg">
                        <h4>Registration</h4>
                        <div class="rld-single-input">
                            <input type="text" placeholder="Name">
                        </div>
                        <div class="rld-single-input">
                            <input type="text" placeholder="Email">
                        </div>
                        <div class="rld-single-input">
                            <input type="text" placeholder="Password">
                        </div>
                        <div class="rld-single-input">
                            <input type="text" placeholder="Contact">
                        </div>
                        <div class="rld-single-select mt-2">
                            <select name="tender_category_id" required class="select single-select">
                               <option>Select Role</option> 
                               <option>Car</option> 
                               <option>Bike</option> 
                            </select>
                        </div>
                        <div class="btn-wrap">
                            <button class="btn btn-yellow">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- breadcrumb area End -->

    <!-- contact area start -->
   
    <!-- contact area End -->
@endsection

