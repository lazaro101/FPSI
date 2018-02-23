@extends('layouts.admin')

@section('title','General Requirements')

@section('content')

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Maintenance
      </h1>
    </section>

    <section class="content">
      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Documentary Requirements</h3>
            </div>
            <div class="box-body">
              <button class="btn btn-primary" id="add" style="padding: 10px; width: 100px;"><strong>ADD</strong>  <span class="fa fa-plus"></span></button>
              <div class="content">
                <table class="table table-hover" id="example1">
                  <thead>
                    <tr>
                      <th>Requirement Name</th>
                      <th>Purpose</th>
                      <th>Description</th>
                      <th width="100px">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($genreq as $req)
                  <tr>
                    <td>{{$req->REQNAME}}</td>
                    <td>{{$req->ALLOCATION}}</td>
                    <td>{{$req->Description}}</td>
                    <td>
                      <button class="btn btn-info edit" value="{{$req->REQ_ID}}"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger del" value="{{$req->REQ_ID}}"><i class="fa fa-trash"></i></button>
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
      <div class="modal fade" id="addGenreq">
        <form method="post">
          {{csrf_field()}}
          <input type="hidden" name="id">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add General Requirements</h4>
              </div>
              <div class="modal-body">
                <div class="form-group has-feedback">
                  <label>Requirement Name</label>
                  <input type="text" class="form-control" name="reqname">
                </div>
                <div class="form-group">
                  <label>Purpose</label>
                  <select class="form-control" placeholder="Input something.." name="alloc">
                    <option value="Basic">Basic</option>
                    <option value="Job">Job</option>
                    <option value="Country">Country</option>
                  </select>
                </div>
                <div class="form-group has-feedback">
                  <label>Description</label>
                  <textarea class="form-control optional" rows="5" name="desc"></textarea>
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
              <form method="post" action="/delDocreq">
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
      $('.sidebar-menu li.gr').addClass('active');

      $('#addGenreq form').validate({
        rules: {
          reqname: {
            required: true,
            maxlength: 100
          },
          desc: {
            required: false,
            maxlength: 100
          }
        },
      });

      $('#add').click(function(){
        $('#addGenreq form').trigger('reset').attr('action','/addDocreq');
        clearform();
        $('#addGenreq .modal-title').text('Add Documentary Requirement');
        $('#addGenreq').modal();
      });

      $('.edit').click(function(){
        $('#addGenreq form').trigger('reset').attr('action','/editDocreq');
        clearform();
        $('#addGenreq .modal-title').text('Edi Documentary Requirement');
          $.ajax
          ({
            url: '/getDocreq',
            type:'get',
            dataType : 'json',
            data: { id : $(this).val() },
            success:function(response) {
              $('#addGenreq form input[name=id]').val(response.REQ_ID);
              $('#addGenreq form input[name=reqname]').val(response.REQNAME);
              $('#addGenreq form select[name=alloc]').val(response.ALLOCATION);
              $('#addGenreq form textarea[name=desc]').val(response.Description);
            },
            complete:function(){
              $('#addGenreq').modal();
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