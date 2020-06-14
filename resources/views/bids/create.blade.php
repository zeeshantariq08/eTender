@extends('layouts.app')

@section('title', 'Create Bid')
@section('titleicon', 'fa fa-gavel')

@section('content')
    {{-- <div class="row">
        <div class="col-lg-12">
            <!-- Block with Options -->
			<div class="block full">
			    <!-- Block with Options Title -->
			    <div class="block-title">
			    	<h2> <i class="fa fa-plus"></i> <strong> {{$tender->title ?? ''}} </strong> </h2>
			        <div class="block-options pull-right">
	                    <a href="{{ route('tenders.index') }}" class="btn btn-alt btn-sm btn-primary" title="Go To Tender List "><i class="fa fa-gavel"></i> Tenders </a>

			        </div>
			    </div>
			    <!-- END Block with Options Title -->
			    <!-- Block Content -->
			   	@if (Session::has('company_exist'))
				    <div class="alert alert-danger alert-dismissible">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    <strong>Danger!</strong> {{ Session::get('company_exist') }}
					</div>
				@endif

			    <div class="block-content">
			        <div class="block-content">

			        	<form  action="{{($bid->id) ? route('tenders.bids.update', [$tender->id, $bid->id] ) : route('tenders.bids.store', $tender->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" >

					        @csrf

			        		@if($bid->id)
			        			@method('PUT')
			        		@endif

					        <div class="col-12">

					        	<div class="form-group col-xs-6 col-md-3 @if($errors->has('ntn_number')) has-error @endif">
						            <label class="control-label">Ntn Number <span>*</span></label>

						            <input type="text" name="ntn_number" class="form-control" value="{{ old('ntn_number', $bid->ntn_number) }}" placeholder="Ntn Number" required>

						            @if($errors->has('ntn_number'))
		                                <span class="help-block animation-slideDown text-danger">
		                                	{{$errors->first('ntn_number')}}
		                                </span>
		                            @endif

						        </div>


						        <div class="form-group col-xs-6 col-md-3 @if($errors->has('company_name')) has-error @endif">
						            <label class="control-label">Company Name <span>*</span></label>

						            <input type="text" name="company_name" class="form-control" value="{{ old('company_name', $bid->company_name) }}" placeholder="Company Name" required>

						            @if($errors->has('company_name'))
		                                <span class="help-block animation-slideDown text-danger">
		                                	{{$errors->first('company_name')}}
		                                </span>
		                            @endif

						        </div>

						        <div class="form-group col-xs-6 col-md-3 @if($errors->has('experience')) has-error @endif">
						            <label class="control-label"> Experience <span>*</span></label>

						            <input type="text"  name="experience" class="form-control" value="{{ old('experience', $bid->experience) }}"  placeholder="Company Experience" required>

						            @if($errors->has('experience'))
		                                <span class="help-block animation-slideDown text-danger">
		                                	{{$errors->first('experience')}}
		                                </span>
		                            @endif

						        </div>

						        <div class="form-group col-xs-6 col-md-3 @if($errors->has('amount')) has-error @endif">
						            <label class="control-label"> Bidding Amount <span>*</span></label>

						            <input type="text"  name="amount" class="form-control" value="{{ old('amount', $bid->amount) }}"  placeholder="Company Amount" required>

						            @if($errors->has('amount'))
		                                <span class="help-block animation-slideDown text-danger">
		                                	{{$errors->first('amount')}}
		                                </span>
		                            @endif

						        </div>

						        
						        
						    </div>

						    <div class="col-12">

						    	<div class="form-group col-xs-6 col-md-3 @if($errors->has('contact_person')) has-error @endif">
						            <label class="control-label">Contact Person <span>*</span></label>

						            <input type="text" name="contact_person" class="form-control" value="{{ old('contact_person', $bid->contact_person) }}" placeholder="Contact Person" required>

						            @if($errors->has('contact_person'))
		                                <span class="help-block animation-slideDown text-danger">
		                                	{{$errors->first('contact_person')}}
		                                </span>
		                            @endif

						        </div>

					        	<div class="form-group col-xs-6 col-md-3 @if($errors->has('email')) has-error @endif">
						            <label class="control-label">Email Address <span>*</span></label>

						            <input type="text" name="email" class="form-control" value="{{ old('email', $bid->email) }}" placeholder="Email Address" required>

						            @if($errors->has('email'))
		                                <span class="help-block animation-slideDown text-danger">
		                                	{{$errors->first('email')}}
		                                </span>
		                            @endif

						        </div>

						        <div class="form-group col-xs-6 col-md-3 @if($errors->has('contact_no')) has-error @endif">
						            <label class="control-label">Contact Number <span>*</span></label>

						            <input type="text" name="contact_no" class="form-control" value="{{ old('contact_no', $bid->contact_no) }}" placeholder="Contact Number" required>

						            @if($errors->has('contact_no'))
		                                <span class="help-block animation-slideDown text-danger">
		                                	{{$errors->first('contact_no')}}
		                                </span>
		                            @endif

						        </div>

						        <div class="form-group col-xs-6 col-md-3 @if($errors->has('upload_file')) has-error @endif">
						            <label class="control-label">Upload File<span>*</span></label>

						            <input type="file" name="upload_file" class="form-control" required>

						            @if($errors->has('upload_file'))
		                                <span class="help-block animation-slideDown text-danger">
		                                	{{$errors->first('upload_file')}}
		                                </span>
		                            @endif

						        </div>
						    </div>

					        <div class="form-group form-actions">
					            <div class="col-md-12 mt-5">
					                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-paper-plane"></i> Submit</button>
					                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
					            </div>
					        </div>
						</form>
			        </div>
			    </div>
			    <!-- END Block Content -->
			</div>
			<!-- END Block with Options -->
        </div>
    </div> --}}



    <div class="row">
		<div class="col-lg-4">

			<div class="block">
				<div class="block-title">
				<h2><i class="fa fa-gavel"> </i> About <strong> Tender</strong></h2>
				</div>
				<div class="row">
				<div class="col-lg-12">
				
				<h4><strong> {{$tender->title ?? ''}} </strong></h4>

				<address>
				<i class="fa fa-map-marker"> </i> {{ $tender->company_address ?? '' }}
				<br> <br>
				<i class="fa fa-phone"></i> {{ $tender->company_phone_no ?? '' }}<br>
				<i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">{{ $tender->company_email ?? '' }}</a>
				</address>

				<table class="table table-borderless table-striped">
					<tbody>
						<tr>
							<td><strong> Reference No </strong></td>
							<td>{{$tender->reference_no ?? ''}}</td>
						</tr>
						<tr>
							<td><strong> Open Date </strong></td>
							<td><span class="label label-success">{{$tender->open_date->format('d-m-Y') ?? '00-00-0000'}}</span></td>
						</tr>
						<tr>
							<td><strong> Close Date </strong></td>
							<td><span class="label label-danger">{{$tender->close_date->format('d-m-Y') ?? '00-00-0000'}}</span></td>
						</tr>

						<tr>
							<td><strong> Category </strong></td>
							<td><span class="label label-info">{{$tender->tenderCategories->title ?? ''}}</span></td>
						</tr>
					</tbody>
				</table>
				
				</div>
				</div>
			</div>
		</div>
		<div class="col-lg-8">

			<div class="block">
			    <!-- Block with Options Title -->
			    <div class="block-title">
			    	<h2> <i class="fa fa-plus"></i> <strong> Create </strong>  Bid</h2>
			        <div class="block-options pull-right">
	                    <a href="{{ route('tenders.index') }}" class="btn btn-alt btn-sm btn-primary" title="Go To Tender List "><i class="fa fa-gavel"></i> Tenders </a>

			        </div>
			    </div>
			    <!-- END Block with Options Title -->
			    <!-- Block Content -->

			   	@if (Session::has('company_exist'))
				    <div class="alert alert-danger alert-dismissible">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    <strong>Danger!</strong> {{ Session::get('company_exist') }}
					</div>
				@endif

			    <div class="block-content">

			        	<form  action="{{($bid->id) ? route('tenders.bids.update', [$tender->id, $bid->id] ) : route('tenders.bids.store', $tender->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">

					        @csrf

			        		@if($bid->id)
			        			@method('PUT')
			        		@endif

					        <div class="col-12">

					        	<div class="form-group col-xs-6 col-md-6 @if($errors->has('ntn_number')) has-error @endif">
						            <label class="control-label">Ntn Number <span>*</span></label>

						            <input type="text" name="ntn_number" class="form-control" value="{{ old('ntn_number', $bid->ntn_number) }}" placeholder="Ntn Number" required autofocus>

						            @if($errors->has('ntn_number'))
		                                <span class="help-block animation-slideDown text-danger">
		                                	{{$errors->first('ntn_number')}}
		                                </span>
		                            @endif

						        </div>


						        <div class="form-group col-xs-6 col-md-6 @if($errors->has('company_name')) has-error @endif">
						            <label class="control-label">Company Name <span>*</span></label>

						            <input type="text" name="company_name" class="form-control" value="{{ old('company_name', $bid->company_name) }}" placeholder="Company Name" required>

						            @if($errors->has('company_name'))
		                                <span class="help-block animation-slideDown text-danger">
		                                	{{$errors->first('company_name')}}
		                                </span>
		                            @endif

						        </div>

						        <div class="form-group col-xs-6 col-md-6 @if($errors->has('experience')) has-error @endif">
						            <label class="control-label"> Experience <span>*</span></label>

						            <input type="text"  name="experience" class="form-control" value="{{ old('experience', $bid->experience) }}"  placeholder="Company Experience" required>

						            @if($errors->has('experience'))
		                                <span class="help-block animation-slideDown text-danger">
		                                	{{$errors->first('experience')}}
		                                </span>
		                            @endif

						        </div>

						        <div class="form-group col-xs-6 col-md-6 @if($errors->has('amount')) has-error @endif">
						            <label class="control-label"> Bidding Amount <span>*</span></label>

						            <input type="number"  name="amount" class="form-control" value="{{ old('amount', $bid->amount) }}"  placeholder="Company Amount" required>

						            @if($errors->has('amount'))
		                                <span class="help-block animation-slideDown text-danger">
		                                	{{$errors->first('amount')}}
		                                </span>
		                            @endif

						        </div>

						        
						        
						    </div>

						    <div class="col-12">

						    	<div class="form-group col-xs-6 col-md-6 @if($errors->has('contact_person')) has-error @endif">
						            <label class="control-label">Contact Person <span>*</span></label>

						            <input type="text" name="contact_person" class="form-control" value="{{ old('contact_person', $bid->contact_person) }}" placeholder="Contact Person" required>

						            @if($errors->has('contact_person'))
		                                <span class="help-block animation-slideDown text-danger">
		                                	{{$errors->first('contact_person')}}
		                                </span>
		                            @endif

						        </div>

					        	<div class="form-group col-xs-6 col-md-6 @if($errors->has('email')) has-error @endif">
						            <label class="control-label">Email Address <span>*</span></label>

						            <input type="text" name="email" class="form-control" value="{{ old('email', $bid->email) }}" placeholder="Email Address" required>

						            @if($errors->has('email'))
		                                <span class="help-block animation-slideDown text-danger">
		                                	{{$errors->first('email')}}
		                                </span>
		                            @endif

						        </div>

						        <div class="form-group col-xs-6 col-md-6 @if($errors->has('contact_no')) has-error @endif">
						            <label class="control-label">Contact Number <span>*</span></label>

						            <input type="text" name="contact_no" class="form-control" value="{{ old('contact_no', $bid->contact_no) }}" placeholder="Contact Number" required>

						            @if($errors->has('contact_no'))
		                                <span class="help-block animation-slideDown text-danger">
		                                	{{$errors->first('contact_no')}}
		                                </span>
		                            @endif

						        </div>

						        <div class="form-group col-xs-6 col-md-6 @if($errors->has('upload_file')) has-error @endif">
						            <label class="control-label">Upload File<span>*</span></label>

						            <input type="file" name="upload_file" class="form-control" required>

						            @if($errors->has('upload_file'))
		                                <span class="help-block animation-slideDown text-danger">
		                                	{{$errors->first('upload_file')}}
		                                </span>
		                            @endif

						        </div>
						    </div>

					        <div class="form-group form-actions mt-2">
					            <div class="col-md-12 mt-5 text-center">
					                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-paper-plane"></i> Submit</button>
					                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
					            </div>
					        </div>
						</form>
			    </div>
			    <!-- END Block Content -->
			</div>
		</div>
	</div>
@endsection
