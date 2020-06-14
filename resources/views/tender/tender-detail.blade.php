@extends('layouts.app')

@section('title', 'Tender Detail')
@section('titleicon', 'fa fa-gavel')

@section('content')
	<div class="row">
		<div class="col-lg-4">

			<div class="block">
				<div class="block-title">
				<h2><i class="fa fa-building-o"></i> About <strong> Company</strong></h2>
				</div>
				<div class="row">
				<div class="col-lg-12">
				
				<h4><strong> {{ $tender->company_name ?? '' }} </strong></h4>

				<address>
				<i class="fa fa-map-marker"> </i> {{ $tender->company_address ?? '' }}
				<br> <br>
				<i class="fa fa-phone"></i> {{ $tender->company_phone_no ?? '' }}<br>
				<i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">{{ $tender->company_email ?? '' }}</a>
				</address>
				
				</div>
				</div>
			</div>
		</div>
		<div class="col-lg-8">

			<div class="block">
				<div class="block-title">
					<div class="block-options pull-right">
						<a href="{{ route('tenders.bids.create', $tender->id) }}" class="btn btn-alt btn-sm btn-info" data-toggle="tooltip" title="" data-original-title="Add Bid "><i class="fa fa-plus"></i> Add Bid </a>

						<a href="{{ URL::previous() }}" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="" data-original-title="go Back"><i class="fa fa-window-close"></i> Go Back </a>

					</div>
					<h2><strong>Tender </strong> Description </h2>
				</div>
				<table class="table table-borderless table-striped">
					<tbody>
						<tr>
							<td style="width: 20%;"><strong> Title </strong></td>
							<td>{{$tender->title ?? ''}}</td>
						</tr>
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

						<tr>
							<td><strong> Total Bids </strong></td>
							<td><span class="label label-info">  {{$tender->bids->count() ?? 0}}</span></td>
						</tr>
							<td style="width: 20%;"><strong>Description</strong></td>
							<td> {{$tender->description ?? ''}} </td>
						</tr>
					</tbody>
				</table>
			</div>

			{{-- <div class="block">
				<div class="block-title">
				<h2><strong>Tender</strong> Description </h2>
				</div>
				<dl>
				<dt> Title </dt>
				<dd> {{ $tender->title ?? '' }} </dd>
				<dt>Euismod</dt>
				<dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
				<dd>Donec id elit non mi porta gravida at eget metus.</dd>
				<dt>Malesuada porta</dt>
				<dd>Etiam porta sem malesuada magna mollis euismod.</dd>
				</dl>
			</div>	 --}}
		</div>
	</div>

@endsection

