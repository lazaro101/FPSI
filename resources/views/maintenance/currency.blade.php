@extends('layouts.admin')

@section('title','Currency')

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
              <h3 class="box-title">Currency</h3>
            </div>
            <div class="box-body">
              <button class="btn btn-primary" id="add" style="padding: 10px; width: 100px;"><strong>ADD</strong>  <span class="fa fa-plus"></span></button>
              <div class="content">
                <table class="table table-hover" id="example1">
                  <thead>
                    <tr> 
                      <th>Country</th>
                      <th>Currency</th>
                      <th>Symbol</th>
                      <th width="100px">Actions</th>
                    </tr>
                  </thead>
                  <tbody> 
                    @foreach($cur as $cur)
                    <tr>
                      <td>{{$cur->CURRENCYNAME}}</td>
                      <td>{{$cur->SYMBOL}}</td>
                      <td>{{$cur->COUNTRYNAME}}</td>
                      <td>
                        <button class="btn btn-info edit" value="{{$cur->CURRENCY_ID}}"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger del" value="{{$cur->CURRENCY_ID}}"><i class="fa fa-trash"></i></button>
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
        <form method="post">
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
                  <label>Country</label>
                  <select class="form-control" placeholder="Input something.." name="country">
                    @php $cty1 = $cty @endphp
                    @foreach($cty as $cty)
                    <option value="{{$cty->COUNTRY_ID}}">{{$cty->COUNTRYNAME}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group has-feedback">
                  <label>Currency</label>
                  <input type="text" class="form-control" placeholder="ex. Philippine Peso" name="currency">
                </div>
                <div class="form-group has-feedback">
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

      $('#addCurrency form').validate({
        rules: {
          currency : {
            required : true,
            minlength: 2,
            maxlength: 30
          },
          symbol : {
            required : true,
            maxlength: 11
          },
        },
      });

      $('#add').click(function(){
        $('#addCurrency form').trigger('reset').attr('action','/addCurrency');
        clearform();
        $('#addCurrency .modal-title').text('Add Currency');
        $('#addCurrency').modal();
      });

      $('.edit').click(function(){
        $('#addCurrency form').trigger('reset').attr('action','/editCurrency');
        clearform();
        $('#addCurrency .modal-title').text('Edit Currency');
        $.ajax
        ({
          url: '/getCurrency',
          type:'get',
          dataType : 'json',
          data: { id : $(this).val() },
          success:function(response) {
            $('#addCurrency form input[name=id]').val(response.CURRENCY_ID);
            $('#addCurrency form input[name=currency]').val(response.CURRENCYNAME);
            $('#addCurrency form input[name=symbol]').val(response.SYMBOL);
            $('#addCurrency form select[name=country]').val(response.COUNTRY_ID);
          },
          complete:function(){
            $('#addCurrency').modal();
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