@extends('layouts.admin')

@section('title','Employer')

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
              <h3 class="box-title">Employer</h3>
            </div>
            <div class="box-body">
              <button class="btn btn-primary" data-toggle="modal" data-target="#addFees" style="padding: 10px; width: 100px;"><strong>NEW</strong>  <span class="fa fa-plus"></span></button>
              <div class="content">
                <table class="table table-hover" id="example1">
                  <thead>
                    <tr>
                      <th>Employer</th>
                      <th>Country</th>
                      <th>Foreign Principal</th>
                      <th width="100px">Actions</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div> 
          </div>
        </div>
      </div>
         
      <!-- /.box -->

  <!-- modal -->
      <div class="modal fade" id="addFees">
        <form method="post" action="/addFees">
          {{csrf_field()}}
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">New Employer</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Employer</label>
                  <input type="text" class="form-control" name="">
                </div>
                <div class="form-group">
                  <label>Country</label>
                  <select class="form-control" placeholder="Input something.." name="">
                    <option value="1">Item 1</option>
                    <option value="1">Item 1</option>
                  </select>
                </div>
              
                <div class="form-group">
                  <label>Foreign Principal</label>
                  <input type="text" class="form-control" placeholder="Last Name" name="">
                </div>
              
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="First Name" name="">
                </div>
              
                <div class="form-group">
                  <label>Company Address</label>
                  <input type="text" class="form-control" name="">
                </div>
                
                <div class="form-group">
                  <label>Cellphone Number</label>
                  <input type="text" class="form-control" name="">
                </div>
              
              
                <div class="form-group">
                  <label>Landline Number</label>
                  <input type="text" class="form-control" name="">
                </div>
              
                <div class="form-group">
                  <label>Company Email Address</label>
                  <input type="text" class="form-control" name="">
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
      $('.sidebar-menu .trnsc').trigger('click');
      $('.sidebar-menu li.empr').addClass('active');
    });
  </script>
  @endsection