@extends('layouts.admin')

@section('title','Job Order')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transactions
        <!-- <small>Control panel</small> -->
      </h1>
    <!--   <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol> -->
    </section>

    <section class="content">
      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Job Order</h3>
            </div>
            <div class="box-body">
              <button class="btn btn-primary addJobOrder" data-toggle="modal" data-target="#addJobOrder" style="padding: 10px; width: 160px;"><strong>CREATE JOB ORDER</strong>  <span class="fa fa-plus"></span></button>
              <div class="content">
                <table class="table table-hover" id="example1">
                  <thead>
                    <tr>
                      <th>Employer</th>
                      <th>Job Name</th>
                      <th>Required Skills</th>
                      <th>Documentary Requirements</th>
                      <th>Required Fees</th>
                      <th width="100px">Actions</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div> 
          </div>
        </div>
      </div>

    </section>

  </div>

      <div class="modal fade bs-example-modal-lg" id="addJobOrder">
        <form method="post">
          {{csrf_field()}}
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Create Job Order</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Employer</label>
                      <select class="select2 form-control emplsel" name="employer" style="width: 100%">
                        <option></option>
                        @foreach($emplyr as $emp)
                        <option value="{{$emp->EMPLOYER_ID}}">{{$emp->EMPLOYERNAME}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Job Category</label> 
                      <select class="select2 form-control ctgrysel" name="jobcat" style="width: 100%">
                        <option></option>
                        @foreach($jobcat as $cat)
                        <option value="{{$cat->CATEGORY_ID}}">{{$cat->CATEGORYNAME}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Job Name</label> 
                      <select class="select2 form-control jobsel" name="jobname" style="width: 100%">
                        <option></option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Contract Start</label>

                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker" name="contract">
                      </div>
                      <!-- /.input group -->
                    </div>
                  </div>
                  
                  <div class="col-sm-6 form-horizontal">
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Gender Specification</label>
                      <div class="checkbox col-sm-7">
                        <label><input type="checkbox" name="gender[]" value="1">Male</label> &nbsp;
                        <label><input type="checkbox" name="gender[]" value="2">Female</label> 
                      </div> 
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">No. of Employees</label>
                      <div class="col-sm-8">
                        <input type="number" name="numemp" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Salary</label>
                      <div class="col-sm-8">
                        <div class="input-group">
                          <input type="number" name="salary" class="form-control"> 
                          <span class="input-group-addon symbl">Nan</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Height</label>
                      <div class="col-sm-8">
                        <div class="input-group">
                          <input type="number" name="height" class="form-control">
                          <span class="input-group-addon">cm</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Weight</label>
                      <div class="col-sm-8">
                        <div class="input-group">
                          <input type="number" name="weight" class="form-control">
                          <span class="input-group-addon">kg</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                     
                <div class="row">
                  <div class="col-sm-12">
                    <div class="page-header">
                      <h4>Required Skills</h4>
                    </div>
                  </div>
                </div>
                <div class="divskill"></div>
                <div class="row">
                  <div class="col-sm-2 col-sm-offset-5">
                    <button type="button" class="btn btn-success btn-block addskill"><i class="fa fa-plus"></i> ADD</button>
                  </div>
                </div>


                <div class="row">
                  <div class="col-sm-12">
                    <div class="page-header">
                      <h4>Documentary Requirements</h4>
                    </div> 
                  </div>
                </div>
                <div class="divdocreq">
                  <div class="row form-horizontal">
                    <div class="col-sm-10 col-sm-offset-1">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Requirement Name</label>
                        <div class="col-sm-8">
                          <select class="select2 form-control" multiple name="docreq[]" style="width: 100%">
                            @foreach($docreq as $req)
                            <option value="{{$req->REQ_ID }}">{{$req->REQNAME}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div> 
                  </div>
                </div>
                      
                <div class="row">
                  <div class="col-sm-12">
                    <div class="page-header">
                      <h4>Required Fees</h4>
                    </div> 
                  </div>
                </div>
                <div class="divreqfees"></div>
                <div class="row">
                  <div class="col-sm-2 col-sm-offset-5">
                    <button type="button" class="btn btn-success btn-block addfees"><i class="fa fa-plus"></i> ADD</button>
                  </div>
                </div>


              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
        </form>
      </div>
  @endsection

  @section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $('.sidebar-menu .trnsc').trigger('click');
      $('.sidebar-menu .jd').trigger('click');
      $('.sidebar-menu li.jor').addClass('active');

      $('#datepicker').datepicker();

      var skilloption = "";
      var reqoption = "";
      var feeoption = "";
      var symbol = "Nan";

      $('button.addJobOrder').click(function(){
        $('#addJobOrder form').trigger('reset').attr('action','/addJobOrder');
        $('#addJobOrder .divskill').empty();
        $('#addJobOrder .divreqfees').empty();
        $('.select2').select2();
        $('.select2.emplsel').select2({
          placeholder: "Select Employer",
          allowClear: true
        });
        $('.select2.jobsel').select2({
          placeholder: "Select Job",
          allowClear: true
        });
        $('.select2.ctgrysel').select2({
          placeholder: "Select Category",
          allowClear: true
        });
       
      });
      $('#addJobOrder .addskill').click(function(){
        addSkill();
      });
      $('#addJobOrder .addfees').click(function(){
        addFees();
      });
      function addSkill(){
        $('#addJobOrder .divskill').append('<div class="row form-horizontal"><div class="col-sm-5"><div class="form-group"><label class="col-sm-4 control-label">Skill Name</label><div class="col-sm-8"><select class="select2 form-control" name="skills[]" style="width: 100%"><option></option>'+skilloption+'</select></div></div></div><div class="col-sm-5"><div class="form-group"><label class="col-sm-4 control-label">Proficiency</label><div class="col-sm-8"><select class="form-control" name="prof[]"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></div></div></div><div class="col-sm-2"><button type="button" class="btn btn-danger removerow"><i class="fa fa-close"></i></button></div></div></div></div>');

        $('#addJobOrder .divskill .select2').select2({placeholder:'Select Skill'});
      }
      function addFees(){
        $('#addJobOrder .divreqfees').append('<div class="row form-horizontal"><div class="col-sm-5"><div class="form-group"><label class="col-sm-4 control-label">Fee Name</label><div class="col-sm-8"><select class="select2 form-control" name="fee[]" style="width: 100%"><option></option>'+feeoption+'</select></div></div></div><div class="col-sm-5"><div class="form-group"><label class="col-sm-4 control-label">Amount</label><div class="col-sm-8"><div class="input-group"><input type="number" name="amount[]" class="form-control"> <span class="input-group-addon symbl">'+symbol+'</span></div></div></div></div><div class="col-sm-2"><button type="button" class="btn btn-danger removerow"><i class="fa fa-close"></i></button></div></div></div></div>');

        $('#addJobOrder .divreqfees .select2').select2({placeholder:'Select Fee'});
      }
      $(document).on('click','#addJobOrder .removerow',function(){
        $(this).closest('.row').remove();
      });

      $('#addJobOrder .emplsel').change(function(){
        $.ajax
        ({
          url: '/getSymbol',
          type:'get',
          data: { emplid : $(this).val() },
          dataType : 'json',
          success:function(response) {
            $('#addJobOrder .symbl').html(response);
            symbol = response;
          }
        }); 
      });
      $('#addJobOrder .ctgrysel').change(function(){
        $('#addJobOrder .jobsel').empty();
        $('#addJobOrder .jobsel').append('<option></option>');
        $.ajax
        ({
          url: '/getJob',
          type:'get',
          data: { ctgryid : $(this).val() },
          dataType : 'json',
          success:function(response) {
            response.forEach(function(data){
              $('#addJobOrder .jobsel').append('<option value="'+data.JOB_ID+'">'+data.JOBNAME+'</option>');
            });
          }
        }); 
        $('.select2.jobsel').select2({
          placeholder: "Select Job",
          allowClear: true
        });
      });
      $('#addJobOrder .jobsel').change(function(){
        $.ajax
        ({
          url: '/getSkillFee',
          type: 'get',
          data: { jid : $(this).val() },
          dataType : 'json',
          success:function(response) {
            skilloption = "", feeoption = "";
            response[0].forEach(function(data){
              skilloption += '<option value='+data.SKILL_ID+'>'+data.SKILLNAME+'</option>';
            });
            response[1].forEach(function(data){
              feeoption += '<option value='+data.FEE_ID+'>'+data.FEENAME+'</option>';
            });
          }
        }); 
        // console.log(skilloption);
      });

    });
  </script>
  @endsection