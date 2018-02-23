@extends('layouts.admin')

@section('title','Job Type')

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
              <h3 class="box-title">Job Type</h3>
            </div>
            <div class="box-body">
              <button class="btn btn-primary" id="add" style="padding: 10px; width: 100px;"><strong>ADD</strong>  <span class="fa fa-plus"></span></button>
              <div class="content">
                <table class="table table-hover" id="example1">
                  <thead>
                    <tr>
                      <th>Job Type</th>
                      <th width="100px">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($jobtype as $jobtype)
                    <tr>
                      <td>{{$jobtype->TYPENAME}}</td>
                      <td>
                        <button class="btn btn-info edit" value="{{$jobtype->JOBTYPE_ID}}"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger del" value="{{$jobtype->JOBTYPE_ID}}"><i class="fa fa-trash"></i></button>
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
      <div class="modal fade" id="addJobType">
        <form method="post">
          {{csrf_field()}}
          <input type="hidden" name="id">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Job Type</h4>
              </div>
              <div class="modal-body">
                <div class="form-group has-feedback">
                  <label>Job Type</label>
                  <input type="text" class="form-control" placeholder="ex. Skilled" name="typename">
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
              <form method="post" action="/delJobType">
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
      $('.sidebar-menu .jd').trigger('click');
      $('.sidebar-menu li.jbt').addClass('active'); 

      $('#addJobType form').validate({
        rules: {
          typename: {
            required: true,
            maxlength: 30
          },
        },
      });

      $('#add').click(function(){
        $('#addJobType form').trigger('reset').attr('action','/addJobType');
        clearform();
        $('#addJobType .modal-title').text('Add Job Type');
        $('#addJobType').modal();
      });

      $('.edit').click(function(){
        $('#addJobType form').trigger('reset').attr('action','/editJobType');
        clearform();
        $('#addJobType .modal-title').text('Edit Job Type');
        $.ajax
        ({
          url: '/getJobType',
          type:'get',
          dataType : 'json',
          data: { id : $(this).val() },
          success:function(response) {
            $('#addJobType form input[name=id]').val(response.JOBTYPE_ID);
            $('#addJobType form input[name=typename]').val(response.TYPENAME);
          },
          complete:function(){
            $('#addJobType').modal();
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