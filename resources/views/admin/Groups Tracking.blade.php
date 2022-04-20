 @extends('admin.index')
 @section('title','Dashboard')
 @section('content')
 <div class="col-sm-9">
  
  <div role="tabpanel" class="tab-pane right-tab" id="Groups">
    <div class="row">
      <div class="col-md-5 px-0">
        <h3 class="tab-head">Vulnerable Groups Tracking</h3>
        <select name="" id="" class="w-100 bg-transparent mt-3 py-3 px-2 category">
          <option value=""> Groups Tracking</option>
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



<form>
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