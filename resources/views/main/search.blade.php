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
                    <div class="col-12">
                        <div class="banner-inner mt-4">
                           {{--  <h5 class="sub-title">The Best Way To</h5> --}}
                            <h4 class="">Find Your Perfect Tender</h4>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="banner-search-wrap">
                            <ul class="nav nav-tabs rld-banner-tab">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs_1">Filter</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tabs_1">
                                    <div class="rld-main-search">
                                      <form action="{{ route('filter.tender') }}" method="post">

                                        @csrf

                                        <div class="row">
                                          <div class="col-md-4">
                                            <div class="rld-single-select mt-2 @if($errors->has('tender_category_id')) text-danger @endif">
                                                <label><b> Select Category </b></label>
                                                <select style="width:100%;" name="tender_category_id"  class="select single-select select2">
                                                   <option value="">Select</option> 
                                                   @foreach ($categories as $category)
                                                       <option value="{{$category->id}}">{{$category->title}}</option> 
                                                   @endforeach
                                                </select>

                                                @if($errors->has('tender_category_id')) 
                                                    <span class="text-danger"> {{$errors->first('tender_category_id')}} </span>
                                                @endif
                                               
                                              </div>
                                          </div>
                                          <div class="col-md-4">
                                            <div class="rld-single-select mt-2 @if($errors->has('province_id')) text-danger @endif">
                                                <label><b> Select Province </b></label>
                                                <select style="width:100%;" name="province_id" id="province" class="select single-select select2">
                                                   <option value="">Select</option> 
                                                      @foreach ($provinces as $province)
                                                        <option value="{{$province->id}}">{{$province->name}}</option> 
                                                      @endforeach
                                                    </select>

                                                    @if($errors->has('province_id')) 
                                                        <span class="text-danger"> {{$errors->first('province_id')}} </span>
                                                    @endif
                                              </div>
                                          </div>
                                          <div class="col-md-4">
                                            <div class="rld-single-select mt-2 @if($errors->has('district_id')) text-danger @endif">
                                                <label><b> Select Province* </b></label>
                                                <select style="width:100%;" name="district_id" class="select single-select select2">
                                                  <option value="">Select</option> 
                                                   @foreach ($provinces as $province)
                                                      @foreach ($province->districts as $district)
                                                          <option value="{{$district->id}}">{{$district->name}}</option> 
                                                      @endforeach
                                                    @endforeach
                                                  </select>
                                                    @if($errors->has('district_id')) 
                                                        <span class="text-danger"> {{$errors->first('district_id')}} </span>
                                                    @endif 
                                                  
                                              </div>
                                          </div>
                                          
                                          <div class="col-xl-2 col-lg-2 col-md-2">
                                                <button style="width:100%;" type="submit" class="btn btn-yellow mt-2">Search </button>
                                          </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection

    