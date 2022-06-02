@extends('admin.login.index')
@section('title','Verify Link')
@section('content')
<section>
  <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header">Verify Your Email Address</div>
                   <div class="card-body">
                    <button class="btn-danger">
                    <a href="http://localhost/unicef/update-password/{{$token}}"  class="btn-danger">Click Here</a>.
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@stop