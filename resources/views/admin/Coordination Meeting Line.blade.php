 @extends('admin.sidebar')
 @section('title','Dashboard')
 @section('content')
 <div class="row  bg-white shadow-sm  ground-section" >
  <div class="col-md-3 px-2">
    <ul class="nav nav-tabs sub-tabs d-flex w-100" role="tablist">
      <li class="nav-item d-flex w-100">
        <a class="nav-link active border" href="#Coordination" role="tab" data-toggle="tab"> Coordination meeting with line dept</a>
      </li>
    </ul>
  </div>
  <div class="col-md-9 px-2">
    <div class="tab-content border">
      <div role="tabpanel" class="tab-pane fade show active" id="Coordinations">
        <div class="sub-tab-heading">
          Panchayti Raj/ Rural Development
        </div>
                  <form action ="{{route('admin.coordination')}}" method="post">
                    @csrf
                      <div class="sub-content p-4">
                        <div class="row align-items-center mt-4">
                          <div class="col-md-5">
                            <p class="mb-0">Panchayti Raj/ Rural Development:</p>
                          </div>
                          <div class="col-md-7">
                            <ul class="list-unstyled mb-0">
                              <li class="d-inline mr-4"><div class="form-check d-inline">
                                <input type="radio" class="form-check-input" id="exampleChecka1" name="panchayti_rural_development" value="1" {{old('panchayti_rural_development') == '1' ? 'checked' : ($CoordinationCount == 1 ? ($CoordinationData['panchayti_rural_development'] == '1' ? 'checked' : '') : '')}}/>
                          
                                <label class="form-check-label" for="exampleChecka1">Yes</label>
                              </div></li>
                              <li class="d-inline mr-4"><div class="form-check d-inline">
                                <input type="radio" class="form-check-input" id="exampleChecks2" name="panchayti_rural_development" value="0" {{old('panchayti_rural_development') == '0' ? 'checked' : ($CoordinationCount == 1 ? ($CoordinationData['panchayti_rural_development'] == '0' ? 'checked' : '') : '') }}>
                                <label class="form-check-label" for="exampleChecks2">No</label>
                              </div></li>
                              @error('panchayti_rural_development')
                              <div class="form-valid-error text-danger">{{$message}}</div>
                              @enderror
                            </ul>
                          </div>
                        </div>
                        <div class="row align-items-center mt-4">
                          <div class="col-md-5">
                            <p class="mb-0"> ICDS:</p>
                          </div>
                          <div class="col-md-7">
                            <ul class="list-unstyled mb-0">
                              <li class="d-inline mr-4"><div class="form-check d-inline">
                                <input type="radio" class="form-check-input" id="exampleCheckb1" name="icds" value="1" {{old('icds') == '1' ? 'checked' : ($CoordinationCount == 1 ? ($CoordinationData['icds'] == '1' ? 'checked' : '') : '') }}>
                                <label class="form-check-label" for="exampleCheckb1">Yes</label>
                              </div></li>
                              <li class="d-inline mr-4"><div class="form-check d-inline">
                                <input type="radio" class="form-check-input" id="exampleCheckd2" name="icds" value="0" {{old('icds') == '0' ? 'checked' : ($CoordinationCount == 1 ? ($CoordinationData['icds'] == '0' ? 'checked' : '') : '') }}>
                                <label class="form-check-label" for="exampleCheckd2">No</label>
                              </div></li>
                              @error('icds')
                              <div class="form-valid-error text-danger">{{$message}}</div>
                              @enderror
                            </ul>
                          </div>
                        </div>
                        <div class="row align-items-center mt-4">
                          <div class="col-md-5">
                            <p class="mb-0">Education:</p>
                          </div>
                          <div class="col-md-7">
                            <ul class="list-unstyled mb-0">
                              <li class="d-inline mr-4"><div class="form-check d-inline">
                                <input type="radio" class="form-check-input" id="exampleCheckm1" name="education" value="1"{{old('education') == '1' ? 'checked' : ($CoordinationCount == 1 ? ($CoordinationData['education'] == '1' ? 'checked' : '') : '') }}>
                                <label class="form-check-label" for="exampleCheckm1">Yes</label>
                              </div></li>
                              <li class="d-inline mr-4"><div class="form-check d-inline">
                                <input type="radio" class="form-check-input" id="exampleCheckn2" name="education" value="0" {{old('education') == '0' ? 'checked' : ($CoordinationCount == 1 ? ($CoordinationData['education'] == '0' ? 'checked' : '') : '') }}>
                                <label class="form-check-label" for="exampleCheckn2">No</label>
                              </div></li>
                              @error('education')
                              <div class="form-valid-error text-danger">{{$message}}</div>
                              @enderror
                            </ul>
                          </div>
                        </div>
                        <div class="row align-items-center mt-4">
                          <div class="col-md-5">
                            <p class="mb-0">SRLM:</p>
                          </div>
                          <div class="col-md-7">
                            <ul class="list-unstyled mb-0">
                              <li class="d-inline mr-4"><div class="form-check d-inline">
                                <input type="radio" class="form-check-input" id="exampleCheckh1" name="srlm" value="1" {{old('srlm') == '1' ? 'checked' : ($CoordinationCount == 1 ? ($CoordinationData['srlm'] == '1' ? 'checked' : '') : '') }}>
                                <label class="form-check-label" for="exampleCheckh1">Yes</label>
                              </div></li>
                              <li class="d-inline mr-4"><div class="form-check d-inline">
                                <input type="radio" class="form-check-input" id="exampleCheckv2" name="srlm" value="0" {{old('srlm') == '0' ? 'checked' : ($CoordinationCount == 1 ? ($CoordinationData['srlm'] == '0' ? 'checked' : '') : '') }}>
                                <label class="form-check-label" for="exampleCheckv2">No</label>
                              </div></li>
                              @error('srlm')
                              <div class="form-valid-error text-danger">{{$message}}</div>
                              @enderror
                            </ul>
                          </div>
                        </div>
                        <div class="row align-items-center mt-4">
                          <div class="col-md-5">
                            <p class="mb-0">Tribal Area Development Dept.:</p>
                          </div>
                          <div class="col-md-7">
                            <ul class="list-unstyled mb-0">
                              <li class="d-inline mr-4"><div class="form-check d-inline">
                                <input type="radio" class="form-check-input" id="exampleCheckc1" name="tribal_area" value="1" {{old('tribal_area') == '1' ? 'checked' : ($CoordinationCount == 1 ? ($CoordinationData['tribal_area'] == '1' ? 'checked' : '') : '') }}>
                                <label class="form-check-label" for="exampleCheckc1">Yes</label>
                              </div></li>
                              <li class="d-inline mr-4"><div class="form-check d-inline">
                                <input type="radio" class="form-check-input" id="exampleCheckx2" name="tribal_area" value="0"  {{old('tribal_area') == '0' ? 'checked' : ($CoordinationCount == 1 ? ($CoordinationData['tribal_area'] == '0' ? 'checked' : '') : '') }}>
                                <label class="form-check-label" for="exampleCheckx2">No</label>
                              </div></li>
                              @error('tribal_area')
                              <div class="form-valid-error text-danger">{{$message}}</div>
                              @enderror
                            </ul>
                          </div>
                        </div>
                        <div class="row align-items-center mt-4">
                          <div class="col-md-5">
                            <p class="mb-0">DMWO:</p>
                          </div>
                          <div class="col-md-7">
                            <ul class="list-unstyled mb-0">
                              <li class="d-inline mr-4"><div class="form-check d-inline">
                                <input type="radio" class="form-check-input" id="exampleCheckz1" name="dmwo" value="1" {{old('dmwo') == '1' ? 'checked' : ($CoordinationCount == 1 ? ($CoordinationData['dmwo'] == '1' ? 'checked' : '') : '') }}>
                                <label class="form-check-label" for="exampleCheckz1">Yes</label>
                              </div></li>
                              <li class="d-inline mr-4"><div class="form-check d-inline">
                                <input type="radio" class="form-check-input" id="exampleCheck2" name="dmwo" value="0" {{old('dmwo') == '0' ? 'checked' : ($CoordinationCount == 1 ? ($CoordinationData['dmwo'] == '0' ? 'checked' : '') : '') }}>
                                <label class="form-check-label" for="exampleCheck2">No</label>
                              </div></li>
                              @error('dmwo')
                              <div class="form-valid-error text-danger">{{$message}}</div>
                              @enderror
                            </ul>
                          </div>
                        </div>
                       <div class="col-md-10 mt-4 text-center">

                           <button type="submit" class="login-btn">{{$CoordinationCount == 1 ? 'UPDATE' : 'SUBMIT'}}</button>
                          </div> 
                </div>
          </form>
                      </div>
                    </div>
                  </div>
                </div>
              
@stop