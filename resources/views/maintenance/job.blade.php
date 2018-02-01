@extends('layouts.admin')

@section('title','Job')

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
                <h3 class="box-title">Job</h3>
           </div>
           <div class="box-body">
                <button id="btnNewJob" class="btn btn-primary" style="padding: 10px; width: 100px;"><strong>ADD</strong>  <span class="fa fa-plus"></span></button>
                <div class="content">
                   <table class="table table-hover" id="tableJob">
                      <thead>
                         <tr>
                            <th>Job Category</th>
                            <th>Job</th>
                            <th>Job Type</th>
                            <th>Required Skills</th>
                            <th width="100px">Actions</th>
                       </tr>
                  </thead>
                  <tbody id="job-list">
                    @foreach ($jobs as $job)
                    <tr id="id{{$job->JOB_ID}}">
                       <td>{{$job->jobcategory->CATEGORYNAME}}</td>
                       <td>{{$job->JOBNAME}}</td>
                       <td>{{$job->jobtype->TYPENAME}}</td>
                       <td>
                           <ul>
                               @foreach ($job->specificskill as $skill)
                               <li>{{$skill->skill->SKILLNAME}}</li>
                               @endforeach
                          </ul>
                     </td>
                     <td>
                        <button class='btn btn-info edit' id='btnUpdate' value="{{$job->JOB_ID}}"><i class='fa fa-pencil'></i></button>
                        <button class='btn btn-danger del' id='btnRemove' value="{{$job->JOB_ID}}"><i class='fa fa-trash'></i></button>
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
<div class="modal fade" id="modalJob">
 <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span></button>
             <h4 class="modal-title">Add Job</h4>
        </div>
        <div class="modal-body">
             <div class="form-group">
                <label>Job Category</label>
                <select class="form-control" placeholder="Input something.." id="slctJobCategory"></select>
           </div>
           <div class="form-group">
                <label>Job Name</label>
                <input type="text" class="form-control" id="txtJob">
           </div>
           <div class="form-group">
                <label>Job Type</label>
                <select class="form-control" placeholder="Input something.." id="slctJobType"></select>
           </div>
           <div class="form-group">
                <label>Skills</label>
                <div id="check-list"></div>     
           </div>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-success" id="btnSaveJob">Save</button>
         <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</div>
<!-- /.modal-content -->
</div>
</div>

