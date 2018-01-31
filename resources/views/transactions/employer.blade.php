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
              <button class="btn btn-primary" data-toggle="modal" data-target="#addFees" style="padding: 10px; width: 220px;"><strong>CREATE EMPLOYER CONTRACT</strong>  <span class="fa fa-plus"></span></button>
              <div class="content">
                <table class="table table-hover" id="example1">
                  <thead>
                    <tr>
                      <th>Employer</th>
                      <th>Country</th>
                      <th>Foreign Principal</th>
                      <th>Cellphone Number</th>
                      <th>Landline Number</th>
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
                <h4 class="modal-title">Create Employer Contract</h4>
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

        <!-- modal -->
      <div class="modal fade" id="edit">
        <form method="post" action="">
          {{csrf_field()}}
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Employer Contract</h4>
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

      <div class="modal modal-warning fade in" id="del">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Terminate Contract</h4>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to terminate the contract?</p>

              <div class="form-group">
                <label>Termination Date</label>

                <!-- Date mm/dd/yyyy -->
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              </div>

              <div class="form-group">
                  <label>Reason</label>
                  <input type="text" class="form-control" name="">
                </div>

            </div>
            <div class="modal-footer">
              <form method="post" action="">
                {{csrf_field()}}
                <input type="hidden" name="id">
                <button type="submit" class="btn btn-outline">Yes</button>
                <button type="button" class="btn btn-outline" data-dismiss="modal">No</button>
              </form>
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
      $('.sidebar-menu li.empr').addClass('active');
    });
  </script>
  @endsection