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
              <button class="btn btn-primary" id="add" style="padding: 10px; width: 100px;"><strong>ADD</strong>  <span class="fa fa-plus"></span></button>
              <div class="content">
                <table class="table table-hover" id="example1">
                  <thead>
                  <tr>
                    <th>Country ID</th>
                    <th>Country</th>
                    <th>No. of Requirements</th>
                    <th width="100px">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($cnt as $cnt) 
                  <tr>
                    <td>{{$cnt->COUNTRY_ID}}</td>
                    <td>{{$cnt->COUNTRYNAME}}</td>
                    <td>{{$cnt->nor}}</td>
                    <td>
                      <button class="btn btn-info edit" value="{{$cnt->COUNTRY_ID}}"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger del" value="{{$cnt->COUNTRY_ID}}"><i class="fa fa-trash"></i></button>
                    </td>
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

      <div class="modal fade" id="edit">
        <form method="post" action="/editCountry">
          <input type="hidden" name="id">
          {{csrf_field()}}
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Country</h4>
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
            </div> 
          </div>
        </form>
      </div>

      <div class="modal modal-warning fade in" id="del">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Delete</h4>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete?</p>
            </div>
            <div class="modal-footer">
              <form method="post" action="/delCountry">
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
      $('.sidebar-menu .mntc').trigger('click');
      $('.sidebar-menu li.cty').addClass('active'); 

      $('#addCountry form').validate({
        rules: {
          countryname : {
            required : true,
          }
        }
      });

      $('#add').click(function(){
        $('#addCountry form').trigger('reset');
        $('#addCountry').modal();
      });
      $('.edit').click(function(){
        $('#edit form .checkbox input').prop('checked',false);
        $.ajax
        ({
          url: '/getCountry',
          type:'get',
          dataType : 'json',
          data: { id : $(this).val() },
          success:function(response) {
            $('#edit form input[name=id]').val(response[0].COUNTRY_ID);
            $('#edit form input[name=countryname]').val(response[0].COUNTRYNAME);
            response[1].forEach(function(data) { 
              $('#edit form .checkbox input[value='+data.REQ_ID+']').prop('checked',true);
            });
          },
          complete:function(){
            $('#edit').modal();
          }
        });
      });

      $('.del').click(function(){
        $('#del form input[name=id]').val($(this).val());
        $('#del').modal();
      });

    });
  </script>
  @endsection