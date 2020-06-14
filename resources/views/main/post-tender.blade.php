@extends('layouts.mainlayout')
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

@section('navbar')
    @include('main.top-navbar')
@endsection

@section('content')
    <!-- add-tender-area start -->
    <div class="add-new-property-area pd-top-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <form method="POST" action="{{ route('tenders.store') }}"  enctype="multipart/form-data" class="contact-form-wrap contact-form-bg">

                        <h4 class="text-center"> Add Tender </h4>

                        @csrf

                        <div class="row">
                            <input type="hidden" name="from_tender" value="from_tender">
                            <div class="col-md-6">
                                <div class="rld-single-input @if($errors->has('reference_no')) text-danger @endif">
                                    <label for=""> <b> Reference Number* </b> </label>
                                    <input type="text" name="reference_no" placeholder="Reference Number" value="{{ old('reference_no') }}" >

                                    @if($errors->has('reference_no')) 
                                        <span class="text-danger"> {{$errors->first('reference_no')}} </span>
                                    @endif
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="rld-single-input @if($errors->has('title')) text-danger @endif">
                                    <label for=""> <b> Title* </b> </label>
                                    <input type="text" name="title" placeholder="Title" >
                                    
                                    @if($errors->has('title')) 
                                        <span class="text-danger"> {{$errors->first('title')}} </span>
                                    @endif
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="rld-single-input @if($errors->has('open_date')) text-danger @endif">
                                    <label for=""> <b> Open Date </b> </label>
                                    <input type="date" name="open_date" placeholder="Open Date" required>

                                    @if($errors->has('open_date')) 
                                        <span class="text-danger"> {{$errors->first('open_date')}} </span>
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="rld-single-input @if($errors->has('close_date')) text-danger @endif">
                                    <label for=""> <b> Close Date* </b> </label>
                                    <input type="date" name="close_date" placeholder="Close Date" required>

                                    @if($errors->has('close_date')) 
                                        <span class="text-danger"> {{$errors->first('close_date')}} </span>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="rld-single-select mt-2 @if($errors->has('province_id')) text-danger @endif">
                                    <label><b> Select Province* </b></label>
                                    <select name="province_id" id="province" class="select single-select select2">
                                       <option>Select</option> 
                                       @foreach ($provinces as $province)
                                           <option value="{{$province->id}}">{{$province->name}}</option> 
                                       @endforeach
                                    </select>

                                    @if($errors->has('province_id')) 
                                        <span class="text-danger"> {{$errors->first('province_id')}} </span>
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="rld-single-select mt-2 @if($errors->has('district_id')) text-danger @endif">
                                    <label><b>Select District</b></label>
                                    <select name="district_id" id="district" required class="select single-select select2">
                                       <option>Select</option> 
                                       {{-- @foreach ($provinces as $province)
                                            @foreach ($province->districts as $district)
                                                <option value="{{$district->id}}">{{$district->name}}</option> 
                                            @endforeach
                                       @endforeach --}}
                                    </select>

                                    @if($errors->has('district_id')) 
                                        <span class="text-danger"> {{$errors->first('district_id')}} </span>
                                    @endif

                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="rld-single-select mt-2 @if($errors->has('tender_category_id')) text-danger @endif">
                                    <label><b> Select Category* </b></label>
                                    <select name="tender_category_id" required class="select single-select select2">
                                       <option>Select</option> 
                                       @foreach ($categories as $category)
                                           <option value="{{$category->id}}"> {{$category->title}} </option>
                                       @endforeach
                                    </select>

                                    @if($errors->has('tender_category_id')) 
                                        <span class="text-danger"> {{$errors->first('tender_category_id')}} </span>
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="rld-single-input mt-2 @if($errors->has('upload_file')) text-danger @endif">
                                    <label for=""> <b> Upload File* </b> </label>
                                    <input type="file" name="upload_file" placeholder="Upload File">

                                    @if($errors->has('upload_file')) 
                                        <span class="text-danger"> {{$errors->first('upload_file')}} </span>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="rld-single-input mt-2 @if($errors->has('description')) text-danger @endif">
                                    <label for=""> <b> Description* </b></label>
                                    <textarea name="description" rows="10" placeholder="Description" style="resize: none;"></textarea>

                                    @if($errors->has('description')) 
                                        <span class="text-danger"> {{$errors->first('description')}} </span>
                                    @endif

                                </div>
                            </div>
                            
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="rld-single-input @if($errors->has('company_ntn')) text-danger @endif">
                                    <label for=""> <b> Company NTN* </b> </label>
                                    <input type="text" name="company_ntn" placeholder="Reference Number" value="{{ old('company_ntn') }}" >

                                    @if($errors->has('company_ntn')) 
                                        <span class="text-danger"> {{$errors->first('company_ntn')}} </span>
                                    @endif
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="rld-single-input @if($errors->has('company_name')) text-danger @endif">
                                    <label for=""> <b> Company Name* </b> </label>
                                    <input type="text" name="company_name" placeholder="Company Name" >
                                    
                                    @if($errors->has('company_name')) 
                                        <span class="text-danger"> {{$errors->first('company_name')}} </span>
                                    @endif
                                   
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="rld-single-input @if($errors->has('company_email')) text-danger @endif">
                                    <label for=""> <b> Company Email* </b> </label>
                                    <input type="text" name="company_email" placeholder="Company Email" value="{{ old('company_email') }}" >

                                    @if($errors->has('company_email')) 
                                        <span class="text-danger"> {{$errors->first('company_email')}} </span>
                                    @endif
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="rld-single-input @if($errors->has('company_phone_no')) text-danger @endif">
                                    <label for=""> <b> Company Contact Number* </b> </label>
                                    <input type="text" name="company_phone_no" placeholder="Contact No" >
                                    
                                    @if($errors->has('company_phone_no')) 
                                        <span class="text-danger"> {{$errors->first('company_phone_no')}} </span>
                                    @endif
                                   
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="rld-single-input mt-2 @if($errors->has('company_address')) text-danger @endif">
                                    <label for=""> <b> Company Address* </b></label>
                                    <textarea name="company_address" rows="10" placeholder="Company Address" style="resize: none;"></textarea>

                                    @if($errors->has('company_address')) 
                                        <span class="text-danger"> {{$errors->first('company_address')}} </span>
                                    @endif

                                </div>
                            </div>
                            
                        </div>
                       
                        <div class="rld-single-input">
                            <button type="reset" class="btn btn-secondary btn-xs"> Reset </button>
                            <button type="submit" class="btn btn-success btn-xs"> Submit </button>
                        </div>
                        <ul class="social-icon">
                            <li class="ml-0">
                                <a href="#" target="_blank"><i class="fa fa-facebook  "></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="fa fa-twitter  "></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

