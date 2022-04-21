 @extends('admin.index')
 @section('title','Dashboard')
 @section('content')

    <div class="row ground-section bg-white shadow-sm ">
      <div class="col-md-3 px-2">
        <ul class="nav nav-tabs sub-tabs d-flex w-100" role="tablist">
          <li class="nav-item d-flex w-100">
            <a class="nav-link active border" href="#Tracking" role="tab" data-toggle="tab">Vulnerable Groups Tracking</a>
          </li>
        </ul>
      </div>
      <div class="col-md-9 px-2">
        <div class="tab-content border">
          <div role="tabpanel" class="tab-pane fade show active" id="Tracking">
            <div class="sub-tab-heading">
              Vulnerable Groups Tracking
            </div>



         <form action="{{route('admin.GroupsTracking')}}" method="post">
          @csrf
            <div class="sub-content p-4">
              <div class="row align-items-center my-2">
                <div class="col-md-3">
                  <p class="mb-0">No. of Nomadic locations:</p>
                </div>
                <div class="col-md-4">
                  <div class="form-group mb-0">
                    <input type="number" name="no_nomadic_locations" value="{{old('no_nomadic_locations')}}">
                    @error('no_nomadic_locations')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row align-items-center my-2">
                <div class="col-md-3">
                  <p class="mb-0"> No. of Construction Labour sites:</p>
                </div>
                <div class="col-md-4">
                  <div class="form-group mb-0">
                    <input type="number" name="no_construction_labour_sites" value="{{old('no_construction_labour_sites')}}">
                    @error('no_construction_labour_sites')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row align-items-center my-2">
                <div class="col-md-3">
                  <p class="mb-0"> No. Bricklin Labour sites:</p>
                </div>
                <div class="col-md-4">
                  <div class="form-group mb-0">
                    <input type="number" name="no_bricklin_labour_sites" value="{{old('no_bricklin_labour_sites')}}">
                    @error('no_bricklin_labour_sites')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row align-items-center my-2">
                <div class="col-md-3">
                  <p class="mb-0">No. of Mine Labour Sites:</p>
                </div>
                <div class="col-md-4">
                  <div class="form-group mb-0">
                    <input type="number" name="no_mine_labour_sites" value="{{old('no_mine_labour_sites')}}">
                    @error('no_mine_labour_sites')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row align-items-center my-2">
                <div class="col-md-3">
                  <p class="mb-0">No. of sites of Excluded Groups (If any):</p>
                </div>
                <div class="col-md-4">
                  <div class="form-group mb-0">
                    <input type="number" name="no_excluded_groups_sites" value="{{old('no_excluded_groups_sites')}}">
                    @error('no_excluded_groups_sites')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row align-items-center my-2">
                <div class="col-md-3">
                  <p class="mb-0">Pastrol Community:</p>
                </div>
                <div class="col-md-4">
                  <div class="form-group mb-0">
                    <input type="number" name="no_pastrol_community" value="{{old('no_pastrol_community')}}">
                    @error('no_pastrol_community')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row align-items-center my-2">
                <div class="col-md-3">
                  <p class="mb-0">Slum dwellers:</p>
                </div>
                <div class="col-md-4">
                  <div class="form-group mb-0">
                    <input type="number" name="no_slum_dwellers" value="{{old('no_slum_dwellers')}}">
                    @error('no_slum_dwellers')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row align-items-center my-2">
                <div class="col-md-3">
                  <p class="mb-0">Sex Workers:</p>
                </div>
                <div class="col-md-4">
                  <div class="form-group mb-0">
                    <input type="number" name="no_sex_workers" value="{{old('no_sex_workers')}}">
                    @error('no_sex_workers')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-md-10 mt-4 text-center">

                           <button type="submit" class="login-btn">SUBMIT</button>
                          </div>
            </div>


  </form>
          </div>
        </div>
      </div>
                  </div>
   
  
  @stop