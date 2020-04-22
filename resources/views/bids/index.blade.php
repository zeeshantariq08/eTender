@extends('layouts.app')

@section('title', 'Tenders')
@section('titleicon', 'fa fa-gavel')

@section('content')

    <div class="row">
        <div class="col-12">
        	<!-- Block with Options -->
			<div class="block full">
			    <!-- Block with Options Title -->
			    <div class="block-title">
			    	<h2> <i class="fa fa-gavel"></i> <strong> Tender Bids </strong> </h2>
			        <div class="block-options pull-right">
	                    <a href="{{ route('tenders.bids.create', $tender->id) }}" class="btn btn-alt btn-sm btn-primary" title="Create New Tender"><i class="fa fa-plus"></i> Add </a>
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
								        <th class="text-center">ID</th>
								        <th>Company Name</th>
								        <th>Registration Number</th>
								        <th>Contact Person</th>
								        <th>Email</th>
								        <th>Document</th>
								        <th>Tender</th>
								        <th>Status</th>
								        <th class="text-center">Action</th>
								    </tr>
			                    </thead>
			                    <tbody>
			                    	@foreach ($bids as $element)
				                    	<tr>
							                <td class="text-center">{{$element->id}} </td>
							                <td> {{$element->company_name}} </td>
							                <td> {{$element->company_reg_no}} </td>
							                <td>{{$element->contact_person}}</td>
							                <td> {{$element->email}} </td>
							                <td>@if ($element->download_file)
	 											<a class="btn btn-info btn-sm" href="{{ url('/storage/'.$element->upload_file) }}" download> Download </a> @endif
	 										</td>
							                <td> {{$element->tender->title}} </td>
							                <td class="text-center"> {{$element->status}} </td>
							                <td class="text-center">
												<div class="btn-group-sm">
													<a href="{{ route('tenders.bids.edit', [$tender->id, $element->id] ) }}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Edit">
														<i class="fa fa-pencil"></i>
													</a>

													<a href="{{ route('tenders.bids.destroy', [$tender->id, $element->id]) }}" data-toggle="tooltip" title="" class="btn btn-danger confirm-delete" data-original-title="Delete">
														<i class="fa fa-remove"></i>
													</a>
													
													{{-- <form  method="post" action="{{ route('tenders.bids.destroy', [$tender->id, $element->id]) }}">

													    @method("DELETE")
													    @csrf

													    <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Are You Sure?')"> Delete </button>
													</form> --}}
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
        
        <form method="post" id="delete-form"> 
            @method('DELETE')
            @csrf

        </form>

    </div>
@endsection
