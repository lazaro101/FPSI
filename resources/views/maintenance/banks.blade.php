@extends('layouts.admin')

@section('title','Banks')

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
              <h3 class="box-title">Banks</h3>
            </div>
            <div class="box-body">
              <button class="btn btn-primary" id="add" style="padding: 10px; width: 100px;"><strong>ADD</strong>  <span class="fa fa-plus"></span></button>
              <div class="content">
                <table class="table table-hover" id="example1">
                  <thead>
                    <tr>
                      <th>Bank Name</th>
                      <th width="100px">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($bank as $bank)
                    <tr>
                      <td>{{$bank->BANKNAME}}</td>
                      <td>
                        <button class="btn btn-info edit" value="{{$bank->BANK_ID}}"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger del" value="{{$bank->BANK_ID}}"><i class="fa fa-trash"></i></button>
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

      <div class="modal fade" id="addBanks">
        <form method="post">
          {{csrf_field()}}
          <input type="hidden" name="id">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Bank</h4>
              </div>
              <div class="modal-body">
                <div class="form-group has-feedback">
                  <label>Bank Name</label>
                  <input type="text" class="form-control" placeholder="ex. Metrobank" name="bankname">
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
              <form method="post" action="/delBanks">
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
      $('.sidebar-menu li.bnk').addClass('active'); 

      $('#addBanks form').validate({
        rules: {
          bankname : {
            required : true,
            // minlength: 5,
            maxlength: 30
          },
        },
      });

      $('#add').click(function(){
        $('#addBanks form').trigger('reset').attr('action','/addBanks');
        clearform();
        $('#addBanks .modal-title').text('Add Bank');
        $('#addBanks').modal();
      });

      $('.edit').click(function(){
        $('#addBanks form').trigger('reset').attr('action','/editBanks');
        clearform();
        $('#addBanks .modal-title').text('Edit Bank');
        $.ajax
        ({
          url: '/getBanks',
          type:'get',
          dataType : 'json',
          data: { id : $(this).val() },
          success:function(response) {
            $('#addBanks form input[name=id]').val(response.BANK_ID);
            $('#addBanks form input[name=bankname]').val(response.BANKNAME);
          },
          complete:function(){
            $('#addBanks').modal();
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