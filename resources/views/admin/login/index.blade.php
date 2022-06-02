<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{asset('public/user-assets/css/style.css')}}">
  <!-- toastr css-->
  <link href="{{asset('public/user-assets/css/toastr.css')}}" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <!-- toastr css-->
  <link href="{{asset('public/user-assets/css/toastr.css')}}" rel="stylesheet"/>
  <!-- toastr JS-->
  <script src="{{asset('public/user-assets/js/jquery-1.9.1.min.js')}}"></script>
  <script src="{{asset('public/user-assets/js/toastr.js')}}"></script>
  <!-- <script src="{{asset('public/user-assets/js/platform.js')}}"></script> -->


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="page-section" style="background: url({{asset('public/user-assets/img/background.jpg')}}); background-repeat: no-repeat; background-size: cover; padding: 50px 0px 40px 0px; ">
  @if(session('flash-error'))
  <script> toastr["error"] ("{{session()->get('flash-error')}}") </script>
  @endif
  @if ( session('flash-success'))
  <script> toastr["success"]("{{session()->get('flash-success')}}") </script>
  @endif


@yield('content')


  </body>
<script type="text/javascript">
  $(document).ready(function() {
    $(".for-error").attr("data-content", "this is new")
  })
</script>

<script type="text/javascript">
        function login() 
        {
          var myParams = {
            'clientid' : '737568756811-45o1buf7vnppm19p4he028d6p0lmvr03.apps.googleusercontent.com',
            'cookiepolicy' : 'single_host_origin',
            'callback' : 'loginCallback',
            'approvalprompt':'force',
            'scope' : 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read'
          };
          gapi.auth.signIn(myParams);
        }

        function loginCallback(result)
        {
            if(result['status']['signed_in'])
            {
                var request = gapi.client.plus.people.get(
                {
                    'userId': 'me'
                });
                request.execute(function (resp)
                {
                    /* console.log(resp);
                    console.log(resp['id']); */
                    var email = '';
                    if(resp['emails'])
                    {
                        for(i = 0; i < resp['emails'].length; i++)
                        {
                            if(resp['emails'][i]['type'] == 'account')
                            {
                                email = resp['emails'][i]['value'];//here is required email id
                            }
                        }
                    }
                   var usersname = resp['displayName'];//required name
                });
            }
        }
        function onLoadCallback()
        {
            gapi.client.setApiKey('YOUR_API_KEY');
            gapi.client.load('plus', 'v1',function(){});
        }

            </script>

        <script type="text/javascript">
              (function() {
               var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
               po.src = 'https://apis.google.com/js/client.js?onload=onLoadCallback';
               var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
             })();
        </script>
</html>