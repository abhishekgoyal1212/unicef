    @extends('admin.index')
    @section('title','Dashboard')
    @section('content')

        
        <div class="row  bg-white shadow-sm ground-section">
          <div class="col-md-3 px-2">
            <ul class="nav nav-tabs sub-tabs d-flex w-100" role="tablist">
              <li class="nav-item d-flex w-100">
                <a class="nav-link  border {{($errors->hasBag('sector_meeting') 
                  || $errors->hasBag('samiti_meeting') || $errors->hasBag('district_communication') 
                  || $errors->hasBag('fortnightly_implementation')    ? '' : 'active')}}  " href="#profile" role="tab" data-toggle="tab">DTF/DHS Meeting</a>
              </li>
              <li class="nav-item d-flex w-100">
                <a class="nav-link border {{$errors->hasBag('sector_meeting') ? 'active' : '' }}" href="#buzz" role="tab" data-toggle="tab">Sector Meeting</a>
              </li>
              <li class="nav-item d-flex w-100">
                <a class="nav-link border {{$errors->hasBag('samiti_meeting') ? 'active' : '' }}" href="#references" role="tab" data-toggle="tab">Nigrani Samiti Meeting</a>
              </li>
              <li class="nav-item d-flex w-100">
                <a class="nav-link border {{$errors->hasBag('district_communication') ? 'active' : '' }}" href="#District" role="tab" data-toggle="tab">District Comminucation Plan Availability</a>
              </li>
              <li class="nav-item d-flex w-100">
                <a class="nav-link border {{$errors->hasBag('fortnightly_implementation') ? 'active' : '' }}" href="#Fortnightly" role="tab" data-toggle="tab">Fortnightly Implementation Report of DCP </a>
              </li>
            </ul>
          </div>
          <div class="col-md-9 px-2">
            <div class="tab-content border">
              <div role="tabpanel" class="tab-pane fade {{
                ($errors->hasBag('sector_meeting') 
                  || $errors->hasBag('samiti_meeting') || $errors->hasBag('district_communication') 
                  || $errors->hasBag('fortnightly_implementation') ? '' : 'show active')}}" id="profile">
                <div class="sub-tab-heading">
                  DTF/DHS Meeting
                </div>
                <form method="post" action="{{route('admin.planingPlatformSave')}}">
                  @csrf
                  <div class="sub-content p-4">
                    <div class="row align-items-center">
                      <div class="col-md-5">
                        <p class="mb-0">Wheather Meeting Held:</p>
                      </div>
                      <div class="col-md-7">
                        <ul class="list-unstyled mb-0">
                          <li class="d-inline mr-4">
                            <div class="form-check d-inline">
                              <input type="radio" name="wheather_meeting" value="1" class="form-check-input" id="exampleCheck1">
                              <label class="form-check-label mr-5" for="exampleCheck1">Yes</label>
                              <input type="radio" value="0" name="wheather_meeting" class="form-check-input" id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">No</label>
                              <div>
                                @error('wheather_meeting')
                                <div class="form-valid-error text-danger">{{ $message }}</div>
                                @enderror
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="row align-items-center my-4">
                      <div class="col-md-5">
                        <p class="mb-0">Line Departments Participated in Meeting:</p>
                      </div>
                      <div class="col-md-7">
                        <select name="line_departments_meeting" class="bg-transparent w-50 py-2 px-2 category">
                          <option value="PRI">PRI</option>
                          <option value="ICDS">ICDS</option>
                          <option value="Education">Education</option>
                          <option value="SRLM">SRLM</option>
                          <option value="Minority-DMWO">Minority-DMWO</option>
                          <option value="TAD">TAD</option>
                        </select>
                      </div>
                    </div>

                    <div class="row align-items-center ">
                      <div class="col-md-5">
                        <p class="mb-0">Whether SBCC Consultant participated:</p>
                      </div>
                      <div class="col-md-7">
                        <ul class="list-unstyled mb-0">
                          <li class="d-inline mr-4">
                            <div class="form-check d-inline">
                              <input type="radio" value="1" class="form-check-input" id="participated" name="wheather_consultant">
                              <label class="form-check-label mr-5"  for="participated">Yes</label>


                              <input type="radio" value="0" class="form-check-input" id="participated" name="wheather_consultant">

                              <label class="form-check-label"  for="participated">No</label>
                            </div>
                            @error('wheather_consultant')
                            <div class="form-valid-error text-danger">{{ $message }}</div>
                            @enderror
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="row align-items-center my-4">
                      <div class="col-md-5">
                        <p class="mb-0">Suggestions provided by SBCC Consultant:</p>
                      </div>
                      <div class="col-md-7">
                        <ul class="list-unstyled mb-0">
                          <li class="d-inline mr-4"><div class="form-check d-inline">
                            <input type="radio" value="1" class="form-check-input" id="participates" 
                            name="suggestions_consultant">
                            <label class="form-check-label mr-5" for="participates">Yes</label>
                            <input type="radio" value="0" class="form-check-input"  id="participates" 
                            name="suggestions_consultant">
                            <label class="form-check-label" for="participates">No</label>
                          </div>
                          @error('suggestions_consultant')
                          <div class="form-valid-error text-danger">{{ $message }}</div>
                          @enderror
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5">
                      <p class="mb-0">A cell provided for description:</p>
                    </div>
                    <div class="col-md-7">
                      <textarea name="provided_description" id="" class="sub-textarea"></textarea>
                      @error('provided_description')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>

                  </div>
                  <div class="col-md-10 mt-4 text-center">
                   <button type="submit" class="login-btn">SUBMIT</button>
                 </div>
               </div>
             </form>
           </div>
           

           <div role="tabpanel" class="tab-pane fade  {{$errors->hasBag('sector_meeting') ? 'show active' : '' }}  " id="buzz">
            <div class="sub-tab-heading">
              Sector Meeting
            </div>
            <form method="post" action="{{route('admin.sectorMeeting')}}">
              @csrf 
              <div class="sub-content p-4">
                <div class="row align-items-center">
                  <div class="col-md-4">
                    <p class="mb-0">Total no of Sectors in the District:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="number" name="total_district">
                    </div>
                    @error('total_district','sector_meeting')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="row align-items-center my-4">
                  <div class="col-md-4">
                    <p class="mb-0">Number of Sector Meetings Held:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="number" name="number_meetings">
                    </div>
                    @error('number_meetings','sector_meeting')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="row align-items-center my-4">
                  <div class="col-md-4">
                    <p class="mb-0">In how many Sector meetings SBCC consultant participated:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="number" name="meetings_participated">
                    </div>
                    @error('meetings_participated','sector_meeting')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <p class="mb-0">Suggestions provided by SBCC Consultan:</p>
                  </div>
                  <div class="col-md-7">
                    <textarea name="suggestions_consultan_description" id="" class="sub-textarea" ></textarea>
                    @error('suggestions_consultan_description','sector_meeting')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="col-md-10 mt-4 text-center">

                 <button type="submit" class="login-btn">SUBMIT</button>
               </div>
             </div>
           </form>
         </div>



         <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('samiti_meeting') ? 'show active' : '' }} " id="references">
          <div class="sub-tab-heading">
            Nigrani  Samiti meeting
          </div>
          <form method="post" action="{{route('admin.nigraniSamitiMeeting')}}">
            @csrf
            <div class="sub-content p-4">
              <div class="row align-items-center mb-4">
                <div class="col-md-5">
                  <p class="mb-0">Wheather Meeting Held:</p>
                </div>
                <div class="col-md-7">
                  <ul class="list-unstyled mb-0">
                    <li class="d-inline mr-4">
                      <div class="form-check d-inline">
                        <input type="radio" class="form-check-input" id="exampleCheck1" value="1" name="wheather_meeting">
                        <label class="form-check-label mr-5" for="exampleCheck1">Yes</label>
                        <input type="radio" class="form-check-input" id="exampleCheck1" value="0" name="wheather_meeting">
                        <label class="form-check-label" for="exampleCheck1">No</label>
                      </div>
                      @error('wheather_meeting','samiti_meeting')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </li>

                  </ul>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col-md-5">
                  <p class="mb-0">Whether SBCC Consultant participated:</p>
                </div>
                <div class="col-md-7">
                  <ul class="list-unstyled mb-0">
                    <li class="d-inline mr-4">
                      <div class="form-check d-inline">
                        <input type="radio" class="form-check-input" id="participated" name="wheather_consultant_participated" value="1">
                        <label class="form-check-label mr-5" for="participated">Yes</label>
                        <input type="radio" class="form-check-input" id="participated" name="wheather_consultant_participated" value="0">
                        <label class="form-check-label" for="participated">No</label>
                      </div>
                      @error('wheather_consultant_participated','samiti_meeting')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </li>
                  </ul>
                </div>
              </div>


              <div class="col-md-10 mt-4 text-center">

               <button type="submit" class="login-btn">SUBMIT</button>
             </div>
           </div>
         </form>
       </div>




       <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('district_communication') ? 'show active' : '' }}" id="District">
        <div class="sub-tab-heading">
          District Communication plan availability
        </div>
        <form method="post" action="{{route('admin.districtCommunication')}}">
          @csrf
          <div class="sub-content p-4">
            <div class="row align-items-center">
              <div class="col-md-5">
                <p class="mb-0">Wheather DCP Developed:</p>
              </div>
              <div class="col-md-7">
                <ul class="list-unstyled mb-0">
                  <li class="d-inline mr-4">

                    <div class="form-check d-inline">
                      <input type="radio" class="form-check-input" id="exampleCheck1" name="wheather_developed" value="1" >
                      <label class="form-check-label mr-5" for="exampleCheck1">Yes</label>
                      <input type="radio" class="form-check-input" id="exampleCheck1" name="wheather_developed" value="0" >
                      <label class="form-check-label" for="exampleCheck1">No</label>
                    </div>
                    @error('wheather_developed','district_communication')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </li>

                </ul>
              </div>
            </div>
            <div class="row align-items-center my-4">
              <div class="col-md-5">
                <p class="mb-0">If Yes Month (Attachement option should be there):</p>
              </div>
              <div class="col-md-7">
                <select name="If_yes_month" id="" class="bg-transparent w-50 py-2 px-2 category">
                  <option disabled selected hidden>Month</option>
                  <option value="1">January</option>
                  <option value="2">February</option>
                  <option value="3">March</option>
                  <option value="4">April</option>
                  <option value="5">May</option>
                  <option value="6">June</option>
                  <option value="7">July</option>
                  <option value="8">August</option>
                  <option value="9">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                </select>
                @error('If_yes_month','district_communication')
                <div class="form-valid-error text-danger">{{ $message }}</div>
                @enderror
              </div>

            </div>
            <div class="col-md-10 mt-4 text-center">

             <button type="submit" class="login-btn">SUBMIT</button>
           </div>
         </div>
       </form>
     </div>

     <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('fortnightly_implementation') ? 'show active' : '' }}" id="Fortnightly">
      <div class="sub-tab-heading">
        Fortnightly Implementation Report of DCP
      </div>
      <form method="post" action="{{route('admin.fortnightlyImplementation')}}">
        @csrf
        <div class="sub-content p-4">
          <div class="row align-items-center">
            <div class="col-md-5">
              <p class="mb-0">1st Fortnighly Report sent by District:</p>
            </div>
            <div class="col-md-7">
              <ul class="list-unstyled mb-0">
                <li class="d-inline mr-4">
                  <div class="form-check d-inline">
                    <input type="radio" class="form-check-input" id="exampleCheck1" name="first_fortnighly_report" value="1" >
                    <label class="form-check-label mr-5" for="exampleCheck1">Yes</label>
                    <input type="radio" class="form-check-input" id="exampleCheck1" name="first_fortnighly_report" value="0" >
                    <label class="form-check-label" for="exampleCheck1">No</label>
                  </div>
                </li>
              </ul>
              @error('first_fortnighly_report','fortnightly_implementation')
              <div class="form-valid-error text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row align-items-center mt-4">
            <div class="col-md-5">
              <p class="mb-0">2nd Fortnighly Report sent by District:</p>
            </div>
            <div class="col-md-7">
              <ul class="list-unstyled mb-0">
                <li class="d-inline mr-4">
                  <div class="form-check d-inline">
                    <input type="radio" class="form-check-input" id="exampleCheck4" name="second_fortnighly_report" value="1">
                    <label class="form-check-label mr-5"  name="" for="exampleCheck4">Yes</label>
                    <input type="radio" class="form-check-input" id="exampleCheck4" name="second_fortnighly_report" value="0">
                    <label class="form-check-label" for="exampleCheck4">No</label>
                  </div>
                </li>
              </ul>
              @error('second_fortnighly_report','fortnightly_implementation')
              <div class="form-valid-error text-danger">{{ $message }}</div>
              @enderror
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
<div class="col-md-3">
</div>

<div class="col-md-3">
</div>


</div>



@stop