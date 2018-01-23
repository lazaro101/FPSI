@extends('layouts.admin')

@section('title','Currency')

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
              <h3 class="box-title">Currency</h3>
            </div>
            <div class="box-body">
              <button class="btn btn-primary" data-toggle="modal" data-target="#addCurrency" style="padding: 10px; width: 100px;"><strong>ADD</strong>  <span class="fa fa-plus"></span></button>
              <div class="content">
                <table class="table table-hover" id="example1">
                  <thead>
                    <tr> 
                      <th>Currency</th>
                      <th>Symbol</th>
                      <th width="100px">Actions</th>
                    </tr>
                  </thead>
                  <tbody> 
                    @foreach($cur as $cur)
                    <tr>
                      <td>{{$cur->CURRENCY}}</td>
                      <td>{{$cur->SYMBOL}}</td>
                      <td>
                        <button class="btn btn-info edit" value="{{$cur->CUR_ID}}"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger del" value="{{$cur->CUR_ID}}"><i class="fa fa-trash"></i></button>
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
 
      <div class="modal fade" id="addCurrency">
        <form method="post" action="/addCurrency">
          {{csrf_field()}}
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Currency</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Currency</label>
                  <input type="text" class="form-control" placeholder="ex. Philippine Peso" name="currency">
                </div>
                <div class="form-group">
                  <label>Symbol</label>
                  <input type="text" class="form-control" placeholder="ex. ‎Php" name="symbol">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div> 
          </div>
        </form>
      </div>

      <div class="modal fade" id="edit">
        <form method="post" action="/editCurrency">
          {{csrf_field()}}
          <input type="hidden" name="id">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Currency</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Currency</label>
                  <input type="text" class="form-control" placeholder="ex. Philippine Peso" name="currency">
                </div>
                <div class="form-group">
                  <label>Symbol</label>
                  <input type="text" class="form-control" placeholder="ex. ‎Php" name="symbol">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
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
              <form method="post" action="/delCurrency">
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
      $('.sidebar-menu li.cnc').addClass('active'); 

      $('.edit').click(function(){
        $.ajax
        ({
          url: '/getCurrency',
          type:'get',
          dataType : 'json',
          data: { id : $(this).val() },
          success:function(response) {
            $('#edit form input[name=id]').val(response.CUR_ID);
            $('#edit form input[name=currency]').val(response.CURRENCY);
            $('#edit form input[name=symbol]').val(response.SYMBOL);
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