@extends('layouts.admin')

@section('title','Job')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Maintenance
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
              <h3 class="box-title">Job</h3>
            </div>
            <div class="box-body">
              <button class="btn btn-primary" data-toggle="modal" data-target="#addJob" style="padding: 10px; width: 100px;"><strong>ADD</strong>  <span class="fa fa-plus"></span></button>
              <div class="content">
                <table class="table table-hover" id="example1">
                  <thead>
                    <tr>
                      <th>Job Category</th>
                      <th>Job</th>
                      <th>Job Type</th>
                      <th>No. of Required Skills</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div> 
          </div>
        </div>
      </div>

  <!-- modal -->
      <div class="modal fade" id="addJob">
        <form method="post" action="/addJob">
          {{csrf_field()}}
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Job</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Job Category</label>
                  <select class="form-control" placeholder="Input something.." name="">
                    <option value="1">Item 1</option>
                    <option value="1">Item 1</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Job Name</label>
                  <input type="text" class="form-control" name="">
                </div>
                <div class="form-group">
                  <label>Job Type</label>
                  <select class="form-control" placeholder="Input something.." name="">
                    <option value="1">Item 1</option>
                    <option value="1">Item 1</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Skills</label><br>
                  
                  <input type="Checkbox"  name=""> Skill 1 <br>
                  <input type="Checkbox"  name=""> Skill 2 <br>
                  <input type="Checkbox"  name=""> Skill 3 <br>
                  <input type="Checkbox"  name=""> Skill 4 <br>
                  <input type="Checkbox"  name=""> Skill 5
                       
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

    </section>

  </div>


@endsection

  @section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $('.sidebar-menu .mntc').trigger('click');
      $('.sidebar-menu li.cnc').addClass('active'); 
    });
  </script>
  @endsection