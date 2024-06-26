 @extends('admin.sidebar')
 @section('title','Dashboard')
 @section('content')
 
        <div class="row  bg-white shadow-sm ground-section mx-0">
          <div class="col-md-3 px-2">
            <ul class="nav nav-tabs sub-tabs d-flex w-100" role="tablist">
              <li class="nav-item d-flex w-100">
                <a class="nav-link border  {{($errors->hasBag('Private_Meeting')) || ($errors->hasBag('Pharmacists_Associations')) || ($errors->hasBag('Merchant_Association'))  || ($errors->hasBag('Others_Pvt')) || (session()->has('meeting-practitioners'))  || (session()->has('pharmacists-associations')) || (session()->has('merchant-association')) || (session()->has('others')) ? '' : 'active'}}" href="#IAP" role="tab" data-toggle="tab">Meeting with IMA/IAP</a>
              </li>
              <li class="nav-item d-flex w-100">
                <a class="nav-link border {{$errors->hasBag('Private_Meeting') || session()->has('meeting-practitioners') ? 'active' : ''}}" href="#practitioners" role="tab" data-toggle="tab">Meeting with Private practitioners </a>
              </li>
              <li class="nav-item d-flex w-100">
                <a class="nav-link border {{$errors->hasBag('Pharmacists_Associations') || session()->has('pharmacists-associations') ? 'active' : ''}}" href="#Pharmacists" role="tab" data-toggle="tab">Pharmacists Associations</a>
              </li>
              <li class="nav-item d-flex w-100">
                <a class="nav-link border {{$errors->hasBag('Merchant_Association') || session()->has('merchant-association') ? 'active' : ''}}" href="#Merchant" role="tab" data-toggle="tab"> Merchant Association </a>
              </li>
              <li class="nav-item d-flex w-100">
                <a class="nav-link border {{$errors->hasBag('Others_Pvt') || session()->has('others') ? 'active' : ''}}" href="#Others" role="tab" data-toggle="tab"> Others</a>
              </li>
            </ul>
          </div>
          <div class="col-md-9 px-2">
            <div class="tab-content border">
              <div role="tabpanel" class="tab-pane fade {{($errors->hasBag('Private_Meeting')) || ($errors->hasBag('Pharmacists_Associations')) || ($errors->hasBag('Merchant_Association')) || ($errors->hasBag('Others_Pvt'))  || (session()->has('meeting-practitioners')) || (session()->has('pharmacists-associations'))  || (session()->has('merchant-association')) || (session()->has('others')) ? '' : 'show active'}}" id="IAP">
                <div class="sub-tab-heading">
                  Meeting with IMA/IAP
                </div>

                
                <form method="post" action="{{route('admin.meetingIMA')}}">
                @csrf
                  <div class="sub-content p-4">
                    <div class="row align-items-center mb-4">
                      <div class="col-md-4">
                        <p class="mb-0">No. of Meetings:</p>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group mb-0">
                          <input type="number" name="number_meeting" value="{{old('number_meeting', $ImaCount == 1 ? $ImaData['number_meeting'] : '')}}">
                        </div>
                        @error('number_meeting')
                        <div class="form-valid-error text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="row align-items-center">
                      <div class="col-md-4">
                        <p class="mb-0">No. of Participants:</p>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group mb-0">
                          <input type="number" name="number_participants" value="{{old('number_participants', $ImaCount == 1 ? $ImaData['number_participants'] : '')}}">
                        </div>
                        @error('number_participants')
                        <div class="form-valid-error text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-10 mt-4 text-center">
                     <button type="submit" class="login-btn">{{$ImaCount == 1 ? 'UPDATE' : 'SUBMIT'}}</button>
                   </div>
                 </div>
               </form>



             </div>
             <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('Private_Meeting') || session()->has('meeting-practitioners') ? 'show active' : ''}}" id="practitioners">
              <div class="sub-tab-heading">
                Meeting with Private practitioners
              </div>

              
              <form method="post" action="{{route('admin.meetingPrivate')}}">
              @csrf
                <div class="sub-content p-4">
                  <div class="row align-items-center mb-4">
                    <div class="col-md-4">
                      <p class="mb-0">No. of Meetings:</p>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group mb-0">
                        <input type="number" name="number_meeting" value="{{old('number_meeting', $PractitionersCount == 1 ? $PractitionersData['number_meeting'] : '')}}">
                      </div>
                      @error('number_meeting','Private_Meeting')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="row align-items-center">
                    <div class="col-md-4">
                      <p class="mb-0">No. of Participants:</p>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group mb-0">
                        <input type="number" name="number_participants" value="{{old('number_participants', $PractitionersCount == 1 ? $PractitionersData['number_participants'] : '')}}">
                      </div>
                      @error('number_participants','Private_Meeting')
                      <div class="form-valid-error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-10 mt-4 text-center">

                   <button type="submit" class="login-btn">{{$PractitionersCount == 1 ? 'UPDATE' : 'SUBMIT'}}</button>
                 </div>
               </div>

             </form>

           </div>
           <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('Pharmacists_Associations') || session()->has('pharmacists-associations') ? ' show active' : ''}}" id="Pharmacists">
            <div class="sub-tab-heading">
              Pharmacists Associations
            </div>

            
            <form method="post" action="{{route('admin.pharmacistsAssociations')}}">
            @csrf
              <div class="sub-content p-4">
                <div class="row align-items-center mb-4">
                  <div class="col-md-4">
                    <p class="mb-0">No. of Meetings:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="number" name="number_meeting" value="{{old('number_meeting', $PharmacistsCount == 1 ? $PharmacistsData['number_meeting'] : '')}}">
                    </div>
                    @error('number_meeting', 'Pharmacists_Associations')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-md-4">
                    <p class="mb-0">No. of Participants:</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-0">
                      <input type="number" name="number_participants"  value="{{old('number_participants', $PharmacistsCount == 1 ? $PharmacistsData['number_participants'] : '')}}">
                    </div>
                    @error('number_participants', 'Pharmacists_Associations')
                    <div class="form-valid-error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-10 mt-4 text-center">

                 <button type="submit" class="login-btn">{{$PharmacistsCount == 1 ? 'UPDATE' : 'SUBMIT'}}</button>
               </div>
             </div>

           </form>

         </div>
         <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('Merchant_Association') || session()->has('merchant-association') ? ' show active' : ''}}" id="Merchant">
          <div class="sub-tab-heading">
            Merchant Association
          </div>

          
          <form method="post" action="{{route('admin.merchantAssociation')}}">
          @csrf
            <div class="sub-content p-4">
              <div class="row align-items-center mb-4">
                <div class="col-md-4">
                  <p class="mb-0">No. of Meetings:</p>
                </div>
                <div class="col-md-4">
                  <div class="form-group mb-0">
                    <input type="number" name="number_meeting" value="{{old('number_meeting', $MerchantCount == 1 ? $MerchantData['number_meeting'] : '')}}">
                  </div>
                  @error('number_meeting', 'Merchant_Association')
                  <div class="form-valid-error text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col-md-4">
                  <p class="mb-0">No. of Participants:</p>
                </div>
                <div class="col-md-4">
                  <div class="form-group mb-0">
                    <input type="number" name="number_participants" value="{{old('number_participants', $MerchantCount == 1 ? $MerchantData['number_participants'] : '')}}">
                  </div>
                  @error('number_participants', 'Merchant_Association')
                  <div class="form-valid-error text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-10 mt-4 text-center">
               <button type="submit" class="login-btn">{{$MerchantCount == 1 ? 'UPDATE' : 'SUBMIT'}}</button>
             </div>
           </div>
         </form>

       </div>
       <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('Others_Pvt') || session()->has('others') ? 'show active' : ''}}" id="Others">
        <div class="sub-tab-heading">
          Others
        </div>
        <form method="post" action="{{route('admin.Others')}}">
        @csrf
          <div class="sub-content p-4">
            <div class="row align-items-center mb-4">
              <div class="col-md-4">
                <p class="mb-0">No. of Meetings:</p>
              </div>
              <div class="col-md-4">
                <div class="form-group mb-0">
                  <input type="number" name="number_meeting" value="{{old('number_meeting', $OtherCount == 1 ? $OtherData['number_meeting'] : '')}}">
                </div>
                @error('number_meeting', 'Others_Pvt')
                <div class="form-valid-error text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col-md-4">
                <p class="mb-0">No. of Participants:</p>
              </div>
              <div class="col-md-4">
                <div class="form-group mb-0">
                  <input type="number" name="number_participants" value="{{old('number_participants', $OtherCount == 1 ? $OtherData['number_participants'] : '')}}">
                </div>
                @error('number_participants', 'Others_Pvt')
                <div class="form-valid-error text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-10 mt-4 text-center">

             <button type="submit" class="login-btn">{{$OtherCount == 1 ? 'UPDATE' : 'SUBMIT'}}</button>
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