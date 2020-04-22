@extends('layouts.block' , [ 'b_type' => 'table', 'b_options' => 'ft'])

@section('b-title')
    <h2> <i class="fa fa-users"></i> <strong> User Groups </strong></h2>
@overwrite
@section('b-subtitle')
    List
@overwrite

@section('b-options')
    <a href="{{ route('usergroups.create') }}" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="" data-original-title="Create User"><i class="fa fa-plus"></i></a>
@overwrite

@section('b-thead')
    <tr>
        <th class="text-center">ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Permissions</th>
        <th class="text-center">Status</th>
        <th class="text-center">Actions</th>
    </tr>
@endsection

@section('b-tbody')
    @foreach ($usergroups as $row)
        <tr>
            <td class="text-center"> {{ $row->id }} </td>
            <td> {{ $row->name }} </td>
            <td> {{ $row->description }} </td>
            <td> 
                {{-- <select  readonly>
                    @if ($row->permissions)
                        @foreach ($row->permissions as $permission)
                            <option selected>{{$permission->title}}</option>
                        @endforeach
                    @else
                        <option selected>No Permission Given Yet</option>
                    @endif
                </select> --}}

                <div class="btn-group">
                    <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-alt btn-primary dropdown-toggle" aria-expanded="false">Permissions <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-custom text-left">
                        
                        @forelse ($row->permissions as $per)
                            <li class="dropdown-header">{{$per->title}}</li>
                        @empty
                            <li class="dropdown-header">No Permission Given Yet</li>
                        @endforelse

                    </ul>
                </div>

            </td>
            <td class="text-center">
                <form action="{{ route('usergroups.toggleStatus', $row->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <label class="switch switch-info">
                        <input {{ $row->status ? 'checked' : '' }} onclick="this.form.submit()" type="checkbox">
                        <span {{ $row->status ? 'title=Active' : 'title=Inactive' }} data-toggle="tooltip"></span>
                    </label>
                </form>
            </td>
            <td class="text-center">
                <div class="btn-group">
                    <a href="{{ route('usergroups.show', $row->slug) }}" data-toggle="tooltip" title="View" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('usergroups.edit',$row->slug) }}" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>

                </div>
            </td>
        </tr>
    @endforeach

@endsection
