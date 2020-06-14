@extends('layouts.app')

@section('title', 'welcome '. auth()->user()->name)
@section('titleicon', 'fa fa-columns')

@section('content')

<div class="row text-center">

		<div class="col-sm-6 col-lg-4">
            <a href="{{ route('tenders.create') }}" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background">
            <h4 class="widget-content-light"><strong>Add  </strong> New Tender </h4>
            </div>
            <div class="widget-extra-full"><span class="h2 animation-expandOpen"> <i class="fa fa-plus"></i> </span></div>
            </a>
        </div>

        <div class="col-sm-6 col-lg-4">
            <a href="{{ route('tenders.index') }}" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-dark">
            <h4 class="widget-content-light"><strong>All</strong> Tenders </h4>
            </div>
            <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{$tenders ?? ''}}</span></div>
            </a>
        </div>

        <div class="col-sm-6 col-lg-4">
            <a href="{{ url('home') }}" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-success">
            <h4 class="widget-content-light"><strong>Active</strong> Tenders </h4>
            </div>
            <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"> {{$active_tenders->count() ?? ''}} </span></div>
            </a>
        </div>
        {{--
        <div class="col-sm-6 col-lg-3">
            <a href="{{ route('booking.show', 'approved') }}" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-success">
            <h4 class="widget-content-light"><strong>Approved</strong> Request</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen">{{$approved_request ?? 0}}</span></div>
            </a>
        </div>

        <div class="col-sm-6 col-lg-3">
            <a href="{{ route('booking.show', 'pending') }}" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-warning">
            <h4 class="widget-content-light"><strong>Pending</strong> Request</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 text-warning animation-expandOpen">{{$pending_request ?? 0 }}</span></div>
            </a>
        </div> --}}
</div>

<div class="row">
        <div class="col-12">
            <!-- Block with Options -->
            <div class="block full">
                <!-- Block with Options Title -->
                <div class="block-title">
                    <h2> <i class="fa fa-gavel"></i> <strong> Active Tenders </strong> </h2>
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
								    </tr>

			                    </thead>
			                    <tbody>
			                    	@forelse ($active_tenders as $element)
				                    	<tr>
							                <td class="text-center"> {{$element->id}} </td>
							                <td> <a href="{{ route('tenders.show', $element->id) }}"  data-toggle="tooltip" data-original-title="View Detail"> {{$element->title}} </a> </td>
							                <td> {{$element->open_date->format('Y-m-d')}} </td>
							                <td> {{$element->close_date->format('Y-m-d')}} </td>
							                <td>
	 											<a class="btn btn-info btn-sm"  href="{{ url('/storage/'.$element->upload_file) }}" download  data-toggle="tooltip" data-original-title="Click to Download"> Download </a> 
	 											</td>
							                <td> {{$element->tenderCategories->title}} </td>

							                <td>

			                                    <span class="label label-success">{{ $element->status == 1 ? 'Active' : 'InActive' }}</span>
                                    
							                </td>
							            </tr>
							        @empty
							        	{{-- <tr>
                                            <td colspan="8" class="text-center text-danger"> <b> Do Data Found  </b></td>
                                        </tr> --}}
						            @endforelse
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
