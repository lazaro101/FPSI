@extends('layouts.admin')

@section('title','Fees')

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
              <h3 class="box-title">Fees</h3>
            </div>
            <div class="box-body">
              <button class="btn btn-primary" data-toggle="modal" data-target="#addFees" style="padding: 10px; width: 100px;"><strong>ADD</strong>  <span class="fa fa-plus"></span></button>
              <div class="content">
                <table class="table table-hover" id="example1">
                  <thead>
                    <tr>
                      <th>Fee Name</th>
                      <th>For Job Type</th>
                      <th width="100px">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($fees as $fee)
                    <tr>
                      <td>{{$fee->FEENAME}}</td>
                      <td>
                        @foreach($fee->jobtype as $type)
                        {{$type->feetype->TYPENAME}} 
                          @if(!$loop->remaining == 0) {{','}} @endif
                        @endforeach
                      </td>
                      <td>
                        <button class='btn btn-info edit' id='btnUpdate' value="{{$fee->FEE_ID}}"><i class='fa fa-pencil'></i></button>
                        <button class='btn btn-danger del' id='btnRemove' value="{{$fee->FEE_ID}}"><i class='fa fa-trash'></i></button>
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
                <h4 class="modal-title">Add Fees</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Fee Name</label>
                  <input type="text" class="form-control" name="feename">
                </div>
                <div class="form-group">
                  <label>For Job Type</label>
                  @php $jtype1 = $jtype @endphp
                  @foreach($jtype as $jt)
                  <div class="checkbox">
                    <label><input type="checkbox" name="jtype[]" value="{{$jt->JOBTYPE_ID}}">{{$jt->TYPENAME}}</label>
                  </div>
                  @endforeach
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

      <div class="modal fade" id="edit">
        <form method="post" action="/editFees">
          {{csrf_field()}}
          <input type="hidden" name="id">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Fees</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Fee Name</label>
                  <input type="text" class="form-control" name="feename">
                </div>
              <div class="form-group">
                <label>For Job Type</label>
                @foreach($jtype1 as $jt)
                <div class="checkbox">
                  <label><input type="checkbox" name="jtype[]" value="{{$jt->JOBTYPE_ID}}">{{$jt->TYPENAME}}</label>
                </div>
                @endforeach
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
              <h4 class="modal-title">Delete</h4>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete?</p>
            </div>
            <div class="modal-footer">
              <form method="post" action="/delFees">
                {{csrf_field()}}
                <input type="hidden" name="id" value="">
                <button type="submit" class="btn btn-outline">Yes</button>
                <button type="button" class="btn btn-outline" data-dismiss="modal">No</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

    </section>

  </div>

  @endsection

  @section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $('.sidebar-menu .mntc').trigger('click');
      $('.sidebar-menu .jd').trigger('click');
      $('.sidebar-menu li.fes').addClass('active');

      $('.edit').click(function(){
        $('#edit form .checkbox input').prop('checked',false);
        $.ajax
        ({
          url: '/getFees',
          type:'get',
          dataType : 'json',
          data: { id : $(this).val() },
          success:function(response) {
            $('#edit form input[name=id]').val(response[0].FEE_ID);
            $('#edit form input[name=feename]').val(response[0].FEENAME);
            response[1].forEach(function(data) { 
              $('#edit form input[type=checkbox][value='+data.JOBTYPE_ID+']').prop('checked',true);
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