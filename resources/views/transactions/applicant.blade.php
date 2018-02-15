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
              <button class="btn btn-primary" data-toggle="modal" data-target="#addApplicant" style="padding: 10px; width: 150px;"><strong>NEW APPLICANT</strong>  <span class="fa fa-plus"></span></button>
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
        <form method="post" action="">
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
                <div class="row">
                    <div class="col-md-1">
                        <label>Position</label>
                    </div> 
                    <div class="col-md-4">
                        <select class="form-control">
                            <option>Option...</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-1">
                        <label>Name</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="" placeholder="Last Name">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="" placeholder="First Name">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="" placeholder="Middle Name">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-1">
                        <label>Gender</label>
                    </div>
                    <div class="col-md-4">
                        <label><input type="radio" name="gender"> Male</label>
                        <label><input type="radio" name="gender"> Female</label>
                    </div>
                    <div class="col-md-2">
                        <label>Civil Status</label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control">
                            <option>Option...</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-1">
                        <label>Age</label>
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" name="">
                    </div>
                    <div class="col-md-1">
                        <label>Birthdate</label>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker">
                      </div>
                    </div>
                    <div class="col-md-1">
                        <label>Height</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" placeholder="cm" name="">
                    </div>
                    <div class="col-md-1">
                        <label>Weight</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" placeholder="kg" name="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label>Contact Number</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label>City Address</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label>Provincial Address / Birthplace</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="">
                    </div>
                </div>
            </div>
        </div>
    </div>

      <div class="panel panel-primary">
        <div class="panel-heading">
            EDUCATIONAL BACKGROUND
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label>Name of School</label>
                    </div>
                    
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label>School Level</label>
                    </div>
                    
                    <div class="col-md-4">
                        <select class="form-control">
                            <option>Option...</option>
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
                        <input type="text" class="form-control pull-right" id="reservation">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label>Degree</label>
                    </div>
                    
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2 col-sm-offset-5">
                    <button type="button" class="btn btn-success"><i class="fa fa-plus"></i> ADD</button>
                  </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            SKILLS
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label>Skill Name</label>
                    </div>
                    
                    <div class="col-md-4">
                        <select class="form-control">
                            <option>Option...</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label>Proficiency</label>
                    </div>
                    
                    <div class="col-md-2">
                        <select class="form-control">
                            <option>Option...</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2 col-sm-offset-5">
                    <button type="button" class="btn btn-success"><i class="fa fa-plus"></i> ADD</button>
                  </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            EMPLOYMENT HISTORY (MOST RECENT POSITION FIRST)
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label>Name of Employer</label>
                    </div>
                    
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="">
                    </div>


                    <div class="col-md-1">
                        <label>Address</label>
                    </div>
                    
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label>Date of Employment</label>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="input-group">
                            <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                            </div>
                        <input type="text" class="form-control pull-right" id="reservation">
                        </div>
                    </div>

                    <div class="col-md-1">
                        <label>Position</label>
                    </div>
                    
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2 col-sm-offset-5">
                    <button type="button" class="btn btn-success"><i class="fa fa-plus"></i> ADD</button>
                  </div>
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
                <div class="row">
                    <div class="col-md-2">
                        <label>Father's Name</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="">
                    </div>

                    <div class="col-md-1">
                        <label>Age</label>
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" name="">
                    </div>

                    <div class="col-md-2">
                        <label>Occupation</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label>Mother's Name</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="">
                    </div>

                    <div class="col-md-1">
                        <label>Age</label>
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" name="">
                    </div>

                    <div class="col-md-2">
                        <label>Occupation</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label>Spouse Name</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="">
                    </div>

                    <div class="col-md-1">
                        <label>Age</label>
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" name="">
                    </div>

                    <div class="col-md-2">
                        <label>Occupation</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label>Children (From eldest to youngest)</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-1">
                        <label>Name</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="">
                    </div>

                    <div class="col-md-1">
                        <label>Age</label>
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" name="">
                    </div>

                    <div class="col-md-2">
                        <label>Birthdate</label>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker">
                      </div>
                    </div> 
                </div>

            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2 col-sm-offset-5">
                    <button type="button" class="btn btn-success"><i class="fa fa-plus"></i> ADD</button>

                  </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            PERSONS TO BE CONTACTED IN CASE OF EMERGENCY
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label>Name</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="">
                    </div>

                    <div class="col-md-2">
                        <label>Contact Number</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2 col-sm-offset-5">
                    <button type="button" class="btn btn-success"><i class="fa fa-plus"></i> ADD</button>
                  </div>
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

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )
    });
  </script>
  @endsection