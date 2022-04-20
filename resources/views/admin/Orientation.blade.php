 @extends('admin.index')
 @section('title','Dashboard')
 @section('content')
   
    <div class="row  bg-white shadow-sm ground-section">
      <div class="col-md-3 px-2">
        <ul class="nav nav-tabs sub-tabs d-flex w-100" role="tablist">
          <li class="nav-item d-flex w-100">
            <a class="nav-link  border {{($errors->hasBag('panchayati_raj') 
                  || $errors->hasBag('minority_deparment') || $errors->hasBag('ulb_deparment') 
                  || $errors->hasBag('csr_deparment')    ? '' : 'active')}} " href="#Education" role="tab" data-toggle="tab">Education Department</a>
          </li>
          <li class="nav-item d-flex w-100">
            <a class="nav-link border {{$errors->hasBag('panchayati_raj') ? 'active' : '' }}" href="#Panchayati" role="tab" data-toggle="tab">Panchayati Raj/Rural Development</a>
          </li>
          <li class="nav-item d-flex w-100">
            <a class="nav-link border {{$errors->hasBag('minority_deparment') ? 'active' : '' }}" href="#Minority" role="tab" data-toggle="tab">Minority Deparment/ DMWO/ Para teachers</a>
          </li>
          <li class="nav-item d-flex w-100">
            <a class="nav-link border {{$errors->hasBag('ulb_deparment') ? 'active' : '' }}" href="#ULB" role="tab" data-toggle="tab"> ULB </a>
          </li>
          <li class="nav-item d-flex w-100">
            <a class="nav-link border {{$errors->hasBag('csr_deparment') ? 'active' : '' }}" href="#CSR" role="tab" data-toggle="tab"> CSR</a>
          </li>
        </ul>
      </div>
      <div class="col-md-9 px-2">
        <div class="tab-content border">

          <div role="tabpanel" class="tab-pane fade {{($errors->hasBag('panchayati_raj') 
                  || $errors->hasBag('minority_deparment') || $errors->hasBag('ulb_deparment') 
                  || $errors->hasBag('csr_deparment')    ? '' : 'show active')}}" id="Education">

            <div class="sub-tab-heading">
              Education Department
            </div>

            <form method="post" action="{{route('admin.educationDepartment')}}">
              @csrf
              <div class="sub-content p-4">
                <div class="row align-items-center mb-4">
                  <div class="col-md-4">
                    <p class="mb-0">No. of Orientation:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="number" name="number_orientation">
                    </div>
                    @error('number_orientation')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-md-4">
                    <p class="mb-0">No. of Participants:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="number" name="number_participants">
                    </div>
                    @error('number_participants')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12 mt-4 text-center">
                  <button type="submit" class="login-btn">SUBMIT</button>
                </div>
              </div>
            </form>

          </div>

          <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('panchayati_raj') ? 'show active' : '' }} {{$errors->hasBag('sector_meeting') ? 'show active' : '' }}" id="Panchayati">
            <div class="sub-tab-heading">
              Panchayati Raj/Rural Development
            </div>

            <form method="post" action="{{route('admin.panchayatiRaj')}}">
              @csrf
              <div class="sub-content p-4">
                <div class="row align-items-center mb-4">
                  <div class="col-md-4">
                    <p class="mb-0">No. of Orientation:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="number" name="number_orientation">
                    </div>
                    @error('number_orientation','panchayati_raj')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-md-4">
                    <p class="mb-0">No. of Participants:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="number" name="number_participants">
                    </div>
                    @error('number_participants','panchayati_raj')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12 mt-4 text-center">
                  <button type="submit" class="login-btn">SUBMIT</button>
                </div>
              </div>
            </form>
          </div>
          <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('minority_deparment') ? 'show active' : '' }}" id="Minority">
            <div class="sub-tab-heading">
              Minority Deparment
            </div>


            <form method="post" action="{{route('admin.minorityDeparment')}}">
              @csrf
              <div class="sub-content p-4">
                <div class="row align-items-center mb-4">
                  <div class="col-md-4">
                    <p class="mb-0">No. of Orientation:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="number" name="number_orientation">
                    </div>
                    @error('number_orientation','minority_deparment')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-md-4">
                    <p class="mb-0">No. of Participants:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="number" name="number_participants">
                    </div>
                    @error('number_participants','minority_deparment')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12 mt-4 text-center">
                  <button type="submit" class="login-btn">SUBMIT</button>
                </div>
              </div>

            </form>

          </div>
          <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('ulb_deparment') ? 'show active' : '' }}" id="ULB">
            <div class="sub-tab-heading">
              ULB
            </div>

            <form method="post" action="{{route('admin.ulbDeparment')}}">
              @csrf
              <div class="sub-content p-4">
                <div class="row align-items-center mb-4">
                  <div class="col-md-4">
                    <p class="mb-0">No. of Orientation:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="number" name="number_orientation">
                    </div>
                    @error('number_orientation','ulb_deparment')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-md-4">
                    <p class="mb-0">No. of Participants:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="number" name="number_participants">
                    </div>
                    @error('number_participants','ulb_deparment')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12 mt-4 text-center">
                  <button type="submit" class="login-btn">SUBMIT</button>
                </div>
              </div>
            </form>
          </div>
          <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('csr_deparment') ? 'show active' : '' }}" id="CSR">
            <div class="sub-tab-heading">
              CSR
            </div>

            <form method="post" action="{{route('admin.csrDeparment')}}">
              @csrf
              <div class="sub-content p-4">
                <div class="row align-items-center mb-4">
                  <div class="col-md-4">
                    <p class="mb-0">No. of Orientation:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="number" name="number_orientation">
                    </div>
                    @error('number_orientation','csr_deparment')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-md-4">
                    <p class="mb-0">No. of Participants:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="number" name="number_participants">
                    </div>
                    @error('number_participants','csr_deparment')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12 mt-4 text-center">
                  <button type="submit" class="login-btn">SUBMIT</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

</div>

@stop