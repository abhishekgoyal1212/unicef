
@extends('admin.login.index')
@section('title','Unicef Login')
@section('content')
  <section class="login">
    <div class="container">
      <div class="row justify-content-between align-items-center">
        <div class="col-md-5">
          <h1>Welcome to Aravli</h1>
          <h4 class="my-3 login-box">Login</h4>
          <form class="row" action="{{ route('admin.login_check') }}" method="post">
            @csrf
            <div class="form-group col-md-12">
              <label for="Email">Email address</label>
              <input type="email" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover" class="form-control bg-transparent for-error" id="Email" name="email" placeholder="Email address">
              @error('email')
              <div class="form-valid-error">{{ $message }}</div>
              @enderror 
            </div>
            <div class="form-group my-2 col-md-12">
              <label for="Password">Password</label>
              <input type="password" class="form-control bg-transparent for-error" id="Password" name="password" placeholder="Password">
              @error('password')
              <div class="form-valid-error">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-check mt-2 ml-3 col-md-6">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Keep me logged in</label>
            </div>
            <div class="col-md-5 mt-2 ml-auto">
              <a href="{{route('forgot-password')}}" class="forget">Forget Your Password?</a>
            </div>
            <div class="col-md-12 text-center mb-2 mt-3">
              <button type="submit" class="login-btn">LOGIN</button>
            </div>
            <div class="login w-100 text-center">
              <p class="mb-0 text-center">or Login with google</p>
            </div>
            <div class="col-md-12 mb-2">
              <div class="lg-google bg-white text-dark text-center shadow-sm" id="mySignin" onclick="login()"><img src="https://img.icons8.com/color/24/000000/google-logo.png"/> &nbsp; Login with Google</div>
              <!-- <div "><img src="google_image_here.png" alt="google" style="cursor:pointer;height: 60px;width: 309px;"/></div> -->
            </div>
            <div class="col-md-12 text-center">
              <p class="mb-0">Don't have an account? <a href="">Sign Up</a></p>
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