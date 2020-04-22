@extends('layouts.auth')

@section('page_title')
    Login
@endsection
@section('content')

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}"  id="" class="form-horizontal">
            @csrf
            <div class="form-group @error('email') has-error @enderror">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                        <input type="text" id="login-email" name="email" class="form-control input-lg  @error('email') is-invalid @enderror" placeholder="Email">
                    </div>
                    @error('email')
                    <div class="help-block animation-slideDown text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group @error('password') has-error @enderror">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                        <input type="password" id="password" name="password" class="form-control input-lg " placeholder="Password">
                    </div>
                    @error('password')
                    <div class="help-block animation-slideDown text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group form-actions">
                <div class="col-xs-4">
                    <label class="switch switch-primary" data-toggle="tooltip" title="Remember Me?">
                        <input type="checkbox" id="login-remember-me" name="login-remember-me" checked>
                        <span></span>
                    </label>
                </div>
                <div class="col-xs-8 text-right">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Login to Dashboard</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12 text-center">
                    <a href="password/reset"><small>Forgot password?</small></a>
                </div>
            </div>
        </form>

       
@endsection

{{-- 
<div id="login-container" class="animation-fadeIn">
<div class="login-title text-center">
<h1><i class="gi gi-flash"></i> <strong>ProUI</strong><br><small>Please <strong>Login</strong> or <strong>Register</strong></small></h1>
</div>
<div class="block push-bit">
<form action="index.php" method="post" id="form-login" class="form-horizontal form-bordered form-control-borderless" novalidate="novalidate">
<div class="form-group">
<div class="col-xs-12">
<div class="input-group">
<span class="input-group-addon"><i class="gi gi-envelope"></i></span>
<input type="text" id="login-email" name="login-email" class="form-control input-lg" placeholder="Email">
</div>
</div>
</div>
<div class="form-group">
<div class="col-xs-12">
<div class="input-group">
<span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
<input type="password" id="login-password" name="login-password" class="form-control input-lg" placeholder="Password">
</div>
</div>
</div>
<div class="form-group form-actions">
<div class="col-xs-4">
<label class="switch switch-primary" data-toggle="tooltip" title="" data-original-title="Remember Me?">
<input type="checkbox" id="login-remember-me" name="login-remember-me" checked="">
<span></span>
</label>
</div>
<div class="col-xs-8 text-right">
<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Login to Dashboard</button>
</div>
</div>
<div class="form-group">
<div class="col-xs-12 text-center">
<a href="javascript:void(0)" id="link-reminder-login"><small>Forgot password?</small></a> -
<a href="javascript:void(0)" id="link-register-login"><small>Create a new account</small></a>
</div>
</div>
</form>
<form action="login.php#reminder" method="post" id="form-reminder" class="form-horizontal form-bordered form-control-borderless display-none" novalidate="novalidate">
<div class="form-group">
<div class="col-xs-12">
<div class="input-group">
<span class="input-group-addon"><i class="gi gi-envelope"></i></span>
<input type="text" id="reminder-email" name="reminder-email" class="form-control input-lg" placeholder="Email">
</div>
</div>
</div>
<div class="form-group form-actions">
<div class="col-xs-12 text-right">
<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Reset Password</button>
</div>
</div>
<div class="form-group">
<div class="col-xs-12 text-center">
<small>Did you remember your password?</small> <a href="javascript:void(0)" id="link-reminder"><small>Login</small></a>
</div>
</div>
</form>
<form action="login.php#register" method="post" id="form-register" class="form-horizontal form-bordered form-control-borderless display-none" novalidate="novalidate">
<div class="form-group">
<div class="col-xs-6">
<div class="input-group">
<span class="input-group-addon"><i class="gi gi-user"></i></span>
<input type="text" id="register-firstname" name="register-firstname" class="form-control input-lg" placeholder="Firstname">
</div>
</div>
<div class="col-xs-6">
<input type="text" id="register-lastname" name="register-lastname" class="form-control input-lg" placeholder="Lastname">
</div>
</div>
<div class="form-group">
<div class="col-xs-12">
<div class="input-group">
<span class="input-group-addon"><i class="gi gi-envelope"></i></span>
<input type="text" id="register-email" name="register-email" class="form-control input-lg" placeholder="Email">
</div>
</div>
</div>
<div class="form-group">
<div class="col-xs-12">
<div class="input-group">
<span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
<input type="password" id="register-password" name="register-password" class="form-control input-lg" placeholder="Password">
</div>
</div>
</div>
<div class="form-group">
<div class="col-xs-12">
<div class="input-group">
<span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
<input type="password" id="register-password-verify" name="register-password-verify" class="form-control input-lg" placeholder="Verify Password">
</div>
</div>
</div>
<div class="form-group form-actions">
<div class="col-xs-6">
<a href="#modal-terms" data-toggle="modal" class="register-terms">Terms</a>
<label class="switch switch-primary" data-toggle="tooltip" title="" data-original-title="Agree to the terms">
<input type="checkbox" id="register-terms" name="register-terms">
<span></span>
</label>
</div>
<div class="col-xs-6 text-right">
<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Register Account</button>
</div>
</div>
<div class="form-group">
<div class="col-xs-12 text-center">
<small>Do you have an account?</small> <a href="javascript:void(0)" id="link-register"><small>Login</small></a>
</div>
</div>
</form>
</div>
<footer class="text-muted text-center">
<small><span id="year-copy">2014-20</span> © <a href="https://1.envato.market/x4R" target="_blank">ProUI 3.8</a></small>
</footer>
</div>
 --}}