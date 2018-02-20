@extends('layouts.admin')

@section('title','Employer')

@section('content')

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Transactions
      </h1>
    </section>

    <section class="content">
      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employer</h3>
            </div>
            <div class="box-body">
              <button class="btn btn-primary" id="add" style="padding: 10px; width: 220px;"><strong>CREATE EMPLOYER CONTRACT</strong>  <span class="fa fa-plus"></span></button>
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
                  <tbody>
                    @foreach($empyr as $emp)
                    <tr>
                      <td>{{$emp->EMPLOYERNAME}}</td>
                      <td>{{$emp->country->COUNTRYNAME}}</td>
                      <td>{{$emp->FNAME.' '.$emp->LNAME}}</td>
                      <td>{{$emp->CONTACT}}</td>
                      <td>{{$emp->LANDLINE}}</td>
                      <td>
                        <button class="btn btn-info edit" value="{{$emp->EMPLOYER_ID}}"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger del" value="{{$emp->EMPLOYER_ID}}"><i class="fa fa-trash"></i></button>
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
      <div class="modal fade" id="addform">
        <form method="post">
          {{csrf_field()}}
          <input type="hidden" name="id">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Create Employer Contract</h4>
              </div>
              <div class="modal-body">
                <div class="form-group has-feedback">
                  <label>Employer</label>
                  <input type="text" class="form-control" name="empname">
                </div>
                <div class="form-group">
                  <label>Country</label>
                  <select class="form-control" style="width: 100%" name="cname">
                    @foreach($cty as $cty)
                    <option value="{{$cty->COUNTRY_ID}}">{{$cty->COUNTRYNAME}}</option>
                    @endforeach
                  </select>
                </div>
               
                <div class="form-group">
                  <label>Foreign Principal</label>
                </div>
                <div class="form-horizontal">
                  <div class="form-group">
                    <label></label>
                    <div class="col-xs-4">
                      <input type="text" class="form-control" placeholder="First Name" name="fname">
                    </div>
                    <div class="col-xs-4">
                      <input type="text" class="form-control" placeholder="Middle Name" name="mname">
                    </div>
                    <div class="col-xs-4">
                      <input type="text" class="form-control" placeholder="Last Name" name="lname">
                    </div>
                  </div> 
                </div>
              
                <div class="form-group has-feedback">
                  <label>Company Address</label>
                  <input type="text" class="form-control" name="compadd">
                </div>
                
                <div class="form-group has-feedback">
                  <label>Cellphone Number</label>
                  <input type="text" class="form-control" name="cnum">
                </div>
              
              
                <div class="form-group has-feedback">
                  <label>Landline Number</label>
                  <input type="text" class="form-control" name="lnum">
                </div>
              
                <div class="form-group has-feedback">
                  <label>Company Email Address</label>
                  <input type="text" class="form-control" name="compemadd">
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
              <form method="post" action="/delEmployer">
                {{csrf_field()}}
                <input type="hidden" name="id">
              <p>Are you sure you want to terminate the contract?</p>
              <div class="form-group">
                <label>Reason</label>
                <input type="text" class="form-control" name="reason">
              </div>

            </div>
            <div class="modal-footer">
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
      $('.sidebar-menu .jd').trigger('click');
      $('.sidebar-menu li.empr').addClass('active');

      $('#addform form').validate({
        rules: {
          empname: {
            required: true,
            maxlength: 100
          },
          lname: {
            required: true,
            maxlength: 100
          },
          mname: {
            required: true,
            maxlength: 100
          },
          fname: {
            required: true,
            maxlength: 100
          },
          compadd: {
            required: true,
            maxlength: 100
          },
          compemadd: {
            required: true,
            maxlength: 100,
            email: true
          },
          lnum: {
            required: true,
            maxlength: 30,
          },
          cnum: {
            required: true,
            maxlength: 30,
            number: true
          },
        },
      });

      $('#add').click(function(){
        $('#addform form').trigger('reset').attr('action','/addEmployer');
        clearform();
        $('#addform .modal-title').text('Add Employer');
        $('#addform').modal();
      });

      $('.edit').click(function(){
        $('#addform form').trigger('reset').attr('action','/editEmployer');
        clearform();
        $('#addform .modal-title').text('Edit Employer');
        $.ajax
        ({
          url: '/getEmployer',
          type:'get',
          dataType : 'json',
          data: { id : $(this).val() },
          success:function(response) {
            $('#addform form input[name=id]').val(response.EMPLOYER_ID);
            $('#addform form input[name=empname]').val(response.EMPLOYERNAME);
            $('#addform form input[name=lname]').val(response.LNAME);
            $('#addform form input[name=mname]').val(response.MNAME);
            $('#addform form input[name=fname]').val(response.FNAME);
            $('#addform form input[name=compadd]').val(response.COMPANYADD);
            $('#addform form input[name=compemadd]').val(response.EMAIL);
            $('#addform form input[name=lnum]').val(response.LANDLINE);
            $('#addform form input[name=cnum]').val(response.CONTACT);
            $('#addform form .select2').val(response.COUNTRY_ID).trigger('change');
          },
          complete:function(){
            $('#addform').modal();
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