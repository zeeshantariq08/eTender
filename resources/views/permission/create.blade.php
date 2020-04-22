@extends('layouts.app')

@section('title', 'Create Tender')
@section('titleicon', 'fa fa-gavel')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!-- Block with Options -->
			<div class="block full">
			    <!-- Block with Options Title -->
			    <div class="block-title">
			    	<h2> <i class="fa fa-plus"></i> <strong> Create Permission  </strong> </h2>
			        <div class="block-options pull-right">
	                    <a href="{{ route('permissions.index') }}" class="btn btn-alt btn-sm btn-primary" title="Go To Tender List "><i class="fa fa-gavel"></i> Permissions </a>

			        </div>
			    </div>
			    <!-- END Block with Options Title -->
			    <!-- Block Content -->
			    <div class="block-content">
			        <div class="block-content">

			        	<form  action="{{ ($permission->id) ? route('permissions.update', $permission->id ) : route('permissions.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" >

					        @csrf

			        		@if($permission->id)
			        			@method('PUT')
			        		@endif
			        		
					        <div class="col-12">
					        	<div class="form-group col-xs-6 col-md-6 @if($errors->has('title')) has-error @endif">
						            <label class="control-label" for="rfn">Reference Number <span>*</span></label>
						            
						            <input type="text"  name="title" class="form-control" value="{{ old('title', $permission->title) }}" placeholder="Please Enter Permission Title" autofocus>

						            @if($errors->has('title'))
		                                <span class="help-block animation-slideDown text-danger">
		                                	{{$errors->first('title')}}
		                                </span>
		                            @endif

						        </div>
						    </div>

					        <div class="form-group form-actions">
					            <div class="col-md-2 mt-5" style="margin-top: 30px !important;">
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

@endsection
