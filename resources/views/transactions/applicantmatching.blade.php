@extends('layouts.admin')

@section('title','Applicant Matching')

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
              <h3 class="box-title">Applicant Matching</h3>
            </div>

            

            <div class="box-body">
              <div class="form-horizontal">
                  <div class="form-group">
                    
                    <div class="col-xs-4">
                      <label>Employer</label>
                    <select class="form-control" placeholder="Input something.." name="">
                      <option value="">1</option>
                      <option value="">2</option>
                      <option value="">3</option>
                    </select>
                    </div>
                    <div class="col-xs-4">
                    <label>Job Name</label>
                    <select class="form-control" placeholder="Input something.." name="">
                      <option value="">1</option>
                      <option value="">2</option>
                      <option value="">3</option>
                    </select>
                    </div>

                    <div class="col-xs-4">
                    <button class="btn btn-primary" style="padding: 7px; width: 80px;"><strong>FILTER</strong><span class="fa fa-filter"></span></button>
                    </div>
                  </div> 
            </div>

              <div class="content">
                <table class="table table-hover" id="example1">
                  <thead>
                    <tr>
                      <th>Applicant Name</th>
                      <th>Match Percentage</th>
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

  @endsection

  @section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $('.sidebar-menu .trnsc').trigger('click');
      $('.sidebar-menu .jd').trigger('click');
      $('.sidebar-menu li.appmat').addClass('active');
    });
  </script>
  @endsection