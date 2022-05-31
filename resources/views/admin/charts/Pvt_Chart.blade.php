 @extends('admin.dashboard.index')
@section('title','Dashboard')
@section('content')

<style>
  .chartdiv {
    width: 100%;
    height: 350px;
    background-color: white;
  }

  .amchart{
      width: 100%;
    height: 350px;
    background-color: white;
  }
  .amchart2{
      width: 100%;
    height: 350px;
    background-color: white;
  }

  #append_div {
    width: 100%;
    height: 350px;
    background-color: white;
  }
  .select-sec-box h5 {
    padding-top: 0px;
    font-size: 16px;
    font-weight: 400;
  }
  .pp_append_div {
    width: 100%;
    
    background-color: white;
  }
  .custom-date-sec{
    padding-top: 2px
  }

  .custom-date-sec input{
   padding: 22px 10px !important;
   background: #f7f2ef !important;
   margin-top: 4px !important

 }
 .custom-date-sec-s input{
   background: #f7f2ef !important;

 }
 .select-sec-box select{
  padding: 10px;
  width: 95%;
} 
.select-sec-box.topic button{
  border: 1px solid #cecece;
  height: 40px;
  width: 100px;
  margin-top: 40px;
  font-size: 16px;
  color: #000000;
}
select#yes_no_in_district {
  width: 85%;
}
ul#list_group li {
  list-style: none;
  font-size: 14px;
  padding: 5px;
  color: #000
}
ul#list_group li:first-child{
  padding-top: 0px
}
.District-List h6{
  font-size: 23px;
  color: #000;
}
</style>
<div class="col-sm-9">
  <div class='row'>
    <div class="tab-content">
      <div id="Covid" class="tab-pane fade show active">
        <div class="row mb-5">
        
       
        </div>

    </div>
    <div class="row mt-4">
        <div class="col-3" >
            <lable>From Date</lable>
            <input type="text" name="pvtbodies_from_date" class="start_date" value="2022-04-01">
        </div>
        <div class="col-3">
            <lable>To Date</lable>
          <input type="text" name="pvtbodies_to_date" class="start_date" value="2022-04-15">
        </div>
              <div class="select-sec-box col-md-4">
                <h5>Select Pvt Bodies Table</h5>
                  <select class="select_value" id="pvtbodies_select_value">
                    <option value="pvt_ima_iap_meeting">Meeting with IMA/IAP</option>
                    <option value="private_practitionerst_meeting">Meeting with Private practitioners</option>
                    <option value="pvt_pharmacists_associations_meeting">Pharmacists Associations</option>
                    <option value="pvt_merchant_associations_meeting">Merchant Association</option>
                    <option value="pvt_others_meeting">Others</option>
                  </select>
              </div>
      </div>
    <div class="row mt-4">
        <div class="col-md-6 pr-lg-4 ">
           <h4 class="mb-4">Pvt Bodies</h4>
           <div class="bg-white p-4" id="append_pvt_bodies_graph"> </div>
        </div>
        <div class="col-md-6 pr-lg-3">
           <h4 class="mb-4">Pvt Bodies</h4>
           <div class="bg-white p-4" id="append_pvt_bodies_graph2"> </div>
        </div>
    </div>

  </div>
</div>



</div>

</div>

</div>
</section>


<script>
  $(document).ready(function () {
    $(".start_date").datepicker({
      onSelect: function() {
        $(this).change();
      },
      dateFormat: "yy-mm-dd",
      maxDate: 0,
      onSelect: function () {
        var dt2 = $('.end_date');
        var startDate = $(this).datepicker('getDate');
        startDate.setDate(startDate.getDate() + 30);
        var minDate = $(this).datepicker('getDate');
        var dt2Date = dt2.datepicker('getDate');
        var dateDiff = (dt2Date - minDate)/(86400 * 1000);
        if (dt2Date == null || dateDiff < 0) {
          dt2.datepicker('setDate', minDate);
        }
        else if (dateDiff > 30){
          dt2.datepicker('setDate', startDate);
        }
        dt2.datepicker('option', 'minDate', minDate);
      }
    });
    $('.end_date').datepicker({
      dateFormat: "yy-mm-dd",
      maxDate : "0",
    });
  });
</script>



<script>
 $('#select_value').click(function(event) {
  $(".for-show-hide").hide();
  $("#show-"+$(this).val()).show();
});
</script>
<script>
  var pvtbodies_select_value = 'pvt_ima_iap_meeting';
  $('#pvtbodies_select_value').on('change', function(){
    var pvtbodies_select_value = $(this).val();
    pvtbodies_chart(pvtbodies_select_value)
  });
  function pvtbodies_chart(IdValue){
    $('#append_pvt_bodies_graph').html('');
    $('#append_pvt_bodies_graph2').html('');
    var start_date = $('input[name=pvtbodies_from_date]').val();
    var end_date = $('input[name=pvtbodies_to_date]').val();
    var pvtbodies_select_value = IdValue;
    var csrf_token = '{{csrf_token()}}';
    $.ajax({
        url : "{{route('pvt_bodies_graph')}}",
        type : 'POST',
        data: {
          start_date:start_date,
          end_date : end_date,
          _token:csrf_token,
          pvtbodiesvalue:pvtbodies_select_value
        },
          success:function(pvtbodies){
            var pvtbodies = JSON.parse(pvtbodies);
            $.each(pvtbodies, function(key, value) {
                var pvtbodies_graph_append = '<h6 class="state-heading state_color'+key+'" >'+value.districts+'</h6><div class="row align-items-center "><div class="col-md-1"><div class="dot_round progress_cricle  left-cricle'+key+'"><i class="fa fa-circle ">'+value.meeting+'</i></div></div> <div class="col-md-10"><div class="progressive_bars"><div class="progress  "> <div class="progress-bar  progress_bg'+key+'" style="width: '+value.percent+'%"></div><div class="progress-bar   progress_text'+key+'">'+value.participants+'</div></div></div></div><div class="col-md-1"><div><i class="fa fa-circle" style="heigh:200px;"></i></div></div></div>'
              if(key <= 7){
                $('#append_pvt_bodies_graph').append(pvtbodies_graph_append);
              }else if(key > 7){
                $('#append_pvt_bodies_graph2').append(pvtbodies_graph_append);
              }
            });
          }
    });
  }
  pvtbodies_chart(pvtbodies_select_value);
</script>


@stop
