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
								        <th>NTN Number</th>
								        <th>Amount</th>
								        <th>Experience</th>
								        <th>Contact Person</th>
								        <th>Email</th>
								        <th>Document</th>
								        <th>Tender</th>
								        <th>Current Status</th>
								        <th>Change Status</th>

								        <th class="text-center">Action</th>
								    </tr>
			                    </thead>
			                    <tbody>
			                    	@foreach ($bids as $element)
				                    	<tr>
							                <td class="text-center">{{$element->id}} </td>
							                <td> {{ Str::limit($element->company_decrypt, 5)}} {{-- {{ Str::limit($element->company_name,10)}} --}} </td>
							                <td> {{$element->ntn_number}} </td>
							                <td> {{ Str::limit($element->amount_decrypt, 5)}} </td>

							                <td>{{ Str::limit($element->experience_decrypt, 5)}}</td>
							                <td> {{ Str::limit($element->contact_person_decrypt, 5)}} </td>

							                <td> {{ Str::limit($element->email_decrypt, 5)}} </td>

							                <td>@if ($element->download_file)
	 											<a class="btn btn-info btn-sm" href="{{ url('/storage/'.$element->upload_file) }}" download> Download </a> @endif
	 										</td>
							                <td> {{$element->tender->title}} </td>
							                <td class="text-center"> {{$element->status}} </td>
							                 <td class="text-center">
								                <form action="{{ route('bidding.toggleStatus', $element->id) }}" method="post">
								                    @csrf
								                    @method('PUT')
								                    <label class="switch switch-info">
								                        <input {{$element->status == 'approved' ? 'checked' : '' }} onclick="this.form.submit()" type="checkbox">
								                        <span {{$element->status == 'approved' ? 'title=Active' : 'title=Inactive' }} data-toggle="tooltip"></span>
								                    </label>
								                </form>
								            </td>
							                <td class="text-center">
												<div class="btn-group-sm">
													<a href="{{ route('tenders.bids.edit', [$tender->id, $element->id] ) }}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Edit">
														<i class="fa fa-pencil"></i>
													</a>

													<a href="{{ route('tenders.bids.destroy', [$tender->id, $element->id]) }}" data-toggle="tooltip" title="" class="btn btn-danger confirm-delete" data-original-title="Delete">
														<i class="fa fa-remove"></i>
													</a>
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
