@extends('admin.login.index')
@section('title','Forgot Password')
@section('content')
  <section class="login">
    <div class="container">
      <div class="row justify-content-between align-items-center">
        <div class="col-md-5">
          <h1>Welcome to Aravli </h1>
          <h4 class="my-3 login-box">Forgot Password</h4>
          <form class="row" action="{{ route('admin.forgot_password_save') }}" method="post">
            @csrf
            <div class="form-group col-md-12 mb-2 mt-2">
              <label for="Email">Enter  Email</label>
              <input type="email" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover" class="form-control bg-transparent for-error @error('email') is-invalid @enderror" id="Email" name="email" placeholder="Enter Your Email Address" autocomplete="email" autofocus>
              @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror 
            </div>
            <div class="col-md-12 text-center mb-2 mt-2">
              <button type="submit" class="login-btn">Submit</button>
            </div>
          </form>
        </div>
        <div class="col-md-6">
          <img src="{{asset('public/user-assets/img/login.png')}}" class="img-fluid" alt="">

        </div>
      </div>
    </div>
  </section>
@stop