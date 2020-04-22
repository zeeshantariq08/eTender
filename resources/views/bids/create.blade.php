@extends('layouts.app')

@section('title', 'Create Bid')
@section('titleicon', 'fa fa-gavel')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!-- Block with Options -->
			<div class="block full">
			    <!-- Block with Options Title -->
			    <div class="block-title">
			    	<h2> <i class="fa fa-plus"></i> <strong> {{$tender->title ?? ''}} </strong> </h2>
			        <div class="block-options pull-right">
	                    <a href="{{ route('tenders.index') }}" class="btn btn-alt btn-sm btn-primary" title="Go To Tender List "><i class="fa fa-gavel"></i> Tenders </a>

	                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" title="Add Tender Category" onclick="$('#modal-tender-category').modal('show');" ><i class="fa fa-plus"></i> Add Category </a>

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

						        <div class="form-group col-xs-6 col-md-3 @if($errors->has('company_name')) has-error @endif">
						            <label class="control-label">Company Name <span>*</span></label>

						            <input type="text" name="company_name" class="form-control" value="{{ old('company_name', $bid->company_name) }}" placeholder="Company Name" required>

						            @if($errors->has('company_name'))
		                                <span class="help-block animation-slideDown text-danger">
		                                	{{$errors->first('company_name')}}
		                                </span>
		                            @endif

						        </div>

						        <div class="form-group col-xs-6 col-md-3 @if($errors->has('company_reg_no')) has-error @endif">
						            <label class="control-label"> Company Registration Number <span>*</span></label>

						            <input type="text"  name="company_reg_no" class="form-control" value="{{ old('company_reg_no', $bid->company_reg_no) }}"  placeholder="Company Registration Number" required>

						            @if($errors->has('company_reg_no'))
		                                <span class="help-block animation-slideDown text-danger">
		                                	{{$errors->first('company_reg_no')}}
		                                </span>
		                            @endif

						        </div>

						        <div class="form-group col-xs-6 col-md-3 @if($errors->has('ntn_number')) has-error @endif">
						            <label class="control-label">Ntn Number <span>*</span></label>

						            <input type="text" name="ntn_number" class="form-control" value="{{ old('ntn_number', $bid->ntn_number) }}" placeholder="Ntn Number" required>

						            @if($errors->has('ntn_number'))
		                                <span class="help-block animation-slideDown text-danger">
		                                	{{$errors->first('ntn_number')}}
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
    </div>


    <div id="modal-tender-category" class="modal" tabindex="-1">
		<div class="modal-dialog ">
			<div class="modal-content">
				<div class="modal-header text-center">
					<h3 class="modal-title"><i class="fa fa-gavel"></i> Add Category</h3>
				</div>
				<div class="modal-body">
					<form action="{{ route('tenderCategories.store') }}" method="post"  class="form-horizontal form-bordered">

						@csrf

						<div class="form-group">
							<label class="col-md-2 control-label">Title <span>*</span> </label>
							<div class="col-md-10">
								<input type="text" name="title" class="form-control" autofocus>
							</div>
						</div>
						<div class="form-group form-actions">
							<div class="col-xs-12 text-right">

							<button type="reset" class="btn btn-sm btn-default" data-dismiss="modal" value="reset" >Close</button>

							<button type="submit" class="btn btn-sm btn-primary">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection
