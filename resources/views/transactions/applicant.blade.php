@extends('layouts.admin')

@section('title','Applicant')

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
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Position</label>
                      <select class="select2 form-control emplsel" name="" style="width: 100%">
                        <option></option>
                        
                      </select>
                    </div>

                    <div class="form-group">
                  <label>Name</label>

                </div>
                <div class="form-horizontal">
                  <div class="form-group">
                    <label></label>
                    <div class="col-xs-4">
                      <input type="text" class="form-control" placeholder="Last Name" name="">
                    </div>
                    <div class="col-xs-4">
                      <input type="text" class="form-control" placeholder="First Name" name="">
                    </div>
                    <div class="col-xs-4">
                      <input type="text" class="form-control" placeholder="Middle Name" name="">
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
    });
  </script>
  @endsection