@extends('admin.sidebar')
@section('title','Dashboard')
@section('content')


    <div class="row  bg-white shadow-sm ground-section">
      <div class="col-md-3 px-2">

        <ul class="nav nav-tabs sub-tabs d-flex w-100" role="tablist">
          <li class="nav-item d-flex w-100">
            <a class="nav-link border 
            {{($errors->hasBag('Meeting_Influencers')) || ($errors->hasBag('Meeting_Numbers')) || ($errors->hasBag('Meeting_IPC'))  || ($errors->hasBag('Mother_Meeting')) || ($errors->hasBag('Community_Meeting')) || ($errors->hasBag('SHG_Meeting')) || ($errors->hasBag('Vulrenable_Meeting')) || ($errors->hasBag('Excluded_Meeting')) || ($errors->hasBag('Volunteer_Meeting')) 
            || (session()->has('meeting-influencers')) || (session()->has('number-meeting'))  || (session()->has('meeting-ipc')) || (session()->has('mother-meeting')) || (session()->has('community-meeting')) || (session()->has('shg-meeting')) || (session()->has('vulrenable-group-meeting')) || (session()->has('excluded-group-meeting')) || (session()->has('volunteer-meeting')) ? '' : 'active'}}" 
            href="#Religious" role="tab" data-toggle="tab"> Meeting with Faith Based Institutions /Religious Leaders</a>
          </li>
          <li class="nav-item d-flex w-100">
            <a class="nav-link border 
            {{$errors->hasBag('Meeting_Influencers') || session()->has('meeting-influencers') ? 'active' : ''}}" href="#Influencers" role="tab" data-toggle="tab"> 
            Meeting with Influencers </a>
          </li>
          <li class="nav-item d-flex w-100">
            <a class="nav-link border {{$errors->hasBag('Meeting_Numbers') || session()->has('number-meeting') ? ' active' : ''}}" href="#Number" role="tab" data-toggle="tab">Number of Meeting with</a>
          </li>
          <li class="nav-item d-flex w-100">
            <a class="nav-link border {{$errors->hasBag('Meeting_IPC') || session()->has('meeting-ipc')  ? 'active' : ''}}" href="#IPC" role="tab" data-toggle="tab">IPC</a>
          </li>
          <li class="nav-item d-flex w-100">
            <a class="nav-link border {{$errors->hasBag('Mother_Meeting') || session()->has('mother-meeting') ? 'active' : ''}}" href="#Mother" role="tab" data-toggle="tab">Mother Meetings </a>
          </li>
          <li class="nav-item d-flex w-100">
            <a class="nav-link border {{$errors->hasBag('Community_Meeting') || session()->has('community-meeting') ? 'active' : ''}}" href="#Community" role="tab" data-toggle="tab">Community Meetings</a>
          </li>
          <li class="nav-item d-flex w-100">
            <a class="nav-link border {{$errors->hasBag('SHG_Meeting') || session()->has('shg-meeting') ? 'active' : ''}}" href="#SHG" role="tab" data-toggle="tab">Meeting with SHG Members</a>
          </li>
          <li class="nav-item d-flex w-100">
            <a class="nav-link border {{$errors->hasBag('Vulrenable_Meeting') || session()->has('vulrenable-group-meeting') ? 'active' : ''}}" href="#Vulrenable" role="tab" data-toggle="tab">Meeting with Vulrenable Groups Sites</a>
          </li>
          <li class="nav-item d-flex w-100">
            <a class="nav-link border {{$errors->hasBag('Excluded_Meeting') || session()->has('excluded-group-meeting') ? 'active' : ''}}" href="#PWD" role="tab" data-toggle="tab">Meeting with excluded groups (PWD, Transgender)</a>
          </li>
          <li class="nav-item d-flex w-100">
            <a class="nav-link border {{$errors->hasBag('Volunteer_Meeting') || session()->has('volunteer-meeting') ? 'active' : ''}}" href="#organization" role="tab" data-toggle="tab">Meeting with the volunteer Organization</a>
          </li>
        </ul>
      </div>
      <div class="col-md-9 px-2">
        <div class="tab-content border">
          <div role="tabpanel" class="tab-pane fade  {{($errors->hasBag('Meeting_Influencers')) || ($errors->hasBag('Meeting_Numbers')) || ($errors->hasBag('Meeting_IPC')) || ($errors->hasBag('Meeting_IPC')) || ($errors->hasBag('Mother_Meeting'))  || ($errors->hasBag('Community_Meeting')) || ($errors->hasBag('SHG_Meeting')) || ($errors->hasBag('Vulrenable_Meeting')) || ($errors->hasBag('Excluded_Meeting')) || ($errors->hasBag('Volunteer_Meeting')) 
           || (session()->has('meeting-influencers')) || (session()->has('number-meeting'))  || (session()->has('meeting-ipc')) || (session()->has('mother-meeting')) || (session()->has('community-meeting')) || (session()->has('shg-meeting')) || (session()->has('vulrenable-group-meeting')) || (session()->has('excluded-group-meeting')) || (session()->has('volunteer-meeting'))  ? '' : 'show active'}}" id="Religious">
            <div class="sub-tab-heading">
              Meeting with Faith Based Institutions /Religious Leaders
            </div>
            <form action="{{route('admin.SmMeetingFaithBased')}}" method="post">
              @csrf
              <div class="sub-content p-4">
                <div class="row align-items-center">
                  <div class="col-md-4">
                    <p class="mb-0">Number of Meetings:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="number" name="number_meetings" value="{{old('number_meetings')}}">
                      @error('number_meetings')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row align-items-center my-3">
                  <div class="col-md-4">
                    <p class="mb-0">Number of Participants:</p>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group mb-0">
                      <label for="male">Male</label>
                      <input type="number" id="male" name="number_participants_male" value="{{old('number_participants_male')}}">
                      @error('number_participants_male')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group mb-0">
                      <label for="Female">Female</label>
                      <input type="number" id="Female" name="number_participants_female" value="{{old('number_participants_female')}}">
                      @error('number_participants_female')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-md-4">
                    <p class="mb-0">Reach through Faitrh:</p>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group mb-0">
                      <input type="text" placeholder="Institutions/Religious leaders" name="reach_faitrh" value="{{old('reach_faitrh')}}">
                      @error('reach_faitrh')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                
                <div class="col-md-12 mt-4 text-center">
                  <button type="submit" class="login-btn">SUBMIT</button>
                </div>
                
              </div>
            </form>
            
          </div>
          
          
          <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('Meeting_Influencers') || session()->has('meeting-influencers') ? 'show active' : ''}}" id="Influencers">
            <div class="sub-tab-heading">
              Meeting with Influencers
            </div>
            
            <form action="{{route('admin.SmMeetingInfluencers')}}" method="post">
               @csrf
              <div class="sub-content p-4">
                <div class="row align-items-center">
                  <div class="col-md-4">
                    <p class="mb-0">Number of Meetings:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="number" name="number_meetings" value="{{old('number_meetings')}}">
                      @error('number_meetings', 'Meeting_Influencers')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row align-items-center my-3">
                  <div class="col-md-4">
                    <p class="mb-0">Number of Participants:</p>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group mb-0">
                      <label for="male">Male</label>
                      <input type="text" id="male" name="number_participants_male" value="{{old('number_participants_male')}}">
                      @error('number_participants_male', 'Meeting_Influencers')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group mb-0">
                      <label for="Female">Female</label>
                      <input type="text" id="Female" name="number_participants_female" value="{{old('number_participants_female')}}">
                      @error('number_participants_female', 'Meeting_Influencers')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-md-4">
                    <p class="mb-0">Reach through Influencers:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="text" name="reach_influencers" value="{{old('reach_influencers')}}">
                      @error('reach_influencers', 'Meeting_Influencers')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mt-4 text-center">
                  <button type="submit" class="login-btn">SUBMIT</button>
                </div>
              </div>
            </div>
          </form>
          
          
          
          <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('Meeting_Numbers') || session()->has('number-meeting') ? 'show active' : ''}}" id="Number">
            <div class="sub-tab-heading">
              Number of Meeting
            </div>
            <form action="{{route('admin.SmMeetingNumbers')}}" method="post">
               @csrf
              <div class="sub-content p-4">
                <div class="row align-items-center">
                  <div class="col-md-4">
                    <p class="mb-0">Lions Club:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="text" name="lions_club" value="{{old('lions_club')}}">
                      @error('lions_club', 'Meeting_Numbers')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row align-items-center my-3">
                  <div class="col-md-4">
                    <p class="mb-0">Rotary:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="text" name="rotary" value="{{old('rotary')}}">
                      @error('rotary', 'Meeting_Numbers')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-md-4">
                    <p class="mb-0">local CSOs/Others</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="text" name="local_csos_Others" value="{{old('local_csos_Others')}}">
                      @error('local_csos_Others', 'Meeting_Numbers')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mt-4 text-center">
                  
                  <button type="submit" class="login-btn">SUBMIT</button>
                </div>
                
              </div>
              
            </form>
          </div>
          
          
          <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('Meeting_IPC') || session()->has('meeting-ipc') ? 'show active' : ''}}" id="IPC">
            <div class="sub-tab-heading">
              IPC
            </div>
            <form action="{{route('admin.SmMeetingIpc')}}" method="post">
               @csrf
              <div class="sub-content p-4">
                <div class="row align-items-center">
                  <div class="col-md-4">
                    <p class="mb-0">Number of IPC:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="number" name="number_meetings" value="{{old('number_meetings')}}">
                      @error('number_meetings', 'Meeting_IPC')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row align-items-center my-3">
                  <div class="col-md-4">
                    <p class="mb-0">Number of family visited:</p>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group mb-0">
                      <label for="male">Male</label>
                      <input type="number" id="male" name="number_participants_male" value="{{old('number_participants_male')}}">
                      @error('number_participants_male', 'Meeting_IPC')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group mb-0">
                      <label for="Female">Female</label>
                      <input type="number" id="Female" name="number_participants_female" value="{{old('number_participants_female')}}">
                      @error('number_participants_female', 'Meeting_IPC')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mt-4 text-center">
                  
                  <button type="submit" class="login-btn">SUBMIT</button>
                </div>
                
              </div>
            </form>
          </div>
          
          
          <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('Mother_Meeting') || (session()->has('mother-meeting')) ? 'show active' : ''}}" id="Mother">
            <div class="sub-tab-heading">
              Mother Meetings
            </div>
            
            <form action="{{route('admin.SmMeetingMotherMeeting')}}" method="post">
               @csrf
              <div class="sub-content p-4">
                <div class="row align-items-center">
                  <div class="col-md-4">
                    <p class="mb-0">Number of Meetings:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="number" name="number_meetings" value="{{old('number_meetings')}}">
                      @error('number_meetings', 'Mother_Meeting')
                      <div class="form-valid-error text-danger">{{$message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row align-items-center my-3">
                  <div class="col-md-4">
                    <p class="mb-0">Number of Participants:</p>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group mb-0">
                      <label for="male">Male</label>
                      <input type="number" id="male" name="number_participants_male" value="{{old('number_participants_male')}}">
                      @error('number_participants_male', 'Mother_Meeting')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group mb-0">
                      <label for="Female">Female</label>
                      <input type="number" id="Female" name="number_participants_female" value="{{old('number_participants_female')}}">
                      @error('number_participants_female', 'Mother_Meeting')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mt-4 text-center">
                  
                  <button type="submit" class="login-btn">SUBMIT</button>
                </div>
                
              </div>
            </form>
          </div>
          
          
          <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('Community_Meeting') || session()->has('community-meeting') ? 'show active' : ''}}" id="Community">
            <div class="sub-tab-heading">
              Community Meetings
            </div>
            
           <form action="{{route('admin.SmCommunityMeeting')}}" method="post">
            @csrf
              
              <div class="sub-content p-4">
                <div class="row align-items-center">
                  <div class="col-md-4">
                    <p class="mb-0">Number of Meetings:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="number" name="number_meetings" value="{{old('number_meetings')}}">
                      @error('number_meetings', 'Community_Meeting')
                      <div class="form-valid-error text-danger">{{$message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row align-items-center my-3">
                  <div class="col-md-4">
                    <p class="mb-0">Number of Participants:</p>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group mb-0">
                      <label for="male">Male</label>
                      <input type="number" id="male" name="number_participants_male" value="{{old('number_participants_male')}}">
                      @error('number_participants_male', 'Community_Meeting')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group mb-0">
                      <label for="Female">Female</label>
                      <input type="number" id="Female" name="number_participants_female" value="{{old('number_participants_female')}}">
                      @error('number_participants_female', 'Community_Meeting')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mt-4 text-center">
                  
                  <button type="submit" class="login-btn">SUBMIT</button>
                </div>
                
              </div>
            </form>
          </div>
          
          
          <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('SHG_Meeting') || session()->has('shg-meeting') ? 'show active' : ''}}" id="SHG">
            <div class="sub-tab-heading">
              Meeting with SHG Members
            </div>
             <form action="{{route('admin.SmShgMeeting')}}" method="post">
              @csrf
              <div class="sub-content p-4">
                <div class="row align-items-center">
                  <div class="col-md-4">
                    <p class="mb-0">Number of Meetings:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="number" name="number_meetings" value="{{old('number_meetings')}}">
                      @error('number_meetings', 'SHG_Meeting')
                      <div class="form-valid-error text-danger">{{$message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row align-items-center my-3">
                  <div class="col-md-4">
                    <p class="mb-0">Number of Participants:</p>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group mb-0">
                      <label for="male">Male</label>
                      <input type="number" id="male" name="number_participants_male" value="{{old('number_participants_male')}}">
                      @error('number_participants_male', 'SHG_Meeting')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group mb-0">
                      <label for="Female">Female</label>
                      <input type="number" id="Female" name="number_participants_female" value="{{old('number_participants_female')}}">
                      @error('number_participants_female', 'SHG_Meeting')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mt-4 text-center">
                  <button type="submit" class="login-btn">SUBMIT</button>
                </div>
              </div>
            </form>
          </div>
          
          
          <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('Vulrenable_Meeting') || 
          session()->has('vulrenable-group-meeting') ? 'show active' : ''}}" id="Vulrenable">
            <div class="sub-tab-heading">
              Meeting with Vulrenable Groups Sites
            </div>
             <form action="{{route('admin.SmVulrenableMeeting')}}" method="post">
              @csrf
              <div class="sub-content p-4">
                <div class="row align-items-center">
                  <div class="col-md-4">
                    <p class="mb-0">Number of Meetings:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="number" name="number_meetings" value="{{old('number_meetings')}}">
                      @error('number_meetings', 'Vulrenable_Meeting')
                      <div class="form-valid-error text-danger">{{$message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row align-items-center my-3">
                  <div class="col-md-4">
                    <p class="mb-0">Number of Participants:</p>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group mb-0">
                      <label for="male">Male</label>
                      <input type="number" id="male" name="number_participants_male" value="{{old('number_participants_male')}}">
                      @error('number_participants_male', 'Vulrenable_Meeting')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group mb-0">
                      <label for="Female">Female</label>
                      <input type="number" id="Female" name="number_participants_female" value="{{old('number_participants_female')}}">
                      @error('number_participants_female', 'Vulrenable_Meeting')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mt-4 text-center">
                  <button type="submit" class="login-btn">SUBMIT</button>
                </div>
              </div>
            </form>
          </div>
          
          
          <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('Excluded_Meeting') || session()->has('excluded-group-meeting') ? 'show active' : ''}}" id="PWD">
            <div class="sub-tab-heading">
              Meeting with excluded groups(PWD,Transgender)
            </div>
             <form action="{{route('admin.SmExcludedGroups')}}" method="post">
              @csrf
              <div class="sub-content p-4">
                <div class="row align-items-center">
                  <div class="col-md-4">
                    <p class="mb-0">Number of Meetings:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="number" name="number_meetings" value="{{old('number_meetings')}}">
                      @error('number_meetings', 'Excluded_Meeting')
                      <div class="form-valid-error text-danger">{{$message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row align-items-center my-3">
                  <div class="col-md-4">
                    <p class="mb-0">Number of Participants:</p>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group mb-0">
                      <label for="male">Male</label>
                      <input type="number" id="male" name="number_participants_male" value="{{old('number_participants_male')}}">
                      @error('number_participants_male', 'Excluded_Meeting')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group mb-0">
                      <label for="Female">Female</label>
                      <input type="number" id="Female" name="number_participants_female" value="{{old('number_participants_female')}}">
                      @error('number_participants_female', 'Excluded_Meeting')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mt-4 text-center">
                  
                  <button type="submit" class="login-btn">SUBMIT</button>
                </div>
              </div>
            </form>
            
          </form>
        </div>
        <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('Volunteer_Meeting') || session()->has('volunteer-meeting') ? 'show active' : ''}}" id="organization">
          <div class="sub-tab-heading">
            Meeting with the volunteer organization
          </div>
           <form action="{{route('admin.SmVolunteerMeeting')}}" method="post">
            @csrf
            
            <div class="sub-content p-4">
              <div class="row align-items-center">
                <div class="col-md-4">
                  <p class="mb-0">Number of meeting with NYKS:</p>
                </div>
                <div class="col-md-4">
                  <div class="form-group mb-0">
                    <input type="number" name="nyks_number_meetings" value="{{old('nyks_number_meetings')}}">
                    @error('nyks_number_meetings', 'Volunteer_Meeting')
                    <div class="form-valid-error text-danger">{{$message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row align-items-center my-3 mb-5">
                <div class="col-md-4">
                  <p class="mb-0">Number of Participants:</p>
                </div>
                <div class="col-md-2">
                  <div class="form-group mb-0">
                    <label for="male">Male</label>
                    <input type="number" id="male" name="nyks_participants_male" value="{{old('nyks_participants_male')}}">
                    @error('nyks_participants_male', 'Volunteer_Meeting')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group mb-0">
                    <label for="Female">Female</label>
                    <input type="number" id="Female" name="nyks_participants_female" value="{{old('nyks_participants_female')}}">
                    @error('nyks_participants_female', 'Volunteer_Meeting')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col-md-4">
                  <p class="mb-0">Number of meeting with NSS:</p>
                </div>
                <div class="col-md-4">
                  <div class="form-group mb-0">
                    <input type="number" name="nss_number_meetings" value="{{old('nss_number_meetings')}}">
                    @error('nss_number_meetings', 'Volunteer_Meeting')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row align-items-center my-3 mb-5">
                <div class="col-md-4">
                  <p class="mb-0">Number of Participants:</p>
                </div>
                <div class="col-md-2">
                  <div class="form-group mb-0">
                    <label for="male">Male</label>
                    <input type="number" id="male" name="nss_participants_male" value="{{old('nss_participants_male')}}">
                    @error('nss_participants_male', 'Volunteer_Meeting')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group mb-0">
                    <label for="Female">Female</label>
                    <input type="number" id="Female" name="nss_participants_female" value="{{old('nss_participants_female')}}">
                    @error('nss_participants_female', 'Volunteer_Meeting')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col-md-4">
                  <p class="mb-0">Number of meeting with Bharat Scout Guide:</p>
                </div>
                <div class="col-md-4">
                  <div class="form-group mb-0">
                    <input type="number" name="bsg_number_meetings" value="{{old('bsg_number_meetings')}}">
                    @error('bsg_number_meetings', 'Volunteer_Meeting')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row align-items-center my-3 mb-5">
                <div class="col-md-4">
                  <p class="mb-0">Number of Participants:</p>
                </div>
                <div class="col-md-2">
                  <div class="form-group mb-0">
                    <label for="male">Male</label>
                    <input type="number" id="male" name="bsg_participants_male" value="{{old('bsg_participants_male')}}">
                    @error('bsg_participants_male', 'Volunteer_Meeting')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group mb-0">
                    <label for="Female">Female</label>
                    <input type="number" id="Female" name="bsg_participants_female" value="{{old('bsg_participants_female')}}">
                    @error('bsg_participants_female', 'Volunteer_Meeting')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-md-12 mt-4 text-center">
                
                <button type="submit" class="login-btn">SUBMIT</button>
              </div>
            </div>
            
          </form> 
          
        </div>
      </div>
    </div>
  </div>

@stop