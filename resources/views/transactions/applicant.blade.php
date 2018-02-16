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
                                <input type="text" class="form-control pull-right daterange" id="incyear">
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
                                    <input type="text" class="form-control pull-right daterange" id="empldate">
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

  @endsection

  @section('script')
  <script type="text/javascript">
    $(document).ready(function(){
        $('.sidebar-menu .trnsc').trigger('click');
        $('.sidebar-menu .jd').trigger('click');
        $('.sidebar-menu li.app').addClass('active');
 
        $('.datepicker').datepicker({
            startView: 2,
            maxViewMode: 2, 
            defaultViewDate: { year: new Date().getFullYear()-20, month: 01, day: 01}
        });
        $('#reservation').daterangepicker(); 
        $('.daterange').daterangepicker(); 
    // Date range picker with time picker
    // $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' });
    // //Date range as a button
    // $('#daterange-btn').daterangepicker(
    //   {
    //     ranges   : {
    //       'Today'       : [moment(), moment()],
    //       'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
    //       'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
    //       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
    //       'This Month'  : [moment().startOf('month'), moment().endOf('month')],
    //       'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    //     },
    //     startDate: moment().subtract(29, 'days'),
    //     endDate  : moment()
    //   },
    //   function (start, end) {
    //     $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    //   }
    // );
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
        });
        // function addEmpHist(){
        //     $('#divEmpHist').append('<div class="field"></div>');
        //     $('#divEmpHist .year').last().daterangepicker({ opens: 'right' }); 
        // } 
        $(document).on('click','#addApplicant .remove',function(){
            $(this).closest('tr').remove();
        });

    });
  </script>
  @endsection