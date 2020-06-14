@extends('layouts.mainlayout')
@section('navbar')
    @include('main.top-navbar')
@endsection

@section('styles')
    <style>
        .select2-container .select2-selection--single{
            height:44px !important;
            padding-top:5px !important; 
            padding-left: 5px;
            background-color: #eee !important;
        }
        .select2-container--default .select2-selection--single{
            border: 1px solid #ccc !important; 
            border-radius: 3px !important; 
        }
    </style>
@endsection
@section('content')

  <div class="banner-area jarallax" style="background-image:url({{url('images/banner.png')}});">
        <div class="container">
            <div class="banner-inner-wrap">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="banner-inner">
                            <h5 class="sub-title">Checkout Top Tenders </h5>
                            <h1 class="title">Increase Your Tender Winning Chance</h1>
                            <div class="banner-btn-wrap">
                                <a class="btn btn-yellow mr-2" href="{{ route('search') }}">Top Search</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="call-to-action-area pd-top-70">
        <div class="container">
            <div class="call-to-action" style="background-image: url(assets/img/bg/1.png);">
                <div class="cta-content">
                    <h3 class="title">Welcome To eTender Service</h3>
                   {{--  <a class="btn btn-white" href="#">REGISTER NOW</a> --}}
                </div>
            </div>
        </div>
    </div>
     <div class="property-news-single-card style-two border-bottom-yellow" style="margin: 20px;">
        <h4>About Us</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In bibendum elit magna, ut placerat nunc tempus vel. Donec vitae dictum ligula. Phasellus congue maximus eleifend. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse potenti. Suspendisse sollicitudin posuere nunc et vehicula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas aliquam vitae quam at sodales. 
        </p>
        <a href="{{ route('search') }}"  style="text-align: right;float: right; ">Top Tenders.....</a>
                       
    </div>
@endsection

    