@extends('layouts.app')

@section('title', 'Create Tender')
@section('titleicon', 'fa fa-gavel')

@section('content')

	
	<div class="row">
		
		<div class="col-lg-12">

			<div class="block">
				<div class="block-title">
					<div class="block-options pull-right">
						<a href="{{ route('tenders.index') }}" class="btn btn-alt btn-sm btn-primary" title="Go To Tender List "><i class="fa fa-gavel"></i> Tenders </a>

	                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" title="Add Tender Category" onclick="$('#modal-tender-category').modal('show');" ><i class="fa fa-plus"></i> Add Category </a>

					</div>
					<h2><strong>About </strong> Tender </h2>
				</div>

				{{-- <div class="block-title">
			    	<h2> <i class="fa fa-plus"></i> <strong> Create Tender  </strong> </h2>
			        <div class="block-options pull-right">
	                    <a href="{{ route('tenders.index') }}" class="btn btn-alt btn-sm btn-primary" title="Go To Tender List "><i class="fa fa-gavel"></i> Tenders </a>

	                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" title="Add Tender Category" onclick="$('#modal-tender-category').modal('show');" ><i class="fa fa-plus"></i> Add Category </a>

			        </div>
			    </div> --}}

				<form  action="{{ ($tender->id) ? route('tenders.update', $tender->id ) : route('tenders.store') }}" method="post" 
					enctype="multipart/form-data" >

					@csrf

	        		@if($tender->id)
	        			@method('PUT')
	        		@endif
					<div class="row">
						<div class="col-md-8">
							<div class="row">

								<div class="form-group col-xs-12 col-md-6 @if($errors->has('reference_no')) has-error @endif">
						            <label class="control-label" for="rfn">Reference Number <span>*</span></label>
						            
						            <input type="text" id="rfn" name="reference_no" class="form-control" value="{{ old('reference_no', $tender->reference_no) }}" placeholder="Enter Reference No" autofocus>

						            @if($errors->has('reference_no'))
			                            <span class="help-block animation-slideDown text-danger">
			                            	{{$errors->first('reference_no')}}
			                            </span>
			                        @endif

						        </div>

						        <div class="form-group col-xs-12 col-md-6 @if($errors->has('title')) has-error @endif">
						            <label class="control-label">Title <span>*</span></label>

						            <input type="text" name="title" class="form-control" value="{{ old('title', $tender->title) }}" placeholder="Tender Title" required>

						            @if($errors->has('title'))
			                            <span class="help-block animation-slideDown text-danger">
			                            	{{$errors->first('title')}}
			                            </span>
			                        @endif

						        </div>
							</div>

							<div class="row">
								<div class="form-group col-xs-12 col-md-6 @if($errors->has('open_date')) has-error @endif">
						            <label class="control-label"> Open Date <span>*</span></label>

						            <input type="date"  name="open_date" class="form-control" value="{{ old('open_date', $tender->open_date) }}"  placeholder="2020-02-02" required>

						            @if($errors->has('open_date'))
			                            <span class="help-block animation-slideDown text-danger">
			                            	{{$errors->first('open_date')}}
			                            </span>
			                        @endif

						        </div>

						        <div class="form-group col-xs-12 col-md-6 @if($errors->has('close_date')) has-error @endif">
						            <label class="control-label">Close Date <span>*</span></label>

						            <input type="date" name="close_date" class="form-control" value="{{ old('close_date', $tender->close_date) }}" placeholder="2020-02-02" required>

						            @if($errors->has('close_date'))
			                            <span class="help-block animation-slideDown text-danger">
			                            	{{$errors->first('close_date')}}
			                            </span>
			                        @endif

						        </div>

							</div>

							<div class="row">
								<div class="form-group col-xs-12 col-md-6 @if($errors->has('tender_category_id')) has-error @endif">
						            <label class="control-label">Tender Category<span>*</span></label>

						            <select  name="tender_category_id" class="select-chosen" data-placeholder="Choose a Tender Category.." style="width: 250px; display: none;">
										<option disabled selected> Select Category</option>
						            	@foreach ($tenderCategory as $category)
						            		<option 
						            		@if ($tender->tender_category_id === $category->id) selected 
						            		@endif 
						            		value="{{$category->id}}"> {{$category->title}}</option>
						            	@endforeach
									</select>
						            
						            @if($errors->has('tender_category_id'))
			                            <span class="help-block animation-slideDown text-danger">
			                            	{{$errors->first('tender_category_id')}}
			                            </span>
			                        @endif

						        </div>

						        <div class="form-group col-xs-12 col-md-6 @if($errors->has('upload_file')) has-error @endif">
						            <label class="control-label">Upload File<span>*</span></label>

						            <input type="file" name="upload_file" class="form-control" required>

						            @if($errors->has('upload_file'))
			                            <span class="help-block animation-slideDown text-danger">
			                            	{{$errors->first('upload_file')}}
			                            </span>
			                        @endif

						        </div>
							</div>

							<div class="row">
								<div class="form-group col-xs-12 col-md-6 @if($errors->has('province_id')) has-error @endif">
						            <label class="control-label"> Province <span >*</span></label>

						            <select  name="province_id" id="province" class="select-chosen" data-placeholder="Choose a Province.." style="width: 250px; display: none;">
										<option disabled selected> Select Province</option>

						            	@foreach($provinces as $province)
							                <option value="{{ $province->id }}">
							                    {{ $province->name }}
							                </option>
							            @endforeach
									</select>

						            @if($errors->has('province_id'))
			                            <span class="help-block animation-slideDown text-danger">
			                            	{{$errors->first('province_id')}}
			                            </span>
			                        @endif

						        </div>

						        <div class="form-group col-xs-12 col-md-6 @if($errors->has('district_id')) has-error @endif">
						            <label class="control-label">District <span>*</span></label>

						            <select  name="district_id" id="district" class="select-chosen" data-placeholder="Choose a District.." style="width: 250px; display: none;">
										<option selected disabled> Select District</option>
										@foreach($districts as $district)
							                <option value="{{ $district->id }}">
							                    {{ $district->name }}
							                </option>
							            @endforeach
									</select>

						            @if($errors->has('district_id'))
			                            <span class="help-block animation-slideDown text-danger">
			                            	{{$errors->first('district_id')}}
			                            </span>
			                        @endif

						        </div>
							</div>

							<div class="row">
								<div class="form-group col-xs-12 col-md-12 @if($errors->has('description')) has-error @endif">
						            <label class="control-label">Description<span>*</span></label>
						             <textarea name="description" id="" cols="30" rows="8" class="form-control" style="resize: none;">{{ old('description', $tender->description) }} </textarea>

						            @if($errors->has('description'))
			                            <span class="help-block animation-slideDown text-danger">
			                            	{{$errors->first('description')}}
			                            </span>
			                        @endif
						            
						        </div>
							</div>
						</div>

						<div class="col-lg-4">

							<div class="block">
								<div class="block-title">
									<h2><i class="fa fa-building-o"></i> About <strong> Company</strong></h2>
								</div>
								<div class="row">

									<div class="form-group col-xs-12 col-md-12 @if($errors->has('company_ntn')) has-error @endif">
							            <label class="control-label" for="name">Company NTN <span>*</span></label>
							            
							            <input type="text" id="rfn" name="company_ntn" class="form-control" value="{{ old('company_ntn', $tender->company_ntn) }}" placeholder="Enter Company company_ntn" autofocus>

							            @if($errors->has('company_ntn'))
					                        <span class="help-block animation-slideDown text-danger">
					                        	{{$errors->first('company_ntn')}}
					                        </span>
					                    @endif

							        </div>
								
									<div class="form-group col-xs-12 col-md-12 @if($errors->has('company_name')) has-error @endif">
							            <label class="control-label" for="company_name">Company Name <span>*</span></label>
							            
							            <input type="text" id="rfn" name="company_name" class="form-control" value="{{ old('company_name', $tender->company_name) }}" placeholder="Enter Company company_name" autofocus>

							            @if($errors->has('company_name'))
					                        <span class="help-block animation-slideDown text-danger">
					                        	{{$errors->first('company_name')}}
					                        </span>
					                    @endif

							        </div>

							        <div class="form-group col-xs-12 col-md-12 @if($errors->has('company_email')) has-error @endif">
							            <label class="control-label">Company Email <span>*</span></label>

							            <input type="text" name="company_email" class="form-control" value="{{ old('company_email', $tender->company_email) }}" placeholder="company_email address" required>

							            @if($errors->has('company_email'))
					                        <span class="help-block animation-slideDown text-danger">
					                        	{{$errors->first('company_email')}}
					                        </span>
					                    @endif

							        </div>

							        <div class="form-group col-xs-12 col-md-12 @if($errors->has('company_phone_no')) has-error @endif">
							            <label class="control-label">Contact No <span>*</span></label>

							            <input type="text" name="company_phone_no" class="form-control" value="{{ old('company_phone_no', $tender->company_phone_no) }}" placeholder="Contact No" required>

							            @if($errors->has('company_phone_no'))
					                        <span class="help-block animation-slideDown text-danger">
					                        	{{$errors->first('company_phone_no')}}
					                        </span>
					                    @endif
							        </div>

							        <div class="col-12">
							        	<div class="form-group col-xs-12 col-md-12 @if($errors->has('company_address')) has-error @endif">
								            <label class="control-label">company_Address<span>*</span></label>
								             <textarea name="company_address" id="" cols="30" rows="5" class="form-control" style="resize: none;">{{ old('company_address', $tender->company_address) }} </textarea>

								            @if($errors->has('company_address'))
				                                <span class="help-block animation-slideDown text-danger">
				                                	{{$errors->first('company_address')}}
				                                </span>
				                            @endif
								            
								        </div>
								    </div>

								    <div class="">
							            <div class="col-md-12 mt-5 form-group form-actions text-right">
							                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-paper-plane"></i> Submit</button>
							                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
							            </div>
							        </div>
								</div>
							</div>
						</div>
						
					</div>
				</form>
			</div>
		</div>
	</div>

	<!--end-->
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

@section('scripts')
    <script type="text/javascript">
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
    </script>
@endsection
