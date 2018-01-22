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

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Acccepted Banks</h3>
        </div>
        <div class="box-body">
          <button class="btn btn-primary" data-toggle="modal" data-target="#addAccBanks" style="padding: 10px; width: 100px;"><strong>ADD</strong>  <span class="fa fa-plus"></span></button>
          <div class="row">
            <div class="col-xs-12">
              <div class="box-header">

                <div class="box-tools">
                  <div class="input-group input-group-sm" style="width: 200px;">
                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <th>Country ID</th>
                    <th>Country Name</th>
                    <th>Banks Allowed</th>
                  </tr>
                  @foreach($acbnk as $acbnk)
                  <tr>
                  	<td>{{$acbnk->COUNTRY_ID}}</td>
                  	<td>{{$acbnk->COUNTRYNAME}}</td>
                  	<td>{{$acbnk->bank}}</td>
                  </tr>
                  @endforeach
                </table>
              </div>
            <!-- /.box-body -->
            </div>
          </div>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

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
            <!-- /.modal-content -->
          </div>
        </form>
      </div>

    </section>

  </div>

  @endsection

  @section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $('.sidebar-menu .mntc').trigger('click');
      $('.sidebar-menu li.abnk').addClass('active'); 
    });
  </script>
  @endsection