@extends('admin.sidebar')
@section('content')
<style>
  .profile-user-img {
    width: 130px;
    height: 130px;
}
.img-circle {
    border-radius: 50%;
}
.profile-user-img {
    border: 3px solid #adb5bd;
    margin: 0 auto;
    padding: 3px;
    width: 100px;
}

.img-fluid {
    max-width: 100%;
    height: auto;
}
  
</style>
<div class="col-sm-12" style="background-color: ;">
      
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             <h3>{{auth()->user()->name}}</h3>
            <h3>Profile</h3>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <form method="post" enctype="multipart/form-data" action="{{route('update_profile_photo')}}">
                  @csrf
                      <div class="avatar-edit">
                        <input type='file' name="avatar" id="profile_image_input"  accept=".png, .jpg, .jpeg"  />
                      <input type='file' name="avatar" id="profile_image_input" accept=".png, .jpg, .jpeg"/>
                        <i class="fa fa-camera"  id="upload_image" style="background-color: #fbf9f9; font-size: 20px; padding: 10px; border-radius: 100%; box-shadow: 3px 2px 2px 1px rgb(32 24 24 / 20%);"></i>
                      </div>
                      <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" 
                        src="{{asset('public/user-assets/img/users-image/'. auth()->user()->profile)}}" alt="User profile picture" id="imagePreview">
                      </div>
                      <h3 class="profile-username text-center"></h3>
                      <p class="text-muted text-center"></p> 
                </form>
              </div>             
            </div>

            <!-- /.card -->          
          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class=" nav-link @if(request()->get('type') == "" || request()->get('type') == 'update_profile') active @endif" href="#update_profile"  data-toggle="tab">Update Profile </a></li>
                  <li class="nav-ite` m"><a class="nav-link @if(request()->get('type') == 'update_password') active @endif" href="#update_password" data-toggle="tab">Update Password </a></li>
                </ul>
              </div>
              <!-- /.card-header -->
              <div class="card-body tab-content clearfix">
                  <!------update Profile-------->
                  <div class="tab-pane 
                  @if(request()->get('type') == "" || request()->get('type') == 'update_profile') active @endif" id="update_profile">
                  <div class="tab-pane active" id="update_profile">
                      <form class="form-horizontal"  action="{{route('update_profile')}}" method="post" name="general_info" id="general_info">
                        @csrf
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="fullname" name="name" value="{{old('name', auth()->user()->name)}}">
                              @error('name')
                                 <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>                    
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-3 col-form-label">District</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="districts" name="districts"  value="{{old('districts', auth()->user()->districts)}}">
                              @error('districts')
                               <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-3 col-form-label">Mobile</label>
                          <div class="col-sm-9">
                              <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="{{old('mobile', auth()->user()->mobile_no)}}">
                              @error('mobile')
                                <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-3 col-form-label">Profile</label>
                          <div class="col-sm-9">
                              <input type="file" class="form-control" id="profile" name="profile" >
                              @error('profile')
                                <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                        </div>

                          <div class="form-group row">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  <!-- End update Profile  -->

                     <!-- update_password  -->
                     <div class="tab-pane @if(request()->get('type') == 'update_password') active @endif" id="update_password">
                  <div  class="tab-pane" id="update_password">
                    <form class="form-horizontal"  action="{{url('ngo-site-admin/admin_update_pass')}}
                    " method="post" name="password_info" id="password_info">
                        @csrf
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Current Password</label>
                            <div class="col-sm-8">
                              <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password">
                              @error('current_password')
                                <div class="form-valid-error">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">New Password</label>
                            <div class="col-sm-8">
                              <input type="password" class="form-control" id="password" name="password" placeholder="New Password">
                              @error('password')
                                <div class="form-valid-error">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="inputEmail" class="col-sm-4 col-form-label">Confirm Password</label>
                            <div class="col-sm-8">
                              <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                              @error('confirm_password')
                                <div class="form-valid-error">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <div class="offset-sm-4 col-sm-8">
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  <!-- End update_password -->

                <!-- /.end -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<style type="text/css">
    .box-profile{
      position: relative;
      max-width: 205px;
      margin: 50px auto;
    }
    .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }
    input {
        display: none;
    }
    .box-profile .avatar-edit label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFFFFF;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgb(0 0 0 / 12%);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }
    .profile-user-img {
        width: 130px;
        height: 130px;
    }
    .box-profile .avatar-edit input + label:after {
        content: "\f040";
        font-family: 'FontAwesome';
        color: #757575;
        position: absolute;
        top: 10px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
    }
    .box-profile .avatar-edit input + label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFFFFF;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgb(0 0 0 / 12%);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }
</style>

</div>
</div>
</section>
<script>
   function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imagePreview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
     }
 }

  $("#profile_image_input").change(function(){
    readURL(this);

    var formData = new FormData();
    var csrf_token = $("input[name='_token']").val();
    formData.append('avatar', $('#profile_image_input')[0].files[0]);
    formData.append('_token', csrf_token);

    $.ajax({
       method : 'POST',
       url : "{{route('update_profile_photo')}}",
       data : formData,
       processData: false,  
       contentType: false, 
       success : (response) => {
        if(response)
        {
          // alert('Image has been uploaded successfully');
          if(response == '1')
            toastr["success"]('Image has been uploaded successfully');
          else
            toastr_danger('Some changed occurred');
        }
    },
      

    });

  });
/*---------- End On Chainges Image Uploade----------*/

$('#upload_image').click(function(){ $('#profile_image_input').trigger('click'); });
</script>
@stop