<!DOCTYPE html>
<html class="no-js" lang="en"> 
    <head>
        <meta charset="utf-8">
        <title>{{ isset($title) ? $title :  config('app.name') }} </title>
        @include('layouts.partials.styles')
    </head>
    <body>
    @include('layouts.partials.page_head')
    <!-- Page content -->
    <div id="page-content">
        <!-- Page Header -->
        <div class="content-header">
            <div class="header-section">
                @hasSection('titleicon')
                    <i class="@yield('titleicon') pull-right fa-3x text-muted"></i>
                @endif
                <h1>
                    @yield('title') <small> @yield('subtitle') </small>
                </h1>
            </div>
        </div>
        <ul class="breadcrumb breadcrumb-top">
            <li><a href="{{ url("home") }}"> <i class="fa fa-home"></i> </a></li>
            @foreach($segments =  request()->segments() as $key => $segment)
                @if ($loop->last)
                    <li class="breadcrumb-item active"> {{$segment}} </li>
                @else
                    <li class="breadcrumb-item"> <a href="{{ url(implode(array_slice($segments, 0, $key + 1), "/")) }}"> {{ $segment }} </a> </li>
                @endif
            @endforeach
        </ul>
        @yield('content')
    </div>

@include('layouts.partials.page_footer')
 @yield('scripts')
{!! Toastr::message() !!}
