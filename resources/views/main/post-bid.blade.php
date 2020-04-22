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
        	<h5 class="mt-4">{{$tender->title ?? 'de'}}</h5>
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    @if (Session::has('company_exist'))
                        <div class="alert alert-danger alert-dismissible mt-4 mb-0">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Danger!</strong> {{ Session::get('company_exist') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('tenders.bids.store', $tender->id) }}"  enctype="multipart/form-data" class="contact-form-wrap contact-form-bg">

                        <h5 class="text-center "> Post Bid </h5>

                        @csrf
                        
                        <div class="row ">
                            <input type="hidden" name="from_bider" value="from_bider">
                            <div class="col-md-6 mt-2">
                                <div class="rld-single-input @if($errors->has('company_name')) text-danger @endif">
                                    <label for=""> <b> Company Name* </b> </label>
                                    <input type="text" name="company_name" placeholder="Company Name" value="{{ old('company_name') }}" >

                                    @if($errors->has('company_name')) 
                                        <span class="text-danger"> {{$errors->first('company_name')}} </span>
                                    @endif
                                    
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="rld-single-input @if($errors->has('company_reg_no')) text-danger @endif">
                                    <label for=""> <b> Company Registration Number* </b> </label>
                                    <input type="text" name="company_reg_no" placeholder="Company registration Number" >
                                    
                                    @if($errors->has('company_reg_no')) 
                                        <span class="text-danger"> {{$errors->first('company_reg_no')}} </span>
                                    @endif
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="rld-single-input @if($errors->has('contact_person')) text-danger @endif">
                                    <label for=""> <b> Contact Person* </b> </label>
                                    <input type="text" name="contact_person" placeholder="Contact Person" required>

                                    @if($errors->has('contact_person')) 
                                        <span class="text-danger"> {{$errors->first('contact_person')}} </span>
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="rld-single-input @if($errors->has('email')) text-danger @endif">
                                    <label for=""> <b> Email* </b> </label>
                                    <input type="text" name="email" placeholder="Email" required>

                                    @if($errors->has('email')) 
                                        <span class="text-danger"> {{$errors->first('email')}} </span>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="row">
                        	<div class="col-md-6">
                                <div class="rld-single-input @if($errors->has('contact_no')) text-danger @endif">
                                    <label for=""> <b> Contact Number* </b> </label>
                                    <input type="text" name="contact_no" placeholder="Contact Number" required>

                                    @if($errors->has('contact_no')) 
                                        <span class="text-danger"> {{$errors->first('contact_no')}} </span>
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
                       
                        <div class="rld-single-input">
                            <button type="reset" class="btn btn-secondary btn-xs"> Reset </button>
                            <button type="submit" class="btn btn-success btn-xs"> Submit </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- <script type="text/javascript">
        $("#province").change(function(){
            $.ajax({
                //alert();
                url: "{{ route('districts.get_by_province') }}?province_id=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    console.log(data);
                    $('#district').append(data.html);
                    $(".select-chosen").trigger("chosen:updated");
                }
            });
        });
    </script> --}}
@endsection
