@extends('auth.master')
@section('content')
<div class="block-center mt-xl wd-xl login" id="card">
 <!-- START panel-->
 <div class="panel panel-flat front signin_form">
  <div class="panel-heading text-center">
   <div class="login-icon">
     <img src="{{ asset('img/User-Circle.png') }}" alt="" width="100">
   </div>
   <h2>Signup</h2>
 </div>
 <div class="panel-body">
  <form action="{{ route('register') }}" method="post" class="mb-lg">
   @csrf
   @component('components.warning-alert')
   @endcomponent
    <div class="form-group has-feedback">
    <span class="icon-user form-control-feedback text-muted"></span>
    <input name="first_name" type="first_name" placeholder="First Name" class="form-control">
    
  </div>
  <div class="form-group has-feedback">
    <span class="icon-user form-control-feedback text-muted"></span>
    <input name="last_name" type="last_name" placeholder="Last Name" class="form-control">
    
  </div>
   <div class="form-group has-feedback">
    <span class="icon-user form-control-feedback text-muted"></span>
    <input name="email" type="email" placeholder="Email" class="form-control">
    
  </div>
  <div class="form-group has-feedback">
   <span class="icon-lock form-control-feedback text-muted"></span>
   <input name="password" type="password" placeholder="Password" class="form-control">
   
 </div>
 <div class="form-group has-feedback">
   <span class="icon-lock form-control-feedback text-muted"></span>
   <input name="password_confirmation" type="password" placeholder="Password" class="form-control">
   
 </div>
 <div class="form-group">
  <div class="form-check checkbox c-checkbox">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" name="remember" value="Value" {{ old('remember') ? 'checked' : '' }}>  <span class="fa fa-check"></span>{{ __('Remember Me') }}
    </label>
  </div>
</div>
<div class="clearfix">
 
 {{-- <div class="pull-left" style="color:#FFFFFF"><a href="{{ route('login') }}" class="text-muted">{{ __('login') }}</a> --}}
 <div class="pull-right" style="color:#FFFFFF"><a href="{{ route('register.pass') }}" class="text-muted">{{ __('Forgot Your Password?') }}</a>
 </div>
</div>
<button type="submit" class="btn btn-block btn-ig mt-lg">{{ __('Register') }}</button>
</form>
</div>
</div>
<!-- END panel-->
</div>
@endsection

@section('custom_js')

@endsection