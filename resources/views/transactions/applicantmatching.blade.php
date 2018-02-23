@extends('layouts.admin')

@section('title','Applicant Matching')

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
              <h3 class="box-title">Applicant Matching</h3>
            </div>

            

            <div class="box-body">
              <div class="row">
                <div class="form-group">
                  <div class="col-xs-4">
                    <label>Employer</label>
                    <select class="form-control select2" placeholder="Input something.." name="">
                      <option></option> 
                      @foreach($employer as $emp)
                      <option value="{{$emp->EMPLOYER_ID}}">{{$emp->EMPLOYERNAME}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-xs-4">
                    <label>Job Name</label>
                    <select class="form-control select2" placeholder="Input something.." name="">
                      <option></option>
                      @foreach($job as $job)
                      <option value="{{$job->JOB_ID}}">{{$job->JOBNAME}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-xs-2">
                    <label>&nbsp;</label> 
                    <button class="btn btn-primary form-control"><strong>FILTER</strong><span class="fa fa-filter"></span></button>
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
      $('.sidebar-menu .am').trigger('click');
      $('.sidebar-menu li.appmat').addClass('active');
      $('.select2').select2({placeholder:'Select...'});
    });
  </script>
  @endsection