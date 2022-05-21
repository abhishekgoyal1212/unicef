 @extends('admin.sidebar')
    @section('title','Dashboard')
    @section('content')
    
              <div class="row bg-white shadow-sm ground-section">
                <div class="col-md-3 px-2">
                  <ul class="nav nav-tabs sub-tabs d-flex w-100" role="tablist">
                    <li class="nav-item d-flex w-100">
                      <a class="nav-link active border" href="#Ground" role="tab" data-toggle="tab"> Ground Level Health</a>
                    </li>
                  </ul>
                </div>
                <div class="col-md-9 px-2">
                  <div class="tab-content ground-level">
                    <div role="tabpanel" class="tab-pane fade show active" id="Ground">
                      <div class="sub-tab-heading">
                        Ground Level Health Functionaries
                      </div>
                      <form action="{{route('admin.OrientationHealth')}}" method="post">
                        @csrf
                      <div class="sub-content p-4">
                        <div class="row align-items-center">
                          <div class="col-md-4">
                            <p class="mb-0"> No of Orinetation:</p>
                          </div>
                          <div class="col-md-8 col-lg-4">
                            <div class="form-group mb-0">
                              <input type="number" name="number_orientation" value="{{old('number_orientation', $OrientationHealthCount == 1 ? $OrientationHealthData['number_orientation'] : '')}}">
                              @error('number_orientation')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-3">
                          <div class="col-md-4">
                            <p class="mb-0">  ANM:</p>
                          </div>
                          <div class="col-md-8 col-lg-4">
                            <div class="form-group mb-0">
                              <input type="text" name="anm" value="{{old('anm', $OrientationHealthCount == 1 ? $OrientationHealthData['anm'] : '')}}">
                              @error('anm')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center">
                          <div class="col-md-4">
                            <p class="mb-0"> ASHA:</p>
                          </div>
                          <div class="col-md-8 col-lg-4">
                            <div class="form-group mb-0">
                              <input type="text" name="asha" value="{{old('asha', $OrientationHealthCount == 1 ? $OrientationHealthData['asha'] : '')}}">
                              @error('asha')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-3">
                          <div class="col-md-4">
                            <p class="mb-0"> AGANWADI:</p>
                          </div>
                          <div class="col-md-8 col-lg-4">
                            <div class="form-group mb-0">
                              <input type="text" name="anganwadi" value="{{old('anganwadi', $OrientationHealthCount == 1 ? $OrientationHealthData['anganwadi'] : '')}}">
                              @error('anganwadi')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center">
                          <div class="col-md-4">
                            <p class="mb-0"> CHA:</p>
                          </div>
                          <div class="col-md-8 col-lg-4">
                            <div class="form-group mb-0">
                              <input type="text" name="cha" value="{{old('cha', $OrientationHealthCount == 1 ? $OrientationHealthData['cha'] : '')}}">
                              @error('cha')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="col-md-10 mt-4 text-center">

                           <button type="submit" class="login-btn">{{$OrientationHealthCount == 1 ? 'UPDATE' : 'SUBMIT'}}</button>
                          </div>
                      </div>
                  </form>
                    </div>
                  </div>
                </div>
             
              </div>
          
              
    @stop