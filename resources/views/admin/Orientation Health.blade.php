 @extends('admin.index')
    @section('title','Dashboard')
    @section('content')
       <div class="col-sm-9">
          
                        <div role="tabpanel" class="tab-pane right-tab  active" id="health">
              <div class="row">
                <div class="col-md-5 px-0">
                  <h3 class="tab-head">Orientation of Ground Level Health Functionaries</h3>
                  <select name="" id="" class="w-100 bg-transparent mt-3  py-2 py-lg-3 px-2 category">
                    <option value=""> Orientation Health</option>
                    <option value="">Planning Platforms</option>
                    <option value="">Social Mobilization</option>
                    <option value="">Orientation-Stakeholders</option>
                    <option value="">Pvt. Bodies</option>
                    <option value="">Coordination meeting Line Dept</option>
                  </select>
                </div>
                <div class="col-md-7 text-right">
                  <h3 class="location">Welcome to banswara</h3>
                </div>
              </div>
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


                      <form>
                      <div class="sub-content p-4">
                        <div class="row align-items-center">
                          <div class="col-md-4">
                            <p class="mb-0"> No of Orinetation:</p>
                          </div>
                          <div class="col-md-8 col-lg-4">
                            <div class="form-group mb-0">
                              <input type="number">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-3">
                          <div class="col-md-4">
                            <p class="mb-0">  ANM:</p>
                          </div>
                          <div class="col-md-8 col-lg-4">
                            <div class="form-group mb-0">
                              <input type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center">
                          <div class="col-md-4">
                            <p class="mb-0"> ASHA:</p>
                          </div>
                          <div class="col-md-8 col-lg-4">
                            <div class="form-group mb-0">
                              <input type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-3">
                          <div class="col-md-4">
                            <p class="mb-0"> AGANWADI:</p>
                          </div>
                          <div class="col-md-8 col-lg-4">
                            <div class="form-group mb-0">
                              <input type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center">
                          <div class="col-md-4">
                            <p class="mb-0"> CHA:</p>
                          </div>
                          <div class="col-md-8 col-lg-4">
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
            </div>
             </div>
              
    @stop