<div class="modal modal-warning fade in" id="modalRemoveJob">
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
                <button type="button" class="btn btn-outline" id="btnRemoveJob">Yes</button>
                <button type="button" class="btn btn-outline" data-dismiss="modal">No</button>
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
    var tableJob;
    var jobid;

    $(document).ready(function(){
      $('.sidebar-menu .mntc').trigger('click');
      $('.sidebar-menu .jd').trigger('click');
      $('.sidebar-menu li.jb').addClass('active'); 
        tableJob = $('#tableJob').DataTable();
   });

    function jobInitialize() {
     $('#slctJobCategory').empty();
        $('#slctJobType').empty();
        $('#check-list').empty();

        $.ajax({
           type: "GET",
           url: "/json/jobcategory/all",
           dataType: "json",
           success: function(data) {
              console.log(data);

              $.each(data, function(index, value) {
                 $('#slctJobCategory').append("<option value="+value.CATEGORY_ID+">"+value.CATEGORYNAME+"</option>");
            });
         },
    });

        $.ajax({
           type: "GET",
           url: "/json/jobtype/all",
           dataType: "json",
           success: function(data) {
              console.log(data);

              $.each(data, function(index, value) {
                 $('#slctJobType').append("<option value="+value.JOBTYPE_ID+">"+value.TYPENAME+"</option>");
            });
         },
    });

        $.ajax({
           type: "GET",
           url: "/json/skillspecific/all",
           dataType: "json",
           success: function(data) {
              console.log(data);

              $.each(data, function(index, value) {
                 $('#check-list').append("<label><input type='checkbox' name='cbSkill' id='cbSkill' value='"+value.SKILL_ID+"'> "+value.SKILLNAME+"</label><br>");
            });
         },
    });
    }

    $('#job-list').on('click', '#btnRemove', function() {
     jobid = $(this).val();

     $('#modalRemoveJob').modal('show');
    });

    $('#btnRemoveJob').click(function() {
     $.ajax({
           type: "POST",
           url: "/maintenance/remove/job",
           data: { _token: "{{ Session::token() }}", jobid: jobid },
           dataType: "json",
           success: function(data) {
              console.log(data);

              tableJob.row('#id'+jobid).remove().draw(false);

              $('#modalRemoveJob').modal('hide');
         },
    });
    });

    $('#job-list').on('click', '#btnUpdate', function() {
     jobInitialize();
     jobid = $(this).val();

     $.ajax({
           type: "GET",
           url: "/json/job/one",
           data: { job: $(this).val() },
           dataType: "json",
           success: function(data) {
              console.log(data);

              $('#slctJobCategory').val(data.CATEGORY_ID);
              $('#slctJobType').val(data.JOBTYPE_ID);
              $('#txtJob').val(data.JOBNAME);
         },
    });

     $.ajax({
          type: "GET",
          url: "/json/specificskill/one",
          data: { specificskill: $(this).val() },
          dataType: "json",
          success: function(data) {
               console.log(data);

               $.each(data, function(index, value) {
                    $('input[type=checkbox][value='+value.Skill_id+']').prop('checked', true);
               });
          }
     });

     $('#btnSaveJob').val("update");
     $('#modalJob').modal('show');
    });

    $('#btnNewJob').click(function() {
        jobInitialize();

        $('#btnSaveJob').val("new");
        $('#modalJob').modal('show');
   });

    $('#btnSaveJob').click(function(e) {
        e.preventDefault();

        var skillList = [];
        $('#check-list :checked').each(function() {
           skillList.push($(this).val());
      });

        if ($('#btnSaveJob').val() == "new") {
           var formData = {
               _token: "{{ Session::token() }}",
               type: "new",
               jobname: $('#txtJob').val(),
               jobcategory: $('#slctJobCategory').val(),
               jobtype: $('#slctJobType').val(),
               skilllist: skillList,
          }
     } else {
        var formData = {
            _token: "{{ Session::token() }}",
            type: "update",
            jobid: jobid,
            jobname: $('#txtJob').val(),
            jobcategory: $('#slctJobCategory').val(),
            jobtype: $('#slctJobType').val(),
            skilllist: skillList,
       }
  }

  $.ajax({
   type: "POST",
   url: "/maintenance/job",
   data: formData,
   dataType: "json",
   success: function(data) {
      console.log(data);

      if ($('#btnSaveJob').val() == "new") {
         var row = "<tr id=id" + data.JOB_ID + ">" +
         "<td>" + data.jobcategory.CATEGORYNAME + "</td>" +
         "<td>" + data.JOBNAME + "</td>" +
         "<td>" + data.jobtype.TYPENAME + "</td>" +
         "<td></td>" +
         "<td style='text-align: right;'>" +
         "<button class='btn btn-info edit' id='btnUpdate' value="+data.JOB_ID+"><i class='fa fa-pencil'></i></button> " +
         "<button class='btn btn-danger del' id='btnRemove' value="+data.JOB_ID+"><i class='fa fa-trash'></i></button>" +
         "</td>" +
         "</tr>";
         tableJob.row.add($(row)[0]).draw();
    } else {
          var dt = [
             data.jobcategory.CATEGORYNAME,
             data.JOBNAME,
             data.jobtype.TYPENAME,
             "",
             "<button class='btn btn-info edit' id='btnUpdate' value="+data.JOB_ID+"><i class='fa fa-pencil'></i></button> " +
             "<button class='btn btn-danger del' id='btnRemove' value="+data.JOB_ID+"><i class='fa fa-trash'></i></button>",
         ];

         tableJob.row('#id'+jobid).data(dt).draw(false);
    }

    $('#modalJob').modal('hide');
},
});
});


</script>
@endsection