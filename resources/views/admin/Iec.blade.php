 @extends('admin.sidebar')
    @section('title','Dashboard')
    @section('content')
     
              <div class="row  bg-white shadow-sm ground-section ">
                <div class="col-md-3 px-2">
                  <ul class="nav nav-tabs sub-tabs d-flex w-100" role="tablist">
                    <li class="nav-item d-flex w-100">
                      <a class="nav-link border {{($errors->hasBag('Local_Iec')) || ($errors->hasBag('Special_Iec')) || (session()->has('local-iec')) || (session()->has('special-iec')) ? '' : 'active'}}" href="#Prototyoe" role="tab" data-toggle="tab">No of IEC material/Prototyoe received from State</a>
                    </li>
                    <li class="nav-item d-flex w-100">
                      <a class="nav-link border {{$errors->hasBag('Local_Iec') || session()->has('local-iec') ? 'active' : ''}}" href="#disseminated" role="tab" data-toggle="tab"> No. of Local IEC material developed and disseminated</a>
                    </li>
                    <li class="nav-item d-flex w-100">
                      <a class="nav-link border {{$errors->hasBag('Special_Iec') || session()->has('special-iec') ? 'active' : ''}}" href="#Adolescent" role="tab" data-toggle="tab">Special IEC for Pregnant women and Adolescent</a>
                    </li>
                  </ul>
                </div>
                <div class="col-md-9 px-2">
                  <div class="tab-content border">
                    <div role="tabpanel" class="tab-pane fade {{($errors->hasBag('Local_Iec')) || ($errors->hasBag('Special_Iec')) || (session()->has('local-iec')) || (session()->has('special-iec')) ? '' : 'show active'}}" id="Prototyoe">
                      <div class="sub-tab-heading">
                        IEC material/Prototyoe received from State
                      </div>


            <form action="{{route('admin.iecMaterial')}}" method="POST">
              @csrf
                      <div class="sub-content p-4">
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Posters:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number" name="posters" value="{{old('posters', $IecMaterialCount == 1 ? $IecMaterialData['posters'] : '')}}">
                              @error('posters')
                              <div class="form-valid-error text-danger">{{$message}}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Banners:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number" name="banners" value="{{old('banners', $IecMaterialCount == 1 ? $IecMaterialData['banners'] : '')}}">
                              @error('banners')
                              <div class="form-valid-error text-danger">{{$message}}</div>  
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">FFL:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number" name="ffl" value="{{old('ffl', $IecMaterialCount == 1 ? $IecMaterialData['ffl'] : '')}}">
                              @error('ffl')
                              <div class="form-valid-error text-danger">{{$message}}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Leaflet:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number" name="leaflet" value="{{old('leaflet', $IecMaterialCount == 1 ? $IecMaterialData['leaflet'] : '')}}">
                              @error('leaflet')
                              <div class="form-valid-error text-danger">{{$message}}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="col-md-10 mt-4 text-center">
                           <button type="submit" class="login-btn"> {{$IecMaterialCount == 1 ? 'UPDATE' : 'SUBMIT'}}</button>
                          </div>
                      </div>

        </form >
                    </div>
                    <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('Local_Iec') || session()->has('local-iec') ? 'show active' : ''}}" id="disseminated">
                      <div class="sub-tab-heading">
                        Local IEC material developed and disseminated
                      </div>

          <form action="{{route('admin.localIecMaterial')}}" method="POST">
            @csrf
                      <div class="sub-content p-4">
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Posters:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number" name="local_posters" value="{{old('local_posters', $IecLocalCount == 1 ? $IecLocalData['posters'] : '')}}">
                              @error('local_posters', 'Local_Iec')
                              <div class="form-valid-error text-danger">{{$message}}</div>  
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Banners:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number" name="local_banners" value="{{old('local_banners', $IecLocalCount == 1 ? $IecLocalData['banners'] : '')}}">
                              @error('local_banners', 'Local_Iec')
                              <div class="form-valid-error text-danger">{{$message}}</div>  
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Audio clips (local language):</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number" name="local_audio_clip" value="{{old('local_audio_clip', $IecLocalCount == 1 ? $IecLocalData['audio_clip'] : '')}}">
                              @error('local_audio_clip', 'Local_Iec')
                              <div class="form-valid-error text-danger">{{$message}}</div>  
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Video clips:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number" name="local_video_clip" value="{{old('local_video_clip', $IecLocalCount == 1 ? $IecLocalData['video_clip'] : '')}}">
                              @error('local_video_clip', 'Local_Iec')
                              <div class="form-valid-error text-danger">{{$message}}</div>  
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Jingles:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number" name="local_jingles" value="{{old('local_jingles', $IecLocalCount == 1 ? $IecLocalData['jingles'] : '')}}">
                              @error('local_jingles', 'Local_Iec')
                              <div class="form-valid-error text-danger">{{$message}}</div>  
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="col-md-10 mt-4 text-center">

                           <button type="submit" class="login-btn">{{$IecLocalCount == 1 ? 'UPDATE' : 'SUBMIT'}}</button>
                          </div>
                      </div>
            </form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade {{$errors->hasBag('Special_Iec') || session()->has('special-iec') ? 'show active' : ''}}" id="Adolescent">
                      <div class="sub-tab-heading">
                        Special IEC for Pregnant women and Adolescent
                      </div>

      <form action="{{route('admin.specialIecMaterial')}}" method="POST">
        @csrf
                      <div class="sub-content p-4">
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Posters:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number" name="special_posters" value="{{old('special_posters', $IecSpecialCount == 1 ? $IecSpecialData['posters'] : '')}}">
                              @error('special_posters', 'Special_Iec')
                              <div class="form-valid-error text-danger">{{$message}}</div>  
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Banners:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number" name="special_banners" value="{{old('special_banners', $IecSpecialCount == 1 ? $IecSpecialData['banners'] : '')}}">
                              @error('special_banners', 'Special_Iec')
                              <div class="form-valid-error text-danger">{{$message}}</div>  
                              @enderror
                            </div>
                          </div>
                        </div>

                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Leaflet:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number" name="special_leaflet" value="{{old('special_leaflet', $IecSpecialCount == 1 ? $IecSpecialData['leaflet'] : '')}}">
                              @error('special_leaflet', 'Special_Iec')
                              <div class="form-valid-error text-danger">{{$message}}</div>  
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center my-2">
                          <div class="col-md-3">
                            <p class="mb-0">Others:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="number" name="special_others" value="{{old('special_others', $IecSpecialCount == 1 ? $IecSpecialData['others'] : '')}}">
                              @error('special_others', 'Special_Iec')
                              <div class="form-valid-error text-danger">{{$message}}</div>  
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="col-md-10 mt-4 text-center">

                           <button type="submit" class="login-btn">{{$IecLocalCount == 1 ? 'UPDATE' : 'SUBMIT'}}</button>
                          </div>
                      </div>

      </form>
                    </div>
                  </div>
                </div>
               
              </div>

    @stop