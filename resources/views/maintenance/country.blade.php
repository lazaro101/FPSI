@extends('layouts.admin')

@section('title','Country')

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
              <h3 class="box-title">Country</h3>
            </div>
            <div class="box-body">
              <button class="btn btn-primary" data-toggle="modal" data-target="#addCountry" style="padding: 10px; width: 100px;"><strong>ADD</strong>  <span class="fa fa-plus"></span></button>
              <div class="content">
                <table class="table table-hover" id="example1">
                  <thead>
                  <tr>
                    <th>Country ID</th>
                    <th>Country</th>
                    <th>No. of Requirements</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($cnt as $cnt) 
                  <tr>
                    <td>{{$cnt->COUNTRY_ID}}</td>
                    <td>{{$cnt->COUNTRYNAME}}</td>
                    <td>{{$cnt->nor}}</td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div> 
          </div>
        </div>
      </div>
      
  <!-- modal -->
      <div class="modal fade" id="addCountry">
        <form method="post" action="/addCountry">
          {{csrf_field()}}
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Country</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Country Name</label>
                  <input type="text" class="form-control" name="countryname">
                </div>
                <div class="form-group">
                  <label>Country Requirements</label>
                  @foreach($genreq as $req)
                  <div class="checkbox">
                    <label><input type="checkbox" name="req[]" value="{{$req->REQ_ID}}">{{$req->REQNAME}}</label>
                  </div>
                  @endforeach
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Save</button>
                  <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
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
      $('.sidebar-menu li.cty').addClass('active'); 
    });
  </script>
  @endsection