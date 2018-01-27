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
                <button id="btnNewJob" class="btn btn-primary" data-toggle="modal" data-target="#addJob" style="padding: 10px; width: 100px;"><strong>ADD</strong>  <span class="fa fa-plus"></span></button>
                <div class="content">
                   <table class="table table-hover" id="example1">
                      <thead>
                         <tr>
                            <th>Job Category</th>
                            <th>Job</th>
                            <th>Job Type</th>
                            <th>No. of Required Skills</th>
                            <th width="100px">Actions</th>
                       </tr>
                  </thead>
                  <tbody>

                  </tbody>
             </table>
        </div>
   </div> 
</div>
</div>
</div>

<!-- modal -->
<div class="modal fade" id="addJob">
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
                    <input type="text" class="form-control" id="txtName">
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
       <button type="submit" class="btn btn-success" id="btnSaveJob">Save</button>
       <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
</div>
<!-- /.modal-content -->
</div>
</div>

<div class="modal fade" id="editJob">
     <form method="post" action="/editJob">
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
                       <label>Job Category</label>
                       <select class="form-control" placeholder="Input something.." name="">
                          <option value="1">Item 1</option>
                          <option value="1">Item 1</option>
                     </select>
                </div>
                <div class="form-group">
                  <label>Job Name</label>
                  <input type="text" class="form-control" name="">
             </div>
             <div class="form-group">
                  <label>Job Type</label>
                  <select class="form-control" placeholder="Input something.." name="">
                     <option value="1">Item 1</option>
                     <option value="1">Item 1</option>
                </select>
           </div>
           <div class="form-group">
             <label>Skills</label><br>
             <div class="Checkbox">
                <input type="Checkbox"  name=""> Skill 1 <br>
                <input type="Checkbox"  name=""> Skill 2 <br>
                <input type="Checkbox"  name=""> Skill 3 <br>
                <input type="Checkbox"  name=""> Skill 4 <br>
                <input type="Checkbox"  name=""> Skill 5
           </div>    
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

<div class="modal modal-warning fade in" id="delJob">
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
               <form method="post" action="/delJob">
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
          $('.sidebar-menu li.jb').addClass('active'); 
     });

     $('#btnNewJob').click(function() {
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
                         $('#check-list').append("<input type='checkbox' name='cbSkill' id='cbSkill' value='"+value.SKILL_ID+"'> "+value.SKILLNAME+"<br>");
                    });
               },
          });
     });

     $('#btnSaveJob').click(function(e) {
          e.preventDefault();

          var skillList = [];
          $('#check-list :checked').each(function() {
               skillList.push($(this).val());
          });

          var formData = {
               _token: "{{ Session::token() }}",
               jobname: $('#txtName').val(),
               jobcategory: $('#slctJobCategory').val(),
               jobtype: $('#slctJobType').val(),
               skilllist: skillList,
          }

          $.ajax({
               type: "POST",
               url: "/maintenance/job",
               data: formData,
               dataType: "json",
               success: function(data) {
                    console.log(data);
               },
          });
     });


</script>
@endsection