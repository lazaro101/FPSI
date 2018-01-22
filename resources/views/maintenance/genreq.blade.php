@extends('layouts.admin')

@section('title','General Requirements')

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
              <h3 class="box-title">General Requirements</h3>
            </div>
            <div class="box-body">
              <button class="btn btn-primary" data-toggle="modal" data-target="#addGenreq" style="padding: 10px; width: 100px;"><strong>ADD</strong>  <span class="fa fa-plus"></span></button>
              <div class="row">
                <div class="col-xs-12">
                  <div class="box-header">

                  </div>
                <!-- /.box-header -->
                  <div class="box-body">
                    <table class="table table-hover">
                      <thead>
                      <tr>
                        <th>Requirement Name</th>
                        <th>Allocation</th>
                        <th>Description</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($genreq as $req)
                      <tr>
                        <td>{{$req->REQNAME}}</td>
                        <td>{{$req->ALLOCATION}}</td>
                        <td>{{$req->Description}}<td>
                      </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                <!-- /.box-body -->
                </div>
              </div>
            </div>
            <!-- /.box-footer-->
          </div>
        </div>
      </div>
     <!--  <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped" id="example1">
                <thead>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Other browsers</td>
                  <td>All others</td>
                  <td>-</td>
                  <td>-</td>
                  <td>U</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div> -->
         
      <!-- /.box -->

  <!-- modal -->
      <div class="modal fade" id="addGenreq">
        <form method="post" action="/addGenreq">
          {{csrf_field()}}
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add General Requirements</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Requirement Name</label>
                  <input type="text" class="form-control" name="reqname">
                </div>
                <div class="form-group">
                  <label>Allocation</label>
                  <input type="text" class="form-control" name="alloc">
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" rows="5" name="desc"></textarea>
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
      $('.sidebar-menu li.gr').addClass('active'); 
      $('#example1').DataTable();

    });
  </script>
  @endsection