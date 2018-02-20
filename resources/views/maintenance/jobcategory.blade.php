@extends('layouts.admin')

@section('title','Job Category')

@section('content')

<div class="content-wrapper"> 
    <section class="content-header">
      <h1> 
      </h1>
    </section>

    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Job Category</h3>
            </div>
            <div class="box-body">
              <button class="btn btn-primary" id="add" style="padding: 10px; width: 100px;"><strong>ADD</strong>  <span class="fa fa-plus"></span></button>
              <div class="content">
                <table class="table table-hover" id="example1">
                  <thead>
                    <tr>
                      <th>Job Category Name</th>
                      <th width="100px">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($jobcategory as $jobcategory)
                    <tr>
                      <td>{{$jobcategory->CATEGORYNAME}}</td>
                      <td>
                        <button class="btn btn-info edit" value="{{$jobcategory->CATEGORY_ID}}"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger del" value="{{$jobcategory->CATEGORY_ID}}"><i class="fa fa-trash"></i></button>
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
      <div class="modal fade" id="addJobCategory">
        <form method="post">
          {{csrf_field()}}
          <input type="hidden" name="id">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Job Category</h4>
              </div>
              <div class="modal-body">
                <div class="form-group has-feedback">
                  <label>Job Category Name</label>
                  <input type="text" class="form-control" placeholder="ex. Information Technology" name="categoryname">
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
              <form method="post" action="/delJobCategory">
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
      $('.sidebar-menu li.jbc').addClass('active'); 

      $('#addJobCategory form').validate({
        rules: {
          categoryname: {
            required: true,
            maxlength: 30
          },
        },
      });

      $('#add').click(function(){
        $('#addJobCategory form').trigger('reset').attr('action','/addJobCategory');
        clearform();
        $('#addJobCategory .modal-title').text('Add Job Category');
        $('#addJobCategory').modal();
      });

      $('.edit').click(function(){
        $('#addJobCategory form').trigger('reset').attr('action','/editJobCategory');
        clearform();
        $('#addJobCategory .modal-title').text('Edit Job Category');
        $.ajax
        ({
          url: '/getJobCategory',
          type:'get',
          dataType : 'json',
          data: { id : $(this).val() },
          success:function(response) {
            $('#addJobCategory form input[name=id]').val(response.CATEGORY_ID);
            $('#addJobCategory form input[name=categoryname]').val(response.CATEGORYNAME);
          },
          complete:function(){
            $('#addJobCategory').modal();
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