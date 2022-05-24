 @extends('admin.sidebar')
 @section('title','Dashboard')
 @section('content')
 <div class="row  bg-white shadow-sm  ground-section" >
  <div class="col-md-3 px-2">
    <ul class="nav nav-tabs sub-tabs d-flex w-100" role="tablist">
      <li class="nav-item d-flex w-100">
        <a class="nav-link active border" href="#Coordination" role="tab" data-toggle="tab">District Communication Plan</a>
      </li>
    </ul>
  </div>
  <div class="col-md-9 px-2">
    <div class="tab-content border">
      <div role="tabpanel" class="tab-pane fade show active" id="Coordinations">
        <div class="sub-tab-heading">
          District Communication Plan
        </div>
                  <form action ="{{route('admin.DcpInsert')}}" method="post">
                    @csrf
                      <div class="sub-content p-4">

                        <div class="row align-items-center">
                            <div class="col-md-5">
                              <p class="mb-0">DCP Prepared:</p>
                            </div>
                            <div class="col-md-7">
                              <ul class="list-unstyled mb-0">
                                <li class="d-inline mr-4">
                                  <div class="form-check d-inline">
                                    <input type="radio" name="dcp_prepared" value="1" class="form-check-input" id="exampleCheck1" {{old('dcp_prepared') == '1' ? 'checked' : ($DcpCount == 1 ? ($DcpData['dcp_prepared'] == '1' ? 'checked' : '') : '')}}>
                                    <label class="form-check-label mr-5" for="exampleCheck1">Yes</label>
                                    <input type="radio" value="0" name="dcp_prepared" class="form-check-input" id="exampleCheck2" {{old('dcp_prepared') == '1' ? '' : ($DcpCount == 1 ? ($DcpData['dcp_prepared'] == '0' ? 'checked' : '') : '') }}>
                                    <label class="form-check-label" for="exampleCheck2">No</label>
                                    <div>
                                      @error('dcp_prepared')
                                      <div class="form-valid-error text-danger">{{ $message }}</div>
                                      @enderror
                                    </div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        <div id="yes_content" style="display: none;">
                            <div class="row align-items-center my-4">
                              <div class="col-md-5">
                                <p class="mb-0">Total No. of Health Blocks in the district:</p>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group mb-0">
                                    <input type="number" name="No_Health_Blocks_in_district" value="{{old('No_Health_Blocks_in_district', $DcpCount == 1 ? $DcpData['No_Health_Blocks_in_district'] : '')}}">
                                    @error('No_Health_Blocks_in_district')
                                    <div class="form-valid-error text-danger">{{ $message }}</div>
                                    @enderror
                                  </div>
                              </div>
                            </div>

                             <div class="row align-items-center my-4">
                              <div class="col-md-5">
                                <p class="mb-0">No. of Blocks covered in the DCP:</p>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group mb-0">
                                    <input type="number" name="No_Blocks_covered_in_DCP" value="{{old('No_Blocks_covered_in_DCP', $DcpCount == 1 ? $DcpData['No_Blocks_covered_in_DCP'] : '')}}">
                                    @error('No_Blocks_covered_in_DCP')
                                    <div class="form-valid-error text-danger">{{ $message }}</div>
                                    @enderror
                                  </div>
                              </div>
                            </div>

                             <div class="row align-items-center my-4">
                              <div class="col-md-5">
                                <p class="mb-0">Whether DCP covered plan of Urban:</p>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group mb-0">
                                    <input type="text" name="Whether_DCP_covered_plan_of_Urban" value="{{old('Whether_DCP_covered_plan_of_Urban', $DcpCount == 1 ? $DcpData['Whether_DCP_covered_plan_of_Urban'] : '')}}">
                                    @error('Whether_DCP_covered_plan_of_Urban')
                                    <div class="form-valid-error text-danger">{{ $message }}</div>
                                    @enderror
                                  </div>
                              </div>
                            </div>
                      </div>
                          <div class="col-md-10 mt-4 text-center">
                           <button type="submit" class="login-btn">{{$DcpCount == 1 ? 'UPDATE' : 'SUBMIT'}}</button>
                          </div> 
                </div>
          </form>
                      </div>
                    </div>
                  </div>
                </div>

<script>
  $(document).ready(function (){
      var dcp_prepared_value =  $("input[name=dcp_prepared]:checked").val();
       if(dcp_prepared_value == 1){
          $('#yes_content').show();
        }else{
           $('#yes_content').hide();
        }
      $("input[name=dcp_prepared]").on('click', function(){
        var dcp_prepared_value = $(this).val();
        if(dcp_prepared_value == 1){
          $('#yes_content').show();
        }else{
           $('#yes_content').hide();
        }
      });
  });
</script>
@stop