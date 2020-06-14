@extends('layouts.mainlayout')
@section('content')

   <!-- breadcrumb area start -->
    <div class="breadcrumb-area" style="background-image:url({{ asset('img/bg/4.png') }}) ;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <h1 class="page-title">eTender</h1>
                        <ul class="page-list">
                            <li><a href="{{ route('main.index') }}">Home</a></li>
                            <li>Registration</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area End -->

    <!-- contact area start -->
    <div class="register-page-area pd-bottom-100 ">
        <div class="container">
            <div class="row justify-content-center">
                
                <div class="col-xl-5 col-lg-5 col-md-6 mb-5 mb-md-0">
                    <form  action="{{ route('client.login') }}" method="POST" class="contact-form-wrap contact-form-bg">
                        <h4> Login </h4>

                        @csrf
                        <input type="hidden" name="client_login" value="client_login">
                        <div class="rld-single-input">
                            <input type="email" name="email" required placeholder="Email">
                        </div>
                       
                        <div class="rld-single-input">
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        @if (Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show mt-2 mb-0" role="alert">
                              <strong>Error! </strong> {{ Session::get('error')}}
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: 0px;">
                                <span aria-hidden="true" >&times;</span>
                              </button>
                            </div>
                        @endif
                        
                        <div class="btn-wrap">
                            <button type="submit" class="btn btn-yellow">Sign In</button>
                        </div>
                    </form>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <form class="contact-form-wrap contact-form-bg" action="{{ route('users.store') }}" method="POST">
                        <h4> Registration </h4>
                        @csrf

                        <input type="hidden" name="clent_registration" value="clent_registration">
                        <div class="rld-single-input">
                            <input type="text" name="name" placeholder="Name">
                        </div>
                        <div class="rld-single-input">
                            <input type="text" name="email" placeholder="Email">
                        </div>
                        <div class="rld-single-input">
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <div class="rld-single-input">
                            <input type="text" name="contact" placeholder="Contact">
                        </div>
                        <div class="rld-single-select mt-2">
                            <select name="user_group_id" required class="select single-select">
                               <option disabled>Select Role</option> 
                               @foreach ($usergroups as $group)
                                   <option value="{{$group->id}}"> {{$group->name}} </option> 
                               @endforeach
                            </select>
                        </div>
                        <div class="btn-wrap">
                            <button type="submit" class="btn btn-yellow">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area End -->
@endsection

