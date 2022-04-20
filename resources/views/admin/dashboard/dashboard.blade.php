    @extends('admin.index')
    @section('title','Dashboard')
    @section('content')
              <div class="row  bg-white shadow-sm ground-section">
                <div class="col-md-3 px-2">
                  <ul class="nav nav-tabs sub-tabs d-flex w-100" role="tablist">
                    <li class="nav-item d-flex w-100">
                      <a class="nav-link active border" href="#Education" role="tab" data-toggle="tab">Education Department</a>
                    </li>
                    <li class="nav-item d-flex w-100">
                      <a class="nav-link border" href="#Panchayati" role="tab" data-toggle="tab">Panchayati Raj/Rural Development</a>
                    </li>
                    <li class="nav-item d-flex w-100">
                      <a class="nav-link border" href="#Minority" role="tab" data-toggle="tab">Minority Deparment/ DMWO/ Para teachers</a>
                    </li>
                    <li class="nav-item d-flex w-100">
                      <a class="nav-link border" href="#ULB" role="tab" data-toggle="tab"> ULB </a>
                    </li>
                    <li class="nav-item d-flex w-100">
                      <a class="nav-link border" href="#CSR" role="tab" data-toggle="tab"> CSR</a>
                    </li>
                  </ul>
                </div>
                <div class="col-md-9 px-2">
                  <div class="tab-content border">
                    <div role="tabpanel" class="tab-pane fade show active" id="Education">
                      <div class="sub-tab-heading">
                        Education Department
                      </div>
                      <div class="sub-content p-4">
                        <div class="row align-items-center mb-4">
                          <div class="col-md-4">
                            <p class="mb-0">No. of Orientation:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center">
                          <div class="col-md-4">
                            <p class="mb-0">No. of Participants:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="Panchayati">
                      <div class="sub-tab-heading">
                        Panchayati Raj/Rural Development
                      </div>
                      <div class="sub-content p-4">
                        <div class="row align-items-center mb-4">
                          <div class="col-md-4">
                            <p class="mb-0">No. of Orientation:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center">
                          <div class="col-md-4">
                            <p class="mb-0">No. of Participants:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="Minority">
                      <div class="sub-tab-heading">
                        Minority Deparment
                      </div>
                      <div class="sub-content p-4">
                        <div class="row align-items-center mb-4">
                          <div class="col-md-4">
                            <p class="mb-0">No. of Orientation:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center">
                          <div class="col-md-4">
                            <p class="mb-0">No. of Participants:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="ULB">
                      <div class="sub-tab-heading">
                        ULB
                      </div>
                      <div class="sub-content p-4">
                        <div class="row align-items-center mb-4">
                          <div class="col-md-4">
                            <p class="mb-0">No. of Orientation:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center">
                          <div class="col-md-4">
                            <p class="mb-0">No. of Participants:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="CSR">
                      <div class="sub-tab-heading">
                        CSR
                      </div>
                      <div class="sub-content p-4">
                        <div class="row align-items-center mb-4">
                          <div class="col-md-4">
                            <p class="mb-0">No. of Orientation:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center">
                          <div class="col-md-4">
                            <p class="mb-0">No. of Participants:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                <div class="col-md-3">
                </div>
                <div class="col-md-3 align-items-center">
                    <button type="submit" class="login-btn">SUBMIT</button>
                </div>
                <div class="col-md-3">
                </div>

              </div>
            </div>
            <div role="tabpanel" class="tab-pane right-tab" id="pvt">
              <div class="row">
                <div class="col-md-5 px-0">
                  <h3 class="tab-head">Private Bodies</h3>
                  <select name="" id="" class="w-100 bg-transparent mt-3 py-3 px-2 category">
                    <option value="">Directory</option>
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
                <div class="row  bg-white shadow-sm ground-section mx-0">
                  <div class="col-md-3 px-2">
                    <ul class="nav nav-tabs sub-tabs d-flex w-100" role="tablist">
                      <li class="nav-item d-flex w-100">
                        <a class="nav-link active border" href="#IAP" role="tab" data-toggle="tab">Meeting with IMA/IAP</a>
                      </li>
                      <li class="nav-item d-flex w-100">
                        <a class="nav-link border" href="#practitioners" role="tab" data-toggle="tab">Meeting with Private practitioners </a>
                      </li>
                      <li class="nav-item d-flex w-100">
                        <a class="nav-link border" href="#Pharmacists" role="tab" data-toggle="tab">Pharmacists Associations</a>
                      </li>
                      <li class="nav-item d-flex w-100">
                        <a class="nav-link border" href="#Merchant" role="tab" data-toggle="tab"> Merchant Association </a>
                      </li>
                      <li class="nav-item d-flex w-100">
                        <a class="nav-link border" href="#Others" role="tab" data-toggle="tab"> Others</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-9 px-2">
                    <div class="tab-content border">
                      <div role="tabpanel" class="tab-pane fade show active" id="IAP">
                        <div class="sub-tab-heading">
                          Meeting with IMA/IAP
                        </div>
                        <div class="sub-content p-4">
                          <div class="row align-items-center mb-4">
                            <div class="col-md-4">
                              <p class="mb-0">No. of Meetings:</p>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group mb-0">
                                <input type="number">
                              </div>
                            </div>
                          </div>
                          <div class="row align-items-center">
                            <div class="col-md-4">
                              <p class="mb-0">No. of Participants:</p>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group mb-0">
                                <input type="number">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="practitioners">
                        <div class="sub-tab-heading">
                          Meeting with Private practitioners
                        </div>
                        <div class="sub-content p-4">
                          <div class="row align-items-center mb-4">
                            <div class="col-md-4">
                              <p class="mb-0">No. of Meetings:</p>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group mb-0">
                                <input type="number">
                              </div>
                            </div>
                          </div>
                          <div class="row align-items-center">
                            <div class="col-md-4">
                              <p class="mb-0">No. of Participants:</p>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group mb-0">
                                <input type="number">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="Pharmacists">
                        <div class="sub-tab-heading">
                          Pharmacists Associations
                        </div>
                        <div class="sub-content p-4">
                          <div class="row align-items-center mb-4">
                            <div class="col-md-4">
                              <p class="mb-0">No. of Meetings:</p>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group mb-0">
                                <input type="number">
                              </div>
                            </div>
                          </div>
                          <div class="row align-items-center">
                            <div class="col-md-4">
                              <p class="mb-0">No. of Participants:</p>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group mb-0">
                                <input type="number">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="Merchant">
                        <div class="sub-tab-heading">
                          Merchant Association
                        </div>
                        <div class="sub-content p-4">
                          <div class="row align-items-center mb-4">
                            <div class="col-md-4">
                              <p class="mb-0">No. of Meetings:</p>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group mb-0">
                                <input type="number">
                              </div>
                            </div>
                          </div>
                          <div class="row align-items-center">
                            <div class="col-md-4">
                              <p class="mb-0">No. of Participants:</p>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group mb-0">
                                <input type="number">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="Others">
                        <div class="sub-tab-heading">
                          Others
                        </div>
                        <div class="sub-content p-4">
                          <div class="row align-items-center mb-4">
                            <div class="col-md-4">
                              <p class="mb-0">No. of Meetings:</p>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group mb-0">
                                <input type="number">
                              </div>
                            </div>
                          </div>
                          <div class="row align-items-center">
                            <div class="col-md-4">
                              <p class="mb-0">No. of Participants:</p>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group mb-0">
                                <input type="number">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-3 align-items-center">
                    <button type="submit" class="login-btn">SUBMIT</button>
                </div>
                <div class="col-md-3">
                </div>

                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane right-tab" id="Coordination2">
              <div class="row">
                <div class="col-md-5 px-0">
                  <h3 class="tab-head">Coordination meeting with line dept</h3>
                  <select name="" id="" class="w-100 bg-transparent mt-3 py-3 px-2 category">
                    <option value="">Directory</option>
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
                      <div class="sub-content p-4">
                        <div class="row align-items-center mt-4">
                          <div class="col-md-5">
                            <p class="mb-0">Panchayti Raj/ Rural Development:</p>
                          </div>
                          <div class="col-md-7">
                            <ul class="list-unstyled mb-0">
                              <li class="d-inline mr-4"><div class="form-check d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleChecka" name="check2" onclick="onlyOnes(this)">
                                <label class="form-check-label" for="exampleChecka">Yes</label>
                              </div></li>
                              <li class="d-inline mr-4"><div class="form-check d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleChecks" name="check2" onclick="onlyOnes(this)">
                                <label class="form-check-label" for="exampleChecks">No</label>
                              </div></li>
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
                                <input type="checkbox" class="form-check-input" id="exampleCheckb" name="check2" onclick="onlyOnes(this)">
                                <label class="form-check-label" for="exampleCheckb">Yes</label>
                              </div></li>
                              <li class="d-inline mr-4"><div class="form-check d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheckd" name="check2" onclick="onlyOnes(this)">
                                <label class="form-check-label" for="exampleCheckd">No</label>
                              </div></li>
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
                                <input type="checkbox" class="form-check-input" id="exampleCheckm" name="check2" onclick="onlyOnes(this)">
                                <label class="form-check-label" for="exampleCheckm">Yes</label>
                              </div></li>
                              <li class="d-inline mr-4"><div class="form-check d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheckn" name="check2" onclick="onlyOnes(this)">
                                <label class="form-check-label" for="exampleCheckn">No</label>
                              </div></li>
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
                                <input type="checkbox" class="form-check-input" id="exampleCheckh" name="check2" onclick="onlyOnes(this)">
                                <label class="form-check-label" for="exampleCheckh">Yes</label>
                              </div></li>
                              <li class="d-inline mr-4"><div class="form-check d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheckv" name="check2" onclick="onlyOnes(this)">
                                <label class="form-check-label" for="exampleCheckv">No</label>
                              </div></li>
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
                                <input type="checkbox" class="form-check-input" id="exampleCheckc" name="check2" onclick="onlyOnes(this)">
                                <label class="form-check-label" for="exampleCheckc">Yes</label>
                              </div></li>
                              <li class="d-inline mr-4"><div class="form-check d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheckx" name="check2" onclick="onlyOnes(this)">
                                <label class="form-check-label" for="exampleCheckx">No</label>
                              </div></li>
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
                                <input type="checkbox" class="form-check-input" id="exampleCheckz" name="check2" onclick="onlyOnes(this)">
                                <label class="form-check-label" for="exampleCheckz">Yes</label>
                              </div></li>
                              <li class="d-inline mr-4"><div class="form-check d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheckl" name="check2" onclick="onlyOnes(this)">
                                <label class="form-check-label" for="exampleCheckl">No</label>
                              </div></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-3 align-items-center">
                    <button type="submit" class="login-btn">SUBMIT</button>
                </div>
                <div class="col-md-3">
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane right-tab" class="right" id="mass">
              <div class="row">
                <div class="col-md-5 px-0">
                  <h3 class="tab-head">Mid Media Mass Media</h3>
                  <select name="" id="" class="w-100 bg-transparent mt-3 py-3 px-2 category">
                    <option value="">Directory</option>
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
              <div class="row  bg-white shadow-sm ground-section">
                <div class="col-md-3 px-2">
                  <ul class="nav nav-tabs sub-tabs d-flex w-100" role="tablist">
                    <li class="nav-item d-flex w-100">
                      <a class="nav-link active border" href="#Media" role="tab" data-toggle="tab"> Mid Media Mass Media</a>
                    </li>
                  </ul>
                </div>
                <div class="col-md-9 px-2">
                  <div class="tab-content border">
                    <div role="tabpanel" class="tab-pane  fade show active" id="Media">
                      <div class="sub-tab-heading">
                        Mid Media Mass Media
                      </div>
                      <div class="sub-content p-4">
                        <div class="row align-items-center">
                          <div class="col-md-4">
                            <p class="mb-0"> Rally on COVID Vaccination:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-3">
                          <div class="col-md-4">
                            <p class="mb-0">Possible Reach:</p>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group mb-0">
                              <label for="male">Male</label>
                              <input type="number" id="male">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group mb-0">
                              <label for="Female">Female</label>
                              <input type="number" id="Female">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center mt-4">
                          <div class="col-md-4">
                            <p class="mb-0"> Nukad Natak on COVID Vaccination:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text" placeholder="COVID Vaccination/CAB/RI/IMI">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-3">
                          <div class="col-md-4">
                            <p class="mb-0">Possible Reach:</p>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group mb-0">
                              <label for="male">Male</label>
                              <input type="number" id="male">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group mb-0">
                              <label for="Female">Female</label>
                              <input type="number" id="Female">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center mt-4">
                          <div class="col-md-4">
                            <p class="mb-0">  Folk Program:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-3">
                          <div class="col-md-4">
                            <p class="mb-0">Possible Reach:</p>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group mb-0">
                              <label for="male">Male</label>
                              <input type="number" id="male">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group mb-0">
                              <label for="Female">Female</label>
                              <input type="number" id="Female">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center mt-4">
                          <div class="col-md-4">
                            <p class="mb-0">  Local/Community Radio:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-3">
                          <div class="col-md-4">
                            <p class="mb-0">Possible Reach:</p>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group mb-0">
                              <label for="male">Male</label>
                              <input type="number" id="male">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group mb-0">
                              <label for="Female">Female</label>
                              <input type="number" id="Female">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center mt-4">
                          <div class="col-md-4">
                            <p class="mb-0">TV/Cable TV:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-3">
                          <div class="col-md-4">
                            <p class="mb-0">Possible Reach:</p>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group mb-0">
                              <label for="male">Male</label>
                              <input type="number" id="male">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group mb-0">
                              <label for="Female">Female</label>
                              <input type="number" id="Female">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center mt-4">
                          <div class="col-md-4">
                            <p class="mb-0"> Flash Mob:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-3">
                          <div class="col-md-4">
                            <p class="mb-0">Possible Reach:</p>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group mb-0">
                              <label for="male">Male</label>
                              <input type="number" id="male">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group mb-0">
                              <label for="Female">Female</label>
                              <input type="number" id="Female">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center mt-4">
                          <div class="col-md-4">
                            <p class="mb-0"> Others:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-3">
                          <div class="col-md-4">
                            <p class="mb-0">Possible Reach:</p>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group mb-0">
                              <label for="male">Male</label>
                              <input type="number" id="male">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group mb-0">
                              <label for="Female">Female</label>
                              <input type="number" id="Female">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-3 align-items-center">
                    <button type="submit" class="login-btn">SUBMIT</button>
                </div>
                <div class="col-md-3">
                </div>
                                <div class="col-md-3">
                </div>
                <div class="col-md-3 align-items-center">
                    <button type="submit" class="login-btn">SUBMIT</button>
                </div>
                <div class="col-md-3">
                </div>

              </div>
            </div>
            <div role="tabpanel" class="tab-pane right-tab  active" id="health">
              <div class="row">
                <div class="col-md-5 px-0">
                  <h3 class="tab-head">Orientation of Ground Level Health Functionaries</h3>
                  <select name="" id="" class="w-100 bg-transparent mt-3  py-2 py-lg-3 px-2 category">
                    <option value="">Directory</option>
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
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-3 align-items-center">
                    <button type="submit" class="login-btn">SUBMIT</button>
                </div>
                <div class="col-md-3">
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane right-tab" id="iec">
              <div class="row">
                <div class="col-md-5 px-0">
                  <h3 class="tab-head">IEC material developed and disseminated</h3>
                  <select name="" id="" class="w-100 bg-transparent mt-3 py-3 px-2 category">
                    <option value="">Directory</option>
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
                        
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="disseminated">
                      <div class="sub-tab-heading">
                        Local IEC material developed and disseminated
                      </div>
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
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="Adolescent">
                      <div class="sub-tab-heading">
                        Special IEC for Pregnant women and Adolescent
                      </div>
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
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-3 align-items-center">
                    <button type="submit" class="login-btn">SUBMIT</button>
                </div>
                <div class="col-md-3">
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane right-tab" id="Groups">
              <div class="row">
                <div class="col-md-5 px-0">
                  <h3 class="tab-head">Vulnerable Groups Tracking</h3>
                  <select name="" id="" class="w-100 bg-transparent mt-3 py-3 px-2 category">
                    <option value="">Directory</option>
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
                      <div class="sub-content p-4">
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">No. of Nomadic locations:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0"> No. of Construction Labour sites:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0"> No. Bricklin Labour sites:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">No. of Mine Labour Sites:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">No. of sites of Excluded Groups (If any):</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Pastrol Community:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Slum dwellers:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number">
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Sex Workers:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-3 align-items-center">
                    <button type="submit" class="login-btn">SUBMIT</button>
                </div>
                <div class="col-md-3">
                </div>              </div>
            </div>
    @stop