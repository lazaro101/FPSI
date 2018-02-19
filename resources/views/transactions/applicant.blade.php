@extends('layouts.admin')

@section('title','Applicant')

@section('content')

  <div class="content-wrapper"> 
    <section class="content-header">
      <h1>
        Transactions 
      </h1> 
    </section>

    <section class="content">
      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Applicant</h3>
            </div>
            <div class="box-body">
              <button class="btn btn-primary addApplicant" data-toggle="modal" data-target="#addApplicant" style="padding: 10px; width: 150px;"><strong>NEW APPLICANT</strong>  <span class="fa fa-plus"></span></button>
              <div class="content">
                <table class="table table-hover" id="example1">
                  <thead>
                    <tr>
                      <th>Applicant Name</th>
                      <th>Position</th>
                      <th width="100px">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($app as $app)
                      <tr>
                          <td>{{$app->FNAME.' '.$app->MNAME.' '.$app->LNAME}}</td>
                          <td>{{$app->POSITION}}</td>
                          <td>
                              <button type="button" class="btn btn-info edit" value="{{$app->APP_ID}}"><i class="fa fa-pencil"></i></button>
                              <button type="button" class="btn btn-danger del" value="{{$app->APP_ID}}"><i class="fa fa-trash"></i></button>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div> 
          </div>
        </div>
      </div>

    </section>

  </div>

    <div class="modal fade bs-example-modal-lg" id="addApplicant">
        <form method="post" class="form-horizontal">
          {{csrf_field()}}
          <input type="hidden" name="id">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">New Applicant</h4>
              </div>
              <div class="modal-body">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        PERSONAL DATA
                    </div>
                    <div class="panel-body">
                        <div class="form-group"> 
                            <div class="col-md-2">
                                <label>Position</label>
                            </div> 
                            <div class="col-md-4">
                                <select class="form-control" name="position"> 
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="col-md-2">
                                <label>Name</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="lname" placeholder="Last Name">
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="fname" placeholder="First Name">
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="mname" placeholder="Middle Name">
                            </div> 
                        </div>
                        <div class="form-group"> 
                            <div class="col-md-2">
                                <label>Gender</label>
                            </div>
                            <div class="col-md-3">
                                <label><input type="radio" name="gender" value="Male"> Male</label>&nbsp;
                                <label><input type="radio" name="gender" value="Female"> Female</label>
                            </div>
                            <div class="col-md-2">
                                <label>Civil Status</label>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="civilstatus"> 
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Divorced">Divorced</option>
                                </select>
                            </div> 
                        </div>
                        <div class="form-group"> 
                            <div class="col-md-2">
                                <label>Birthdate</label>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right datepicker" name="birthdate">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <label>Height</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" placeholder="cm" name="height">
                            </div>
                            <div class="col-md-1">
                                <label>Weight</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" placeholder="kg" name="weight">
                            </div> 
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                <label>Contact Number</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="cnum">
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="col-md-2">
                                <label>City Address</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="cadd">
                            </div> 
                        </div>
                        <div class="form-group"> 
                            <div class="col-md-2">
                                <label>Provincial Address / Birthplace</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="padd">
                            </div> 
                        </div>
                    </div>
                </div>

              <div class="panel panel-primary">
                <div class="panel-heading">
                    EDUCATIONAL BACKGROUND
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-condensed">
                                <thead>
                                    <th style="display: none">DATA</th>
                                    <th style="width: 30%">Name of School</th>
                                    <th style="width: 20%">School Level</th>
                                    <th style="width: 20%">Inclusive Year</th>
                                    <th style="width: 20%">Degree</th>
                                    <th style="width: 10%">Action</th>
                                </thead>
                                <tbody id="listEdu"></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-md-2">
                            <label>Name of School</label>
                        </div> 
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="school">
                        </div> 
                    </div>
                    <div class="form-group"> 
                        <div class="col-md-2">
                            <label>School Level</label>
                        </div> 
                        <div class="col-md-4">
                            <select class="form-control" id="level"> 
                                <option value="Elementary">Elementary</option>
                                <option value="Secondary">Secondary</option>
                                <option value="Tertiary">Tertiary</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Inclusive Year</label>
                        </div> 
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" id="incyear">
                            </div> 
                        </div>  
                    </div>
                    <div class="form-group"> 
                        <div class="col-md-2">
                            <label>Degree</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="degree">
                        </div>
                    </div>

                    <div class="form-group"> 
                        <div class="col-sm-2 col-sm-offset-5">
                            <button type="button" class="btn btn-success addedbg"><i class="fa fa-plus"></i> ADD</button>
                        </div> 
                    </div>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    SKILLS
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-condensed">
                                <thead>
                                    <th style="display: none;">ID</th>
                                    <th style="width: 50%">Skill</th>
                                    <th style="width: 30%">Proficiency</th>
                                    <th style="width: 20%">Action</th>
                                </thead>
                                <tbody id="listSkills"> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-md-2">
                            <label>Skill Name</label>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control" id="sklname">
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Proficiency</label>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" id="prof"> 
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-sm-2 col-sm-offset-5">
                            <button type="button" class="btn btn-success addskills"><i class="fa fa-plus"></i> ADD</button>
                        </div> 
                    </div>
                </div>
            </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        EMPLOYMENT HISTORY (MOST RECENT POSITION FIRST)
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-condensed">
                                    <thead>
                                        <th style="display: none"></th>
                                        <th style="width: 30%">Employer Name</th>
                                        <th style="width: 30%">Address</th>
                                        <th style="width: 20%">Employment Date</th>
                                        <th style="width: 10%">Position</th>
                                        <th style="width: 10%">Action</th>
                                    </thead>
                                    <tbody id="listEmphist"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="col-md-2">
                                <label>Name of Employer</label>
                            </div><div class="col-md-4">
                                <input type="text" class="form-control" id="empl">
                            </div>
                            <div class="col-md-1">
                                <label>Address</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="empladd">
                            </div> 
                        </div>
                        <div class="form-group"> 
                            <div class="col-md-2">
                                <label>Date of Employment</label>
                            </div> 
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control" id="empldate">
                                </div>
                            </div> 
                            <div class="col-md-1">
                                <label>Position</label>
                            </div> 
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="emplpos">
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="col-sm-2 col-sm-offset-5">
                                <button type="button" class="btn btn-success addemphist"><i class="fa fa-plus"></i> ADD</button>
                            </div> 
                        </div>
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        FAMILY BACKGROUND
                    </div>
                    <div class="panel-body">
                        <div class="form-group"> 
                            <div class="col-md-2">
                                <label>Father's Name</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="fathername">
                            </div>

                            <div class="col-md-1">
                                <label>Age</label>
                            </div>
                            <div class="col-md-1">
                                <input type="text" class="form-control" name="fatherage">
                            </div>

                            <div class="col-md-2">
                                <label>Occupation</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="fatheroccu">
                            </div> 
                        </div>

                        <div class="form-group"> 
                            <div class="col-md-2">
                                <label>Mother's Name</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="mothername">
                            </div>

                            <div class="col-md-1">
                                <label>Age</label>
                            </div>
                            <div class="col-md-1">
                                <input type="text" class="form-control" name="motherage">
                            </div>

                            <div class="col-md-2">
                                <label>Occupation</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="motheroccu">
                            </div> 
                        </div>

                        <div class="form-group"> 
                            <div class="col-md-2">
                                <label>Spouse Name</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="spousename">
                            </div>

                            <div class="col-md-1">
                                <label>Age</label>
                            </div>
                            <div class="col-md-1">
                                <input type="text" class="form-control" name="spouseage">
                            </div>

                            <div class="col-md-2">
                                <label>Occupation</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="spouseoccu">
                            </div> 
                        </div>

                        <div class="form-group"> 
                            <div class="col-md-4">
                                <label>Children (From eldest to youngest)</label>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-condensed">
                                    <thead>
                                        <th style="display: none;">DATA</th>
                                        <th style="width: 40%">Name</th>
                                        <th style="width: 40%">Birthdate</th>
                                        <th style="width: 20%">Action</th>
                                    </thead>
                                    <tbody id="listChild"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="col-md-2">
                                <label>Name</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="chrnname">
                            </div>
                            <div class="col-md-1">
                                <label>Birthdate</label>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right datepicker" id="chrnbday">
                                </div>
                            </div> 
                        </div>

                        <div class="form-group"> 
                            <div class="col-sm-2 col-sm-offset-5">
                                <button type="button" class="btn btn-success addchild"><i class="fa fa-plus"></i> ADD</button>

                            </div> 
                        </div>
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        PERSONS TO BE CONTACTED IN CASE OF EMERGENCY
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-condensed">
                                    <thead>
                                        <th style="display: none"></th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody id="listConper"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="col-md-2">
                                <label>Name</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="emrname">
                            </div>
                            <div class="col-md-2">
                                <label>Contact Number</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="emrcontact">
                            </div> 
                        </div>
                        <div class="form-group"> 
                            <div class="col-sm-2 col-sm-offset-5">
                                <button type="button" class="btn btn-success addconper"><i class="fa fa-plus"></i> ADD</button>
                            </div> 
                        </div>
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

      <div class="modal modal-warning fade in" id="del">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Delete</h4>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete?</p>
            </div>
            <div class="modal-footer">
              <form method="post" action="/delApplicant">
                {{csrf_field()}}
                <input type="hidden" name="id">
                <button type="submit" class="btn btn-outline">Yes</button>
                <button type="button" class="btn btn-outline" data-dismiss="modal">No</button>
              </form>
            </div>
          </div> 
        </div> 
      </div>
  @endsection

  @section('script')
  <script type="text/javascript">
    $(document).ready(function(){
        $('.sidebar-menu .trnsc').trigger('click');
        $('.sidebar-menu .am').trigger('click');
        $('.sidebar-menu li.app').addClass('active');
 
        $('.datepicker').datepicker({
            startView: 2,
            maxViewMode: 2, 
            defaultViewDate: { year: new Date().getFullYear()-20, month: 01, day: 01}
        });
        $('#reservation').daterangepicker(); 
        $('.daterange').daterangepicker(); 
 
        $('#incyear').inputmask({"mask": "9999 - 9999"});
        $('#empldate').inputmask({"mask": "99/9999 - 99/9999"});
        // $('input[name=cnum]').inputmask({"mask": "9999-999-9999"});

        $.ajax
        ({
          url: '/getSkillGeneralAll',
          type:'get', 
          dataType : 'json',
          success:function(response) {
            response.forEach(function(data){
                $('#sklname').append('<option value="'+data.SKILL_ID+'">'+data.SKILLNAME+'</option>');
            }); 
          }
        }); 

        $('.edit').click(function(){
            $('#addApplicant form').trigger('reset').attr('action','/editApplicant');
            $('#listEdu, #listEmphist, #listSkills, #listChild, #listConper').empty();
            $.ajax
            ({
              url: '/getApplicant',
              type:'get', 
              data: { id : $(this).val() },
              dataType : 'json',
              success:function(response) {
                $('input[name=id]').val(response[0].APP_ID);
                $('select[name=position]').val(response[0].POSITION).trigger('change');
                $('input[name=fname]').val(response[0].FNAME);
                $('input[name=lname]').val(response[0].LNAME); 
                $('input[name=mname]').val(response[0].MNAME);
                $('input[name=gender][value='+response[0].GENDER+']').prop("checked", true);
                $('input[name=height]').val(response[0].AHEIGHT);
                $('input[name=weight]').val(response[0].AWEIGHT);
                $('input[name=cnum]').val(response[0].CONTACT);
                // $('input[name=cadd]').val(response[1].MNAME);
                // $('input[name=padd]').val(response[1].MNAME);
                $('input[name=fathername]').val(response[6].NAMEOFFATHER);
                $('input[name=fatheroccu]').val(response[6].FOCCUPATION);
                $('input[name=fatherage]').val(response[6].FAGE);
                $('input[name=mothername]').val(response[6].NAMEOFMOTHER);
                $('input[name=motheroccu]').val(response[6].MOCCUPATION);
                $('input[name=motherage]').val(response[6].MAGE);
                $('input[name=spouseoccu]').val(response[6].SOCCUPATION);
                $('input[name=spousename]').val(response[6].NAMEOFSPOUSE);
                $('input[name=spouseage]').val(response[6].SAGE);
                response[1].forEach(function(data){
                    var row = "<tr>"+
                        "<td style='display: none;'>"+
                            '<input type="hidden" name="schname[]" value="'+data.SCHOOLNAME+'"><input type="hidden" name="schlevel[]" value="'+data.SCHOOLNAME+'"><input type="hidden" name="schyear[]" value="'+data.YRSTART+' - '+data.YREND+'"><input type="hidden" name="schdegree[]" value="'+data.DEGREE+'">'
                        +"</td>"+
                        "<td>"+data.SCHOOLNAME+"</td>"+
                        "<td>"+data.SCHOOLTYPE+"</td>"+
                        "<td>"+data.YRSTART+' - '+data.YREND+"</td>"+
                        "<td>"+data.DEGREE+"</td>"+
                        "<td style='text-align: center;'><button type='button' class='btn btn-danger btn-xs remove'><i class='fa fa-remove'></i></button></td>"+
                    "</tr>";
                    $('#listEdu').append(row);
                });
                response[2].forEach(function(data){
                    var row = 
                    "<tr>"+
                        "<td style='display: none;'><input type='hidden' name='sklname[]' value='"+data.SKILL_ID+"'><input type='hidden' name='prof[]' value='"+data.PROFICIENCY+"'></td>"+
                        "<td>"+data.SKILLNAME+"</td>"+
                        "<td>"+data.PROFICIENCY+"</td>"+
                        "<td style='text-align: center;'><button type='button' class='btn btn-danger btn-xs remove'><i class='fa fa-remove'></i></button></td>"+
                    "</tr>";
                    $('#listSkills').append(row);
                });
                response[3].forEach(function(data){
                    var row = 
                    "<tr>"+
                        "<td style='display: none;'>"+
                            '<input type="hidden" name="employer[]" value="'+data.COMPANY+'"><input type="hidden" name="empladd[]" value="'+data.COMPANYADD+'"><input type="hidden" name="empldate[]" value="'+data.MONTHSTART+'/'+data.YEARSTART+' - '+data.MONTHEND+'/'+data.YEAREND+'"><input type="hidden" name="emplpos[]" value="'+data.POSITION+'">'
                        +"</td>"+
                        "<td>"+data.COMPANY+"</td>"+
                        "<td>"+data.COMPANYADD+"</td>"+
                        "<td>"+data.MONTHSTART+'/'+data.YEARSTART+' - '+data.MONTHEND+'/'+data.YEAREND+"</td>"+
                        "<td>"+data.POSITION+"</td>"+
                        "<td style='text-align: center;'><button type='button' class='btn btn-danger btn-xs remove'><i class='fa fa-remove'></i></button></td>"+
                    "</tr>";
                    $('#listEmphist').append(row);
                }); 
                response[4].forEach(function(data){
                    var row = 
                    "<tr>"+
                        "<td style='display: none;'>"+
                            '<input type="hidden" name="chrnname[]" value="'+data.CHILDNAME+'"><input type="hidden" name="chrnbday[]" value="'+data.BIRTHDATE+'">'
                        +"</td>"+
                        "<td>"+data.CHILDNAME+"</td>"+
                        "<td>"+moment(data.BIRTHDATE).format("MM/DD/YYYY")+"</td>"+
                        "<td style='text-align: center;'><button type='button' class='btn btn-danger btn-xs remove'><i class='fa fa-remove'></i></button></td>"+
                    "</tr>";
                    $('#listChild').append(row);
                });
                response[5].forEach(function(data){
                    var row = 
                    "<tr>"+
                        "<td style='display: none;'>"+
                            '<input type="hidden" name="emrname[]" value="'+data.CONTACTNAME+'"><input type="hidden" name="emrcontact[]" value="'+data.CONTACTNUM+'">'
                        +"</td>"+
                        "<td>"+data.CONTACTNAME+"</td>"+
                        "<td>"+data.CONTACTNUM+"</td>"+
                        "<td style='text-align: center;'><button type='button' class='btn btn-danger btn-xs remove'><i class='fa fa-remove'></i></button></td>"+
                    "</tr>";
                    $('#listConper').append(row);
                });
              },
              complete:function(){
                $('#addApplicant').modal();
              }
            }); 

        });
          $('.del').click(function(){
            $('#del form input[name=id]').val($(this).val());
            $('#del').modal();
          });
        $('.addApplicant').click(function(){
            $('#addApplicant form').trigger('reset').attr('action','/addApplicant');
            $('#listEdu, #listEmphist, #listSkills, #listChild, #listConper').empty();
        });

        $('.addskills').click(function(){
            var row = 
            "<tr>"+
                "<td style='display: none;'><input type='hidden' name='sklname[]' value='"+$('#sklname').val()+"'><input type='hidden' name='prof[]' value='"+$('#prof').val()+"'></td>"+
                "<td>"+$('#sklname').children('option:selected').text()+"</td>"+
                "<td>"+$('#prof').val()+"</td>"+
                "<td style='text-align: center;'><button type='button' class='btn btn-danger btn-xs remove'><i class='fa fa-remove'></i></button></td>"+
            "</tr>";
            $('#listSkills').append(row);
            $('#sklname, #prof').val('');
        });
        $('.addedbg').click(function(){
            var row = 
            "<tr>"+
                "<td style='display: none;'>"+
                    '<input type="hidden" name="schname[]" value="'+$('#school').val()+'"><input type="hidden" name="schlevel[]" value="'+$('#level').val()+'"><input type="hidden" name="schyear[]" value="'+$('#incyear').val()+'"><input type="hidden" name="schdegree[]" value="'+$('#degree').val()+'">'
                +"</td>"+
                "<td>"+$('#school').val()+"</td>"+
                "<td>"+$('#level').val()+"</td>"+
                "<td>"+$('#incyear').val()+"</td>"+
                "<td>"+$('#degree').val()+"</td>"+
                "<td style='text-align: center;'><button type='button' class='btn btn-danger btn-xs remove'><i class='fa fa-remove'></i></button></td>"+
            "</tr>";
            $('#listEdu').append(row);
            $('#school, #degree, #incyear, #level').val('');
        }); 
        $('.addemphist').click(function(){
            var row = 
            "<tr>"+
                "<td style='display: none;'>"+
                    '<input type="hidden" name="employer[]" value="'+$('#empl').val()+'"><input type="hidden" name="empladd[]" value="'+$('#empladd').val()+'"><input type="hidden" name="empldate[]" value="'+$('#empldate').val()+'"><input type="hidden" name="emplpos[]" value="'+$('#emplpos').val()+'">'
                +"</td>"+
                "<td>"+$('#empl').val()+"</td>"+
                "<td>"+$('#empladd').val()+"</td>"+
                "<td>"+$('#empldate').val()+"</td>"+
                "<td>"+$('#emplpos').val()+"</td>"+
                "<td style='text-align: center;'><button type='button' class='btn btn-danger btn-xs remove'><i class='fa fa-remove'></i></button></td>"+
            "</tr>";
            $('#listEmphist').append(row);
            $('#empl, #empladd, #empldate, #emplpos').val('');
        });
        $('.addchild').click(function(){
            var row = 
            "<tr>"+
                "<td style='display: none;'>"+
                    '<input type="hidden" name="chrnname[]" value="'+$('#chrnname').val()+'"><input type="hidden" name="chrnbday[]" value="'+$('#chrnbday').val()+'">'
                +"</td>"+
                "<td>"+$('#chrnname').val()+"</td>"+
                "<td>"+$('#chrnbday').val()+"</td>"+
                "<td style='text-align: center;'><button type='button' class='btn btn-danger btn-xs remove'><i class='fa fa-remove'></i></button></td>"+
            "</tr>";
            $('#listChild').append(row);
            $('#chrnname').val('');
            $('#chrnbday').datepicker('setDate',null);
        });
        $('.addconper').click(function(){
            var row = 
            "<tr>"+
                "<td style='display: none;'>"+
                    '<input type="hidden" name="emrname[]" value="'+$('#emrname').val()+'"><input type="hidden" name="emrcontact[]" value="'+$('#emrcontact').val()+'">'
                +"</td>"+
                "<td>"+$('#emrname').val()+"</td>"+
                "<td>"+$('#emrcontact').val()+"</td>"+
                "<td style='text-align: center;'><button type='button' class='btn btn-danger btn-xs remove'><i class='fa fa-remove'></i></button></td>"+
            "</tr>";
            $('#listConper').append(row);
            $('#emrname, #emrcontact').val('');
        });

        $(document).on('click','#addApplicant .remove',function(){
            $(this).closest('tr').remove();
        });

    });
  </script>
  @endsection