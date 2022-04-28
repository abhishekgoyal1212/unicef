
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="{{asset('public/user-assets/css/style.css')}}">
  <!-- toastr css-->
  <link href="{{asset('public/user-assets/css/toastr.css')}}" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <!-- toastr css-->
  <link href="{{asset('public/user-assets/css/toastr.css')}}" rel="stylesheet"/>
  <!-- toastr JS-->
  <script src="{{asset('public/user-assets/js/jquery-1.9.1.min.js')}}"></script>
  <script src="{{asset('public/user-assets/js/toastr.js')}}"></script>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="page-section" style="background: url({{asset('public/user-assets/img/background.jpg')}}); background-repeat: no-repeat; background-size: cover; padding: 50px 0px 40px 0px; ">
  @if(session('flash-error'))
  <script> toastr["error"] ("{{session()->get('flash-error')}}") </script>
  @endif
<!--   @if ( session('flash-success'))
  <script> toastr["success"]("{{session()->get('flash-success')}}") </script>
  @endif -->
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
<!--               @error('email')
              <div class="form-valid-error">{{ $message }}</div>
              @enderror -->
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
              <a href="" class="forget">Forget Your Password?</a>
            </div>
            <div class="col-md-12 text-center mb-2 mt-3">
              <button type="submit" class="login-btn">LOGIN</button>
            </div>
            <div class="login w-100 text-center">
              <p class="mb-0 text-center">or Login with google</p>
            </div>
            <div class="col-md-12 mb-2">
              <div class="lg-google bg-white text-dark text-center shadow-sm"><img src="https://img.icons8.com/color/24/000000/google-logo.png"/> &nbsp; Login with Google</div>
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
</body>
<script type="text/javascript">
  $(document).ready(function() {
    $(".for-error").attr("data-content", "this is new")
  })
</script>
</html>