@extends('layouts.admin')

@section('title','Skills')

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
              <h3 class="box-title">Skills</h3>
            </div>
            <div class="box-body">
              <button class="btn btn-primary" data-toggle="modal" data-target="#addSkills" style="padding: 10px; width: 100px;"><strong>ADD</strong>  <span class="fa fa-plus"></span></button>
              <div class="content">
                <table class="table table-hover" id="example1">
                  <thead>
                    <tr>
                      <th>Skill Name</th>
                      <th>Skill Type</th>
                      <th width="100px">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($genskills as $req)
                  <tr>
                    <td>{{$req->SKILLNAME}}</td>
                    <td>{{$req->SKILLTYPE}}</td>
                    <td>
                      <button class="btn btn-info edit" value="{{$req->SKILL_ID}}"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger del" value="{{$req->SKILL_ID}}"><i class="fa fa-trash"></i></button>
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
      <div class="modal fade" id="addSkills">
        <form method="post" action="/addSkills">
          {{csrf_field()}}
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Skills</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Skill Name</label>
                  <input type="text" class="form-control" name="skillname">
                </div>
                <div class="form-group">
                  <label>Skill Type</label>
                  <select class="form-control" placeholder="Input something.." name="skilltype">
                    <option value="General">General</option>
                    <option value="Specific">Specific</option>
                  </select>
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
        <form method="post" action="/editSkills">
          {{csrf_field()}}
          <input type="hidden" name="id">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Skills</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Skill Name</label>
                  <input type="text" class="form-control" name="skillname">
                </div>
                <div class="form-group">
                  <label>Skill Type</label>
                  <select class="form-control" placeholder="Input something.." name="skilltype">
                    <option value="General">General</option>
                    <option value="Specific">Specific</option>
                  </select>
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
              <form method="post" action="/delSkills">
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
      $('.sidebar-menu li.sls').addClass('active');

      $('.edit').click(function(){
          $.ajax
          ({
            url: '/getSkills',
            type:'get',
            dataType : 'json',
            data: { id : $(this).val() },
            success:function(response) {
              $('#edit form input[name=id]').val(response.SKILL_ID);
              $('#edit form input[name=skillname]').val(response.SKILLNAME);
              $('#edit form option[value='+response.SKILLTYPE+']').attr('selected','selected');
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