@extends('layouts.app')

@section('title', 'Permissions')
@section('titleicon', 'fa fa-setting-o')

@section('content')

    <div class="row">
        <div class="col-12">
        	<!-- Block with Options -->
			<div class="block full">
			    <!-- Block with Options Title -->
			    <div class="block-title">
			    	<h2> <i class="fa fa-gavel"></i> <strong> Tenders </strong> </h2>
			        <div class="block-options pull-right">
	                    <a href="{{ route('permissions.create') }}" class="btn btn-alt btn-sm btn-primary" title="Create New Tender"><i class="fa fa-plus"></i> Add </a>
			        </div>
			    </div>
			    <!-- END Block with Options Title -->
			    <!-- Block Content -->
			    <div class="block-content">
			        <div class="block-content">
			        	<div class="table-responsive">
			                <table class="table dataTable table-vcenter table-condensed table-bordered table-hover">
			                    <thead>
			                    	<tr>
								        <th>ID</th>
								        <th>Title</th>
								        <th class="text-center">Action</th>
								    </tr>
			                    </thead>
			                    <tbody>
			                    	@foreach ($permissions as $element)
				                    	<tr>
							                <td> {{$element->id}}</td>
							                <td> {{$element->title}}</td>
							                
							                <td class="text-center">
												<div class="btn-group-sm">
													<a href="{{ route('permissions.edit', $element->id) }}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Edit">
														<i class="fa fa-pencil"></i>
													</a>
													
													<form  method="post" action="{{ route('permissions.destroy', $element->id) }}">

													    @method("DELETE")
													    @csrf

													    <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Are You Sure?')"> Delete </button>
													</form>
												</div>
											</td>

							            </tr>
			                    	@endforeach
			                    </tbody>
			                </table>
			            </div>
			        </div>
			    </div>
			    <!-- END Block Content -->
			</div>
			<!-- END Block with Options -->
        </div>
    </div>
@endsection
