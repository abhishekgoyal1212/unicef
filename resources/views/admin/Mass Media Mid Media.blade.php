 @extends('admin.sidebar')
    @section('title','Dashboard')
    @section('content')
      
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


              <form action="{{route('admin.MassMedia')}}" method="post">
                @csrf
                      <div class="sub-content p-4">
                        <div class="row align-items-center">
                          <div class="col-md-4">
                            <p class="mb-0"> Rally on COVID Vaccination:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text" name="rally_covid_vaccination" value="{{old('rally_covid_vaccination', $MassCount == 1 ? $MassData['rally_covid_vaccination'] : '')}}">
                              @error('rally_covid_vaccination')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
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
                              <input type="number" id="male" name="rally_covid_reach_male" value="{{old('rally_covid_reach_male', $MassCount == 1 ? $MassData['rally_covid_reach_male'] : '')}}">
                              @error('rally_covid_reach_male')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group mb-0">
                              <label for="Female">Female</label>
                              <input type="number" id="Female" name="rally_covid_reach_female" value="{{old('rally_covid_reach_female', $MassCount == 1 ? $MassData['rally_covid_reach_female'] : '')}}">
                              @error('rally_covid_reach_female')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center mt-4">
                          <div class="col-md-4">
                            <p class="mb-0"> Nukad Natak on COVID Vaccination:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text" name="nukad_natak" value="{{old('nukad_natak', $MassCount == 1 ? $MassData['nukad_natak'] : '')}}">
                              @error('nukad_natak')
                              <div class="form-valid-error text-danger">{{$message}}</div>
                              @enderror
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
                              <input type="number" id="male" name="nukad_natak_reach_male" value="{{old('nukad_natak_reach_male', $MassCount == 1 ? $MassData['nukad_natak_reach_male'] : '')}}">
                              @error('nukad_natak_reach_male')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group mb-0">
                              <label for="Female">Female</label>
                              <input type="number" id="Female" name="nukad_natak_reach_female" value="{{old('nukad_natak_reach_female', $MassCount == 1 ? $MassData['nukad_natak_reach_female'] : '')}}">
                              @error('nukad_natak_reach_female')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center mt-4">
                          <div class="col-md-4">
                            <p class="mb-0">  Folk Program:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text" name="flok_program" value="{{old('flok_program', $MassCount == 1 ? $MassData['flok_program'] : '')}}">
                              @error('flok_program')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
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
                              <input type="number" id="male" name="flok_program_reach_male" value="{{old('flok_program_reach_male', $MassCount == 1 ? $MassData['flok_program_reach_male'] : '')}}">
                              @error('flok_program_reach_male')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group mb-0">
                              <label for="Female">Female</label>
                              <input type="number" id="Female" name="flok_program_reach_female" value="{{old('flok_program_reach_female', $MassCount == 1 ? $MassData['flok_program_reach_female'] : '')}}">
                              @error('flok_program_reach_female')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center mt-4">
                          <div class="col-md-4">
                            <p class="mb-0">  Local/Community Radio:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text" name="local_community" value="{{old('local_community', $MassCount == 1 ? $MassData['local_community'] : '')}}">
                              @error('local_community')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
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
                              <input type="number" id="male" name="local_community_reach_male" value="{{old('local_community_reach_male', $MassCount == 1 ? $MassData['local_community_reach_male'] : '')}}">
                              @error('local_community_reach_male')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group mb-0">
                              <label for="Female">Female</label>
                              <input type="number" id="Female" name="local_community_reach_female" value="{{old('local_community_reach_female', $MassCount == 1 ? $MassData['local_community_reach_female'] : '')}}">
                              @error('local_community_reach_female')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center mt-4">
                          <div class="col-md-4">
                            <p class="mb-0">TV/Cable TV:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text" name="cable_tv" value="{{old('cable_tv', $MassCount == 1 ? $MassData['cable_tv'] : '')}}">
                              @error('cable_tv')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
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
                              <input type="number" id="male" name="cable_tv_reach_male" value="{{old('cable_tv_reach_male', $MassCount == 1 ? $MassData['cable_tv_reach_male'] : '')}}">
                              @error('cable_tv_reach_male')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group mb-0">
                              <label for="Female">Female</label>
                              <input type="number" id="Female" name="cable_tv_reach_female" value="{{old('cable_tv_reach_female', $MassCount == 1 ? $MassData['cable_tv_reach_female'] : '')}}">
                              @error('cable_tv_reach_female')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center mt-4">
                          <div class="col-md-4">
                            <p class="mb-0"> Flash Mob:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text" name="flash_mob" value="{{old('flash_mob', $MassCount == 1 ? $MassData['flash_mob'] : '')}}">
                              @error('flash_mob')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
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
                              <input type="number" id="male" name="flash_mob_reach_male" value="{{old('flash_mob_reach_male', $MassCount == 1 ? $MassData['flash_mob_reach_male'] : '')}}">
                              @error('flash_mob_reach_male')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group mb-0">
                              <label for="Female">Female</label>
                              <input type="number" id="Female" name="flash_mob_reach_female" value="{{old('flash_mob_reach_female', $MassCount == 1 ? $MassData['flash_mob_reach_female'] : '')}}">
                              @error('flash_mob_reach_female')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center mt-4">
                          <div class="col-md-4">
                            <p class="mb-0"> Others:</p>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group mb-0">
                              <input type="text" name="others" value="{{old('others', $MassCount == 1 ? $MassData['others'] : '')}}">
                              @error('others')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
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
                              <input type="number" id="male" name="others_reach_male" value="{{old('others_reach_male', $MassCount == 1 ? $MassData['others_reach_male'] : '')}}">
                              @error('others_reach_male')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group mb-0">
                              <label for="Female">Female</label>
                              <input type="number" id="Female" name="others_reach_female" value="{{old('others_reach_female', $MassCount == 1 ? $MassData['others_reach_female'] : '')}}">
                              @error('others_reach_female')
                              <div class="form-valid-error text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="col-md-10 mt-4 text-center">

                           <button type="submit" class="login-btn">{{$MassCount == 1 ? 'UPDATE' : 'SUBMIT'}}</button>
                          </div>
                      </div>

        </form>
                    </div>
                  </div>
                </div>
               

              </div>
           
    @stop