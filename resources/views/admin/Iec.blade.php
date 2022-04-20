 @extends('admin.index')
    @section('title','Dashboard')
    @section('content')
     
              <div class="row  bg-white shadow-sm ground-section ">
                <div class="col-md-3 px-2">
                  <ul class="nav nav-tabs sub-tabs d-flex w-100" role="tablist">
                    <li class="nav-item d-flex w-100">
                      <a class="nav-link active border" href="#Prototyoe" role="tab" data-toggle="tab">No of IEC material/Prototyoe received from State</a>
                    </li>
                    <li class="nav-item d-flex w-100">
                      <a class="nav-link border" href="#disseminated" role="tab" data-toggle="tab"> No. of Local IEC material developed and disseminated</a>
                    </li>
                    <li class="nav-item d-flex w-100">
                      <a class="nav-link border" href="#Adolescent" role="tab" data-toggle="tab">Special IEC for Pregnant women and Adolescent</a>
                    </li>
                  </ul>
                </div>
                <div class="col-md-9 px-2">
                  <div class="tab-content border">
                    <div role="tabpanel" class="tab-pane fade show active" id="Prototyoe">
                      <div class="sub-tab-heading">
                        IEC material/Prototyoe received from State
                      </div>


            <form>
                      <div class="sub-content p-4">
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Posters:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Banners:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">FFL:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Leaflet:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-10 mt-4 text-center">

                           <button type="submit" class="login-btn">SUBMIT</button>
                          </div>
                      </div>

    </form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="disseminated">
                      <div class="sub-tab-heading">
                        Local IEC material developed and disseminated
                      </div>

    <form>
                      <div class="sub-content p-4">
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Posters:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Banners:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Audio clips (local language):</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Video clips:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Jingles:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-10 mt-4 text-center">

                           <button type="submit" class="login-btn">SUBMIT</button>
                          </div>
                      </div>
</form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="Adolescent">
                      <div class="sub-tab-heading">
                        Special IEC for Pregnant women and Adolescent
                      </div>

      <form>
                      <div class="sub-content p-4">
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Posters:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Banners:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text">
                            </div>
                          </div>
                        </div>

                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Leaflet:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Others:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text">
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