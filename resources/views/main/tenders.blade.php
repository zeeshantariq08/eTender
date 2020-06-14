@extends('layouts.mainlayout')

@section('navbar')
    @include('main.top-navbar')
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
    <!-- user list area start -->
    <div class="user-list-area pd-top-100 pd-bottom-70 mt-5">
        <div class="section-title text-center">
            <h3>Tender List</h3>
        </div>
        <div class="container">
            <div class="row">
                @forelse ($tenders as $tender)
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-feature">
                            <div class="thumb">
                                <h6 class="p-2  bg-light">  {{Str::limit($tender->title, 70, '...')}}  </h6>
                            </div>
                            <div class="details pt-4">
                                <a href="" class="feature-logo" title="Click here to Download" download>
                                   <i class="fa fa-file-text-o fa-lg mt-2 pt-2">
                                       <br><br><span style="font-size: 10px;">Download</span>
                                   </i>
                                </a>
                                <p class="author"><i class="fa fa-user"> </i> Posted by <b> {{$tender->user->name}} </b></p>
                                <p class=""> {{Str::limit($tender->description, 150, '...')}} </p>
                                <ul class="info-list">
                                    <li> <i class="fa fa"> Open </i> <b class="text-success">  {{$tender->open_date->format('d M, Y')}} </b> </li>
                                    <li> <i class="fa fa"> Close </i> <b class="text-danger"> {{$tender->close_date->format('d M, Y')}}  </b></li>
                                </ul>

                                <ul class="info-list">
                                    <li><i class="fa fa"> Status </i> <b class="{{ $tender->status == 1 ? 'text-success' : 'text-danger' }} "> {{ $tender->status == 1 ? 'Active' : 'Closed' }}</b></li>
                                    <li><i class="fa fa"> Category </i> <b> {{$tender->tenderCategories->title}} </b></li>
                                </ul>
                                <ul class="contact-list ">
                                    <li><i class="fa fa-gavel ml-5"> Bids </i> [ <b>{{$tender->bids->count()}}</b> ]</li>
                                    @if ($tender->status == 1)
                                        <li class=""><a class="btn btn-yellow ml-2 mt-1" href="{{ route('post.bid', $tender->id) }}"> <i class="fa fa-eye text-white" title="Add Bid"></i> Add bid</a></li>
                                    @else
                                        <li class=""><span class="btn btn-danger ml-2 mt-1"> Closed</span></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12 col-sm-12">
                        <div class="alert alert-danger mt-2 mb-0" role="alert">
                          <strong> No Tender Available Right Now ..! </strong> 
                        </div>
                    </div>
                @endforelse 
            </div>

        </div>
    </div>
@endsection