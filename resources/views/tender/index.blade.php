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
			    	<h2> <i class="fa fa-gavel"></i> <strong> Tenders </strong> </h2>
			        <div class="block-options pull-right">
	                    <a href="{{ route('tenders.create') }}" class="btn btn-alt btn-sm btn-primary" title="Create New Tender"><i class="fa fa-plus"></i> Add </a>
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
								        <th>Title</th>
								        <th>Open Date</th>
								        <th>Close Date </th>
								        <th>Document </th>
								        <th>Tender Category</th>
								        <th>Status</th>
								        <th>Total Bids</th>
								        <th class="text-center">Action</th>
								    </tr>
			                    </thead>
			                    <tbody>
			                    	@foreach ($tenders as $element)
				                    	<tr>
							                <td class="text-center"> {{$element->id}} </td>
							                <td> {{$element->title}} </td>
							                <td> {{$element->open_date->format('Y-m-d')}} </td>
							                <td> {{$element->close_date->format('Y-m-d')}} </td>
							                <td>
	 											<a class="btn btn-info btn-sm" title="Click to Download"  href="{{ url('/storage/'.$element->upload_file) }}" download> Download </a> 
	 											</td>
							                <td> {{$element->tenderCategories->title}} </td>

							                <td>
							                	<a href="{{route('tenders.tenderStatus', $element->id)}}" class="btn btn-sm {{ $element->status == 1 ? 'btn-success' : 'btn-danger' }}  confirm-status" title="Click to change">

			                                        {{ $element->status == 1 ? 'Active' : 'InActive' }}
			                                    </a>
                                    
							                </td>

							                <td class="text-center"> 

							                	<div class="btn-group-sm">
													<span class="btn btn-success" >
														{{$element->bids->count()}}
													</span>

													<a href="{{ route('tenders.bids.index', $element->id) }}" data-toggle="tooltip" title="" class="btn btn-info" data-original-title="View Bids">
														<i class="fa fa-eye"></i>
													</a>

													
												</div>
							                </td>
							                <td class="text-center">
												<div class="btn-group-sm">
													<a href="{{ route('tenders.edit', $element->id) }}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Edit">
														<i class="fa fa-pencil"></i>
													</a>

													<a href="{{ route('tenders.destroy', $element->id) }}" data-toggle="tooltip" title="" class="btn btn-danger confirm-delete" data-original-title="Delete">
														<i class="fa fa-remove"></i>
													</a>
													
													{{-- <form  method="post" action="{{ route('tenders.destroy', $element->id) }}">

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

        <form method="post" id="status-form"> 
            @method('PUT')
            @csrf

        </form>


    </div>
@endsection

