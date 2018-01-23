@extends('layouts.admin')

@section('title','Accepted Banks')

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
              <h3 class="box-title">Acccepted Banks</h3>
            </div>
            <div class="box-body">
              <button class="btn btn-primary" data-toggle="modal" data-target="#addAccBanks" style="padding: 10px; width: 100px;"><strong>ADD</strong>  <span class="fa fa-plus"></span></button>
              <div class="content">
                <table class="table table-hover" id="example1">
                  <thead>
                    <tr>
                      <th>Country ID</th>
                      <th>Country Name</th>
                      <th>Banks Allowed</th>
                      <th width="100px">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($acbnk as $acbnk)
                    <tr>
                      <td>{{$acbnk->COUNTRY_ID}}</td>
                      <td>{{$acbnk->COUNTRYNAME}}</td>
                      <td>{{$acbnk->bank}}</td>
                      <td>
                        <button class="btn btn-info edit" value="{{$acbnk->COUNTRY_ID}}"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger del" value="{{$acbnk->COUNTRY_ID}}"><i class="fa fa-trash"></i></button>
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
      @php $cnt1 = $cnt; $bnk1 = $bnk @endphp
  <!-- modal -->
      <div class="modal fade" id="addAccBanks">
        <form method="post" action="/addAccBanks">
          {{csrf_field()}}
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Accepted Bank</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                	<label>Country</label>
                  	<select class="form-control" placeholder="Input something.." name="country">
	                    @foreach($cnt as $cnt)
	                    <option value="{{$cnt->COUNTRY_ID}}">{{$cnt->COUNTRYNAME}}</option>
	                    @endforeach
                  	</select>
                </div>
				        <div class="form-group">
	                <label>Bank Name</label>
	                @foreach($bnk as $bnk)
	                <div class="checkbox">
                  		<label><input type="checkbox" name="bank[]" value="{{$bnk->BANK_ID}}">{{$bnk->BANKNAME}}</label>
                  	</div>
                	@endforeach
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
        <form method="post" action="/editAccBanks">
          {{csrf_field()}}
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Accepted Bank</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Country</label>
                    <select class="form-control" placeholder="Input something.." name="country">
                      @foreach($cnt1 as $cnt)
                      <option value="{{$cnt->COUNTRY_ID}}">{{$cnt->COUNTRYNAME}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label>Bank Name</label>
                  @foreach($bnk1 as $bnk)
                  <div class="checkbox">
                      <label><input type="checkbox" name="bank[]" value="{{$bnk->BANK_ID}}">{{$bnk->BANKNAME}}</label>
                    </div>
                  @endforeach
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
              <form method="post" action="/delAccBanks">
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
      $('.sidebar-menu li.abnk').addClass('active'); 

      $('.edit').click(function(){
        $.ajax
        ({
          url: '/getAccBanks',
          type:'get',
          dataType : 'json',
          data: { id : $(this).val() },
          success:function(response) {
            $('#edit form select option[value='+response[0].COUNTRY_ID+']').attr('selected','selected');
            response.forEach(function(data) { 
              $('#edit form .checkbox input[value='+data.BANK_ID+']').prop('checked',true);
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