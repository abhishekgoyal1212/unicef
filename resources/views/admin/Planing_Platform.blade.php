    @extends('admin.sidebar')
    @section('title','Dashboard')
    @section('content')

        <div class="row  bg-white shadow-sm ground-section">
          <div class="col-md-3 px-2">
            <ul class="nav nav-tabs sub-tabs d-flex w-100" role="tablist">
              <li class="nav-item d-flex w-100">
                <a class="nav-link  border {{($errors->hasBag('sector_meeting') 
                  || $errors->hasBag('samiti_meeting') || $errors->hasBag('district_communication') 
                  || $errors->hasBag('fortnightly_implementation') || session()->has('sector-meeting') || session()->has('nagni-samiti') || session()->has('district-communication') || session()->has('fortnightly-implementation') ? '' : 'active')}}  " href="#profile" role="tab" data-toggle="tab">DTF/DHS Meeting</a>
              </li>
              <li class="nav-item d-flex w-100">
                <a class="nav-link border {{$errors->hasBag('sector_meeting') || session()->has('sector-meeting') ? 'active' : '' }}" href="#buzz" role="tab" data-toggle="tab">Sector Meeting</a>
              </li>
              <li class="nav-item d-flex w-100">
                <a class="nav-link border {{$errors->hasBag('samiti_meeting') || session()->has('nagni-samiti')  ? 'active' : '' }}" href="#references" role="tab" data-toggle="tab">Nigrani Samiti Meeting</a>
              </li>
              <li class="nav-item d-flex w-100">
                <a class="nav-link border {{$errors->hasBag('district_communication') || session()->has('district-communication') ? 'active' : '' }}" href="#District" role="tab" data-toggle="tab">District Comminucation Plan Availability</a>
              </li>
              <li class="nav-item d-flex w-100">
                <a class="nav-link border {{$errors->hasBag('fortnightly_implementation') || session()->has('fortnightly-implementation') ? 'active' : '' }}" href="#Fortnightly" role="tab" data-toggle="tab">Fortnightly Implementation Report of DCP </a>
              </li>
            </ul>
          </div>
          <div class="col-md-9 px-2">
            <div class="tab-content border">
              <div role="tabpanel" class="tab-pane fade {{
                ($errors->hasBag('sector_meeting') 
                  || $errors->hasBag('samiti_meeting') || $errors->hasBag('district_communication') 
                  || $errors->hasBag('fortnightly_implementation') 
                  || session()->has('sector-meeting') || session()->has('nagni-samiti') || session()->has('district-communication') || session()->has('fortnightly-implementation') 
                  ? '' : 'show active')}}" id="profile">
                <div class="sub-tab-heading">
                  DTF/DHS Meeting
                </div>
              
                <form id="form_id" method="post" enctype="multipart/form-data" action="{{route('admin.planingPlatformSave')}}">
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
                              <input type="radio" name="wheather_meeting" value="1" class="form-check-input" id="exampleCheck1" {{old('wheather_meeting') == '1' ? 'checked' : ($PlaningCount == 1 ? ($PlaningData['wheather_meeting'] == '1' ? 'checked' : '') : '') }}>
                              <label class="form-check-label mr-5" for="exampleCheck1">Yes</label>
                              <input type="radio" value="0" name="wheather_meeting" class="form-check-input" id="exampleCheck2" {{old('wheather_meeting') == '0' ? 'checked' : ($PlaningCount == 1 ? ($PlaningData['wheather_meeting'] == '0' ? 'checked' : '') : '')}}>
                              <label class="form-check-label" for="exampleCheck2">No</label>
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
                        <select id="line_department_meeting" name="line_departments_meeting[]" class="bg-transparent w-50 py-2 px-2 category line_departments_meetings" multiple="multiple">
                          <option value="PRI" @if(old('line_departments_meeting')){{(in_array('PRI',old('line_departments_meeting'))) ? 'selected' : ''}} @elseif($PlaningCount == 1){{(in_array('PRI', $line_departments)) ? 'selected' : ''}} @endif>PRI</option>
                          <option value="ICDS" @if(old('line_departments_meeting')){{(in_array('ICDS',old('line_departments_meeting'))) ? 'selected' : ''}} @elseif($PlaningCount == 1){{(in_array('ICDS', $line_departments)) ? 'selected' : ''}} @endif>ICDS</option>
                          <option value="Education" @if(old('line_departments_meeting')){{(in_array('Education',old('line_departments_meeting'))) ? 'selected' : ''}} @elseif($PlaningCount == 1) {{(in_array('Education', $line_departments)) ? 'selected' : ''}} @endif>Education</option>
                          <option value="SRLM" @if(old('line_departments_meeting')){{(in_array('SRLM',old('line_departments_meeting'))) ? 'selected' : ''}} @elseif($PlaningCount == 1) {{(in_array('SRLM', $line_departments)) ? 'selected' : ''}} @endif>SRLM</option>
                          <option value="Minority-DMWO" @if(old('line_departments_meeting')){{(in_array('Minority-DMWO',old('line_departments_meeting'))) ? 'selected' : ''}} @elseif($PlaningCount == 1) {{(in_array('Minority-DMWO', $line_departments)) ? 'selected' : ''}} @endif>Minority-DMWO</option>
                          <option value="TAD" @if(old('line_departments_meeting')){{(in_array('TAD',old('line_departments_meeting'))) ? 'selected' : ''}} @elseif($PlaningCount == 1) {{(in_array('TAD', $line_departments)) ? 'selected' : ''}} @endif>TAD</option>
                          <option value="Other" @if(old('line_departments_meeting')) {{(in_array('Other',old('line_departments_meeting'))) ? 'selected' : ''}} @elseif($PlaningCount == 1) {{(in_array('Other', $line_departments)) ? 'selected' : ''}} @endif>Others</option>
                        </select>

                          @error('line_departments_meeting')
                            <div class="form-valid-error text-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    </div>
                    
                    <div class="row align-items-center my-4" id="add_other_detail">
                    
                    </div>


                    <div class="row align-items-center ">
                      <div class="col-md-5">
                        <p class="mb-0">Whether SBCC Consultant participated:</p>
                      </div>
                      <div class="col-md-7">
                        <ul class="list-unstyled mb-0">
                          <li class="d-inline mr-4">
                            <div class="form-check d-inline">
                              <input type="radio" value="1" class="form-check-input" id="participated1" name="wheather_consultant" {{old('wheather_consultant') == '1' ? 'checked' : ($PlaningCount == 1 ? ($PlaningData['wheather_Consultant'] == '1' ? 'checked' : '') : '') }}>
                              <label class="form-check-label mr-5"  for="participated1">Yes</label>
                              <input type="radio" value="0" class="form-check-input" id="participated2" name="wheather_consultant" {{old('wheather_consultant') == '0' ? 'checked' : ($PlaningCount == 1 ? ($PlaningData['wheather_Consultant'] == '0' ? 'checked' : '') : '')}}>
                              <label class="form-check-label"  for="participated2">No</label>
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
                            <input type="radio" value="1" class="form-check-input" id="participates1" name="suggestions_consultant" {{old('suggestions_consultant') == '1' ? 'checked' : ($PlaningCount == 1 ? ($PlaningData['suggestions_Consultant'] == '1' ? 'checked' : '') : '') }}>
                            <label class="form-check-label mr-5" for="participates1">Yes</label>
                            <input type="radio" value="0" class="form-check-input"  id="participates2" name="suggestions_consultant" {{old('suggestions_consultant') == '0' ? 'checked' : ($PlaningCount == 1 ? ($PlaningData['suggestions_Consultant'] == '0' ? 'checked' : '') : '') }}>
                            <label class="form-check-label" for="participates2">No</label>
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
                      <textarea name="provided_description" id="" class="sub-textarea">{{old('provided_description', $PlaningCount == 1 ? $PlaningData['provided_description'] : '')}}</textarea>
                      @error('provided_description')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-5">
                      <p class="mb-0">Upload Image:</p>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="custom-file">
                              <input accept="image/*" type="file" name="image_upload" id="imgInp" class="custom-file-input custom-file-resize"> 
                              <label class="custom-file-label" for="img">Choose File</label>
                            </div>
                        </div>
                         @error('image_upload')
                            <div class="form-valid-error text-danger">{{ $message }}</div>
                         @enderror
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-5">
                    </div>
                    <div class="col-md-7">
                      <img id="blah" src="{{old('for_old_value') != '' ? old('for_old_value') : ($PlaningCount == 1 ? asset('public/DTF_DHS_Meeting/'.$PlaningData['file']) : '')}}" width="300" heigh="200"/>
                    </div>
                  </div>
                  <input type='hidden' name="for_old_value" id="for_old_value" value="{{old('for_old_value')}}">
                  <div class="col-md-10 mt-4 text-center">
                    <button type="submit" id="form_submit1" class="login-btn">{{$PlaningCount == 1 ? 'UPDATE' : 'SUBMIT'}}</button>
                 </div>
               </div>
             </form>
           </div>

           <div role="tabpanel" class="tab-pane fade  {{$errors->hasBag('sector_meeting')  || session()->has('sector-meeting') ? 'show active' : '' }}  " id="buzz">
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
                      <input type="number" name="total_district" value="{{old('total_district', $SectorMeetingCount == 1 ? $SectorMeetingData['total_district'] : '')}}">
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
                      <input type="number" name="number_meetings" value="{{old('number_meetings', $SectorMeetingCount == 1 ? $SectorMeetingData['number_meetings'] : '')}}">
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
                      <input type="number" name="meetings_participated" value="{{old('meetings_participated', $SectorMeetingCount == 1 ? $SectorMeetingData['meetings_participated'] : '')}}">
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
                    <textarea name="suggestions_consultan_description" id="" class="sub-textarea" >{{old('suggestions_consultan_description', $SectorMeetingCount == 1 ? $SectorMeetingData['suggestions_consultan_description'] : '')}}</textarea>
                    @error('suggestions_consultan_description','sector_meeting')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="col-md-10 mt-4 text-center">

                 <button type="submit" class="login-btn">{{$SectorMeetingCount == 1 ? 'UPDATE' : 'SUBMIT'}}</button>
               </div>
             </div>
           </form>
         </div>



         <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('samiti_meeting') || session()->has('nagni-samiti') ? 'show active' : '' }} " id="references">
          <div class="sub-tab-heading">
            Nigrani Samiti meeting
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
                        <input type="radio" class="form-check-input" id="exampleCheckn1" value="1" name="wheather_meeting" {{old('wheather_meeting') == '1' ? 'checked' : ($NigraniSamitiMeetingCount == 1 ? ($NigraniSamitiMeetingData['wheather_meeting'] == '1' ? 'checked' : '') : '') }}>
                        <label class="form-check-label mr-5" for="exampleCheckn1">Yes</label>
                        <input type="radio" class="form-check-input" id="exampleCheckn2" value="0" name="wheather_meeting" {{old('wheather_meeting') == '0' ? 'checked' : ($NigraniSamitiMeetingCount == 1 ? ($NigraniSamitiMeetingData['wheather_meeting'] == '0' ? 'checked' : '') : '') }}>
                        <label class="form-check-label" for="exampleCheckn2">No</label>
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
                        <input type="radio" class="form-check-input" id="sbccparticipated1" name="wheather_consultant_participated" value="1" {{old('wheather_consultant_participated') == '1' ? 'checked' : ($NigraniSamitiMeetingCount == 1 ? ($NigraniSamitiMeetingData['wheather_consultant_participated'] == '1' ? 'checked' : '') : '') }}>
                        <label class="form-check-label mr-5" for="sbccparticipated1">Yes</label>
                        <input type="radio" class="form-check-input" id="sbccparticipated2" name="wheather_consultant_participated" value="0" {{old('wheather_consultant_participated') == '0' ? 'checked' : ($NigraniSamitiMeetingCount == 1 ? ($NigraniSamitiMeetingData['wheather_consultant_participated'] == '0' ? 'checked' : '') : '') }}>
                        <label class="form-check-label" for="sbccparticipated2">No</label>
                      </div>
                      @error('wheather_consultant_participated','samiti_meeting')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </li>
                  </ul>
                </div>
              </div>


              <div class="col-md-10 mt-4 text-center">

               <button type="submit" class="login-btn">{{$NigraniSamitiMeetingCount == 1 ? 'UPDATE' : 'SUBMIT'}}</button>
             </div>
           </div>
         </form>
       </div>




       <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('district_communication') || session()->has('district-communication') ? 'show active' : '' }}" id="District">
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
                      <input type="radio" class="form-check-input" id="exampleCheckDcp1" name="wheather_developed" value="1" {{old('wheather_developed') == '1' ? 'checked' : ($DistrictCommunicationCount == 1 ? ($DistrictCommunicationData['wheather_developed'] == '1' ? 'checked' : '') : '')}} >
                      <label class="form-check-label mr-5" for="exampleCheckDcp1">Yes</label>
                      <input type="radio" id="nobutton" class="form-check-input" id="exampleCheckDcp2" name="wheather_developed" value="0" {{old('wheather_developed') == '1' ? '' : ($DistrictCommunicationCount == 1 ? ($DistrictCommunicationData['wheather_developed'] == '0' ? 'checked' : '') : '')}} >
                      <label class="form-check-label" for="exampleCheckDcp2">No</label>
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
                <select name="If_yes_month" id="If_yes_month" class="bg-transparent w-50 py-2 px-2 category">
                  <option disabled selected hidden>Month</option>
                  <option value="1" {{old('If_yes_month') == '1' ? 'selected' : ($DistrictCommunicationCount == 1 ? ($DistrictCommunicationData['If_yes_month'] == '1' ? 'selected' : '') : '')}}>January</option>
                  
                  <option value="2" {{old('If_yes_month') == '2' ? 'selected' : ($DistrictCommunicationCount == 1 ? ($DistrictCommunicationData['If_yes_month'] == '2' ? 'selected' : '') : '')}}>February</option>
                 
                  <option value="3" {{old('If_yes_month') == '3' ? 'selected' : ($DistrictCommunicationCount == 1 ? ($DistrictCommunicationData['If_yes_month'] == '3' ? 'selected' : '') : '')}}>March</option>
                  
                  <option value="4" {{old('If_yes_month') == '4' ? 'selected' : ($DistrictCommunicationCount == 1 ? ($DistrictCommunicationData['If_yes_month'] == '4' ? 'selected' : '') : '')}}>April</option>

                  <option value="5" {{old('If_yes_month') == '5' ? 'selected' : ($DistrictCommunicationCount == 1 ? ($DistrictCommunicationData['If_yes_month'] == '5' ? 'selected' : '') : '')}}>May</option>
                  
                  <option value="6" {{old('If_yes_month') == '6' ? 'selected' : ($DistrictCommunicationCount == 1 ? ($DistrictCommunicationData['If_yes_month'] == '6' ? 'selected' : '') : '')}}>June</option>
                  
                  <option value="7" {{old('If_yes_month') == '7' ? 'selected' : ($DistrictCommunicationCount == 1 ? ($DistrictCommunicationData['If_yes_month'] == '7' ? 'selected' : '') : '')}}>July</option>
                  
                  <option value="8" {{old('If_yes_month') == '8' ? 'selected' : ($DistrictCommunicationCount == 1 ? ($DistrictCommunicationData['If_yes_month'] == '8' ? 'selected' : '') : '')}}>August</option>
                 
                 <option value="9" {{old('If_yes_month') == '9' ? 'selected' : ($DistrictCommunicationCount == 1 ? ($DistrictCommunicationData['If_yes_month'] == '9' ? 'selected' : '') : '')}}>September</option>

                  <option value="10" {{old('If_yes_month') == '10' ? 'selected' : ($DistrictCommunicationCount == 1 ? ($DistrictCommunicationData['If_yes_month'] == '10' ? 'selected' : '') : '')}}>October</option>
                 
                  <option value="11" {{old('If_yes_month') == '11' ? 'selected' : ($DistrictCommunicationCount == 1 ? ($DistrictCommunicationData['If_yes_month'] == '11' ? 'selected' : '') : '')}}>November</option>
                 
                 <option value="12" {{old('If_yes_month') == '12' ? 'selected' : ($DistrictCommunicationCount == 1 ? ($DistrictCommunicationData['If_yes_month'] == '12' ? 'selected' : '') : '')}}>December</option>
                </select>
                @error('If_yes_month','district_communication')
                <div class="form-valid-error text-danger">{{ $message }}</div>
                @enderror
              </div>

            </div>
            <div class="col-md-10 mt-4 text-center">

             <button type="submit" class="login-btn">{{$DistrictCommunicationCount == 1 ? 'UPDATE' : 'SUBMIT'}}</button>
           </div>
         </div>
       </form>
     </div>

     <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('fortnightly_implementation') || session()->has('fortnightly-implementation') ? 'show active' : '' }}" id="Fortnightly">
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
                    <input type="radio" class="form-check-input" id="fortnightly1" name="first_fortnighly_report" value="1"  {{old('first_fortnighly_report') == '1' ? 'checked' : ($FortnightlyReportCount == 1 ? ($FortnightlyReportData['first_fortnighly_report'] == '1' ? 'checked' : '') : '') }}>

                    <label class="form-check-label mr-5" for="fortnightly1">Yes</label>
                    <input type="radio" class="form-check-input" id="fortnightly2" name="first_fortnighly_report" value="0" {{old('first_fortnighly_report') == '0' ? 'checked' : ($FortnightlyReportCount == 1 ? ($FortnightlyReportData['first_fortnighly_report'] == '0' ? 'checked' : '') : '') }}>
                    <label class="form-check-label" for="fortnightly2">No</label>
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
                    <input type="radio" class="form-check-input" id="FortnighlyCheck1" name="second_fortnighly_report" value="1" {{old('second_fortnighly_report') == '1' ? 'checked' : ($FortnightlyReportCount == 1 ? ($FortnightlyReportData['second_fortnighly_report'] == '1' ? 'checked' : '') : '') }}>
                    <label class="form-check-label mr-5"  name="" for="FortnighlyCheck1">Yes</label>
                    <input type="radio" class="form-check-input" id="FortnighlyCheck2" name="second_fortnighly_report" value="0"  {{old('second_fortnighly_report') == '0' ? 'checked' : ($FortnightlyReportCount == 1 ? ($FortnightlyReportData['second_fortnighly_report'] == '0' ? 'checked' : '') : '') }}>
                    <label class="form-check-label" for="FortnighlyCheck2">No</label>
                  </div>
                </li>
              </ul>
              @error('second_fortnighly_report','fortnightly_implementation')
              <div class="form-valid-error text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col-md-10 mt-4 text-center">

           <button type="submit" class="login-btn">{{$FortnightlyReportCount == 1 ? 'UPDATE' : 'SUBMIT'}}</button>
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
<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
            $('#for_old_value').attr('value', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
     }
 }
  $("#imgInp").change(function(){
    readURL(this);
     var formData = new FormData();
     formData.append('image_upload', $('#imgInp')[0].files[0]);
  });
  
