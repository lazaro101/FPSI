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
                    <div id="divEduc"></div>

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
                    <div id="divSkills"></div>
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
                        <div id="divEmpHist"></div>
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
                        <div id="divChild"></div>

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
                        <div id="divConper"></div>
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
        $('.addApplicant').click(function(){
            $('#addApplicant form').trigger('reset').attr('action','/addApplicant');
            $('#divEduc, #divEmpHist, #divSkills, #divChild, #divConper').empty();
            addEdbg();
            addEmpHist();
            addSkills();
            addChild();
            addConper();
        });
        $('.addedbg').click(function(){
            addEdbg();
        });
        function addEdbg(){
            $('#divEduc').append('<div class="field"><div class="form-group"> <div class="col-md-2"><label>Name of School</label></div> <div class="col-md-6"><input type="text" class="form-control" name="scname[]"></div> </div><div class="form-group"> <div class="col-md-2"><label>School Level</label></div> <div class="col-md-4"><select class="form-control" name="sclevel[]"> <option value="">Elementary</option><option value="">Secondary</option><option value="">Tertiary</option></select></div><div class="col-md-2"><label>Inclusive Year</label></div> <div class="col-md-4"><div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div><input type="text" class="form-control pull-right incyear" name="incyr[]"></div></div> </div><div class="form-group"> <div class="col-md-2"><label>Degree</label></div><div class="col-md-8"><input type="text" class="form-control" name="degree[]"></div> <div class="col-md-2"><button type="button" class="btn btn-danger remove"><i class="fa fa-remove"></i> Remove</button></div></div></div>');
            $('.incyear').daterangepicker(); 
        } 
        $('.addskills').click(function(){
            addSkills();
        });
        function addSkills(){
            $('#divSkills').append('<div class="field"><div class="form-group"> <div class="col-md-2"><label>Skill Name</label></div><div class="col-md-4"><select class="form-control" name="sklname[]"> <option>Option...</option></select></div><div class="col-md-2"><label>Proficiency</label></div><div class="col-md-2"><select class="form-control" name="prof[]"> <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></div><div class="col-md-2"><button type="button" class="btn btn-danger remove"><i class="fa fa-remove"></i></button></div></div></div>'); 
        }
        $('.addemphist').click(function(){
            addEmpHist();
        });
        function addEmpHist(){
            $('#divEmpHist').append('<div class="field"><div class="form-group"> <div class="col-md-2"><label>Name of Employer</label></div><div class="col-md-4"><input type="text" class="form-control" name="employer[]"></div><div class="col-md-1"><label>Address</label></div><div class="col-md-4"><input type="text" class="form-control" name="empladd[]"></div> </div><div class="form-group"> <div class="col-md-2"><label>Date of Employment</label></div> <div class="col-md-4"><div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div><input type="text" class="form-control pull-right year" name="empldate[]"></div></div> <div class="col-md-1"><label>Position</label></div> <div class="col-md-4"><input type="text" class="form-control" name="ehpos[]"></div> <div class="col-md-1"><button type="button" class="btn btn-danger remove"><i class="fa fa-remove"></i></button></div></div></div>');
            $('#divEmpHist .year').last().daterangepicker({ opens: 'right' }); 
        }
        $('.addchild').click(function(){
            addChild();
        });
        function addChild(){
            $('#divChild').append('<div class="field"><div class="form-group"> <div class="col-md-2"><label>Name</label></div><div class="col-md-4"><input type="text" class="form-control" name="chrnname"></div><div class="col-md-1"><label>Birthdate</label></div><div class="col-md-4"><div class="input-group date"><div class="input-group-addon"><i class="fa fa-calendar"></i></div><input type="text" class="form-control pull-right datepicker" name="chrnbday"></div></div> <div class="col-md-1"><button type="button" class="btn btn-danger remove"><i class="fa fa-remove"></i></button></div></div></div>');
            $('#divChild .datepicker').last().datepicker({ startView: 2 }); 
        }
        $('.addconper').click(function(){
            addConper();
        });
        function addConper(){
            $('#divConper').append('<div class="field"><div class="form-group"> <div class="col-md-2"><label>Name</label></div><div class="col-md-4"><input type="text" class="form-control" name="emrname"></div><div class="col-md-2"><label>Contact Number</label></div><div class="col-md-3"><input type="text" class="form-control" name="emrcontact"></div> <div class="col-md-1"><button type="button" class="btn btn-danger remove"><i class="fa fa-remove"></i></button></div></div></div>'); 
        }

        $(document).on('click','#addApplicant .remove',function(){
            $(this).closest('.field').remove();
        });

    });
  </script>
  @endsection