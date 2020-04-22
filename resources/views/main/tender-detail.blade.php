@extends('layouts.mainlayout')

@section('navbar')
    @include('main.top-navbar')
@endsection

@section('content')

<!-- breadcrumb area start -->
   {{--  <div class="breadcrumb-area jarallax" style="background-image:url(assets/img/bg/4.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <h1 class="page-title">News Details</h1>
                        <ul class="page-list">
                            <li><a href="index-2.html">Home</a></li>
                            <li>News Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- breadcrumb area End -->

    <!-- News details area Start -->
    <div class="news-details-area pd-top-90 mt-5">
        <div class="container">
            <div class="news-details-author-social">
                <div class="row">
                    <div class="col-sm-6 mb-4 mg-sm-0">
                        <div class="author">
                            <h4 class="page-title">Tender Detail</h4>
                            {{-- <p></p> --}}
                            <p> <span> By <b>{{$tender->user->name ?? ''}} </b> </span> </p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                    	<ul class="info-list">
                                    
                                </ul>
                        <ul class="social-icon style-two text-sm-right">
                            
                            <li> Open <b class="text-success">  {{$tender->open_date->format('d M, Y')}} </b> </li>
                            <li> Close <b class="text-danger"> {{$tender->close_date->format('d M, Y')}}  </b></li>

                            {{-- <li>
                                <a class="twitter" href="#" target="_blank"><i class="fa fa-twitter  "></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center pd-top-60">
                <div class="col-lg-8">
                    <div class="news-details-wrap">
                        <h3 class="title1"> {{$tender->title ?? ''}} </h3>
                        <p>{{$tender->description}}</p>
                    </div>
                    <!-- comments-area-start -->
                    <div class="comments-area">
                    	<hr>
                        <h4 class="comments-title"> Bids ({{$tender->bids->count()}})</h4>
                        <ul class="comment-list">
                            <li>
                                <div class="single-comment-wrap">
                                    <div class="thumb">
                                        title
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Sara Koivisto</h4>
                                        <p>Fun kitchen and not cookie cutter! The appliance garage is easy to access and good looking on the inside too. I’ve also recently remodeled my kitchen and eliminated </p>
                                        <a href="#" class="like"><i class="fa fa-heart-o"></i>Like 235</a>
                                        <a href="#" class="reply">Reply</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- comments-area-end -->
                </div>
            </div>
        </div>
    </div>
    <!-- News details area End -->
@endsection