//   imgInp.onchange = evt => {
//   const [file] = imgInp.files
//   if (file) {
//     blah.src = URL.createObjectURL(file)
//   }
// }
$('#nobutton').on('change', function(){
  $('#If_yes_month').val($("#If_yes_month option:first").val());
});

</script>
<script>
  
$(function () {
    //Initialize Select2 Elements
    $('.line_departments_meetings').select2()
  })

</script>
<script>
$('document').ready(function(){
var select_value = $("#line_department_meeting").val();
if(select_value == 'Other')
{
  // $("#add_other_detail").append(
  //         '<div class="col-md-5">' +'</div>' +
  //         '<div class="col-md-7" id="add_other_detail">' + 
  //         // '<div class="form-valid-error text-danger">You cannot choose anthoer option because you chose other so fill other meeting name or change option</div>' +
  //          '<textarea name="other_meeting[]" class="sub-textarea" placeholder="Other Meeting">{{old("other_meeting") ? old("other_meeting")[0] : ''}}</textarea>' + 
  //         '</div>'
  // );
    $("#add_other_detail").append(
          `<div class="col-md-5"></div><div class="col-md-7" id="add_other_detail"><textarea name="other_meeting[]" class="sub-textarea" placeholder="Other Meeting">@if(old('other_meeting')){{old("other_meeting")[0]}}@elseif($PlaningCount == 1){{$line_departments[0] == 'Other' ? $line_departments[1] : ''}}
            @endif</textarea>@error('other_meeting.*')<div class="form-valid-error text-danger">{{ $message }}</div>@enderror </div>` 
  );
}
});

$('#line_department_meeting').on('change', function(e){
    var selected = $(e.target).val();
    
   if(selected && Object.values(selected).includes('Other')){
    var counter = 0;
     $("#line_department_meeting").val("");
     $("#line_department_meeting").val("Other");
      $("#add_other_detail").empty();
      $("#add_other_detail").append(
          `<div class="col-md-5"></div><div class="col-md-7" id="add_other_detail"><textarea name="other_meeting[]" class="sub-textarea" placeholder="Other Meeting"></textarea></div> @error("other_meeting.*")<div class="form-valid-error text-danger">{{ $message }}</div>@enderror`
          );
   }
   else{
    $("#add_other_detail").empty();
   }
});


</script>

@stop
