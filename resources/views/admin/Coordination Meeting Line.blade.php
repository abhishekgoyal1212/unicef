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


        <form>
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

@stop