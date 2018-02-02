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
        <form method="post" action="/editFees">
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
                      <input type="text" class="form-control" name="employer">
                    </div>
                    <div class="form-group">
                      <label>Job Category</label> 
                      <select class="select2 form-control" name="jobcat" style="width: 100%">
                        @foreach($jobcat as $cat)
                        <option value="{{$cat->CATEGORY_ID}}">{{$cat->CATEGORYNAME}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Job Name</label> 
                      <select class="select2 form-control" name="jobname" style="width: 100%">
                        @foreach($jobs as $job)
                        <option value="{{$job->JOB_ID}}">{{$job->JOBNAME}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Contract Start</label>

                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker">
                      </div>
                      <!-- /.input group -->
                    </div>
                  </div>

                  <div class="col-sm-6 form-horizontal">
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Gender Specification</label>
                      <div class="radio col-sm-7">
                        <label><input type="radio" name="gender">Male</label> 
                        <label><input type="radio" name="gender">Female</label> 
                      </div> 
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">No. of Employees</label>
                      <div class="col-sm-8">
                        <input type="number" name="" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Salary</label>
                      <div class="col-sm-8">
                        <input type="number" name="" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Height</label>
                      <div class="col-sm-8">
                        <div class="input-group">
                          <input type="number" name="" class="form-control">
                          <span class="input-group-addon">cm</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Weight</label>
                      <div class="col-sm-8">
                        <div class="input-group">
                          <input type="number" name="" class="form-control">
                          <span class="input-group-addon">lb</span>
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
                          <select class="select2 form-control" multiple name="skills[]" style="width: 100%">
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
      $('.sidebar-menu li.jor').addClass('active');

      var skilloption = "";
      var reqoption = "";
      var feeoption = "";
      $.ajax
        ({
          url: '/getAllSkills',
          type:'get',
          dataType : 'json',
          success:function(response) {
            response.forEach(function(data){
              skilloption += '<option value='+data.SKILL_ID+'>'+data.SKILLNAME+'</option>';
            });
          }
        });
      $.ajax
        ({
          url: '/getAllReq',
          type:'get',
          dataType : 'json',
          success:function(response) {
            response.forEach(function(data){
              reqoption += '<option value='+data.REQ_ID+'>'+data.REQNAME+'</option>';
            });
          }
        });
      $.ajax
        ({
          url: '/getAllFees',
          type:'get',
          dataType : 'json',
          success:function(response) {
            response.forEach(function(data){
              feeoption += '<option value='+data.FEE_ID+'>'+data.FEENAME+'</option>';
            });
          }
        });

      $('.select2').select2();
      $('#datepicker').datepicker();

      $('button.addJobOrder').click(function(){
        $('#addJobOrder .divskill').empty();
        $('#addJobOrder .divreqfees').empty();
        // addReq();
        addSkill();
        addFees();
      });
      $('#addJobOrder .addskill').click(function(){
        addSkill();
      });
      $('#addJobOrder .addfees').click(function(){
        addFees();
      });
      // $('#addJobOrder .addreq').click(function(){
      //   addReq();
      // });
      // function addReq(){
      //   $('#addJobOrder .divdocreq').append('<div class="row form-horizontal"><div class="col-sm-8 col-sm-offset-1"><div class="form-group"><label class="col-sm-4 control-label">Requirement Name</label><div class="col-sm-8"><select class="select2 form-control" multiple name="skills[]" style="width: 100%">'+reqoption+'</select></div></div></div><div class="col-sm-2"><button type="button" class="btn btn-danger removeskill"><i class="fa fa-close"></i></button></div></div></div></div>');
        
      //   $('#addJobOrder .divdocreq .select2').select2();
      // }
      function addSkill(){
        $('#addJobOrder .divskill').append('<div class="row form-horizontal"><div class="col-sm-5"><div class="form-group"><label class="col-sm-4 control-label">Skill Name</label><div class="col-sm-8"><select class="select2 form-control" name="skills[]" style="width: 100%">'+skilloption+'</select></div></div></div><div class="col-sm-5"><div class="form-group"><label class="col-sm-4 control-label">Proficiency</label><div class="col-sm-8"><input type="text" class="form-control" name="profs[]"></div></div></div><div class="col-sm-2"><button type="button" class="btn btn-danger removeskill"><i class="fa fa-close"></i></button></div></div></div></div>');

        $('#addJobOrder .divskill .select2').select2();
      }
      function addFees(){
        $('#addJobOrder .divreqfees').append('<div class="row form-horizontal"><div class="col-sm-5"><div class="form-group"><label class="col-sm-4 control-label">Fee Name</label><div class="col-sm-8"><select class="select2 form-control" name="fee[]" style="width: 100%">'+feeoption+'</select></div></div></div><div class="col-sm-5"><div class="form-group"><label class="col-sm-4 control-label">Amount</label><div class="col-sm-8"><input type="number" class="form-control" name="amount[]"></div></div></div><div class="col-sm-2"><button type="button" class="btn btn-danger removeskill"><i class="fa fa-close"></i></button></div></div></div></div>');

        $('#addJobOrder .divreqfees .select2').select2();
      }
      $(document).on('click','#addJobOrder .removeskill',function(){
        $(this).closest('.row').remove();
      });

    });
  </script>
  @endsection