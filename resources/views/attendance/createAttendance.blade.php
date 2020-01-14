@extends('layouts.app')
@section('content')
<style type="text/css">
    .select2-container--default .select2-selection--single,
    .form-control {
        border-radius: 0px;
        height: 35px;
    }
    [type=checkbox]:checked, [type=checkbox]:not(:checked) {
    	position: relative;
    	left: 0px;
    	opacity: 1;
    }
</style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-uppercase">
       Student Attendance
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Attendance</a></li>
        <li class="breadcrumb-item active">Student Attendance</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        	<!-- @@@@@@@@@@ Start Messages @@@@@@@@@@@@ -->
                  @if(Session::has('error'))
                  <div class="alert alert-danger alert-icon-left" role="alert">

                    <div class="float-xs-left">
                       <i class="fa fa-times-circle"></i> <strong>Opps !</strong> {{Session::get('error')}}.
                    </div>
                </div>
                @endif
       		 <!-- @@@@@@@@@@ End Messages @@@@@@@@@@@@ -->
          <div class="box">
            <div class="box-header">
            		<ul class="list-unstyled list-inline">
            			<li class="col-md-3">
            				<div class="form-group">
            							<label>Class</label>
            					      <select onchange="get_class();" class="form-control select2" style="width: 100%;" name="class_id" id="class_id">
                                        <option value="">Select Class</option>
                                         @foreach($classes as $cl)
                                        <option value="{{$cl->id}}">{{$cl->class_name}}</option>
                                        @endforeach

                                    </select>
            				</div>

            			</li>
            			<li class="col-md-3">
            					<div class="form-group">
            								<label>Section</label>
            					  <select class="form-control select2" style="width: 100%;" name="section_id" id="section_id">
                                        <option value="">Select Section</option>
                                         @foreach($sections as $sc)
                                        <option value="{{$sc->id}}">{{$sc->section_name}}</option>
                                         @endforeach
                                    </select>
            					</div>

            			</li>
            			<li class="col-md-3">
            					<div class="form-group">
            								<label>Date</label>
            					<input type="text" id="datepicker3" class="form-control" name="date" placeholder="MM/DD/YYY">
            					</div>

            			</li>
            			<li class="col-md-2">
            				<button onclick="get_student();" class="btn btn-info btn-block">Attendance</button>
            			</li>
            		</ul>

            </div>
            <!-- /.box-header -->
	<div class="box-body" id="box_body">

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <script type="text/javascript">

        function present_all(){
            var class_id=document.getElementById("class_id").value;
            var section_id=document.getElementById("section_id").value;
            var date=document.getElementById("datepicker3").value;
            // alert(class_id);
            // alert(section_id);
            // alert(date);
        $.ajax({
        url  : "{{URL::to('present-all')}}",
        type : "get",
        data : {class_id:class_id,section_id:section_id,date:date},
        success : function(response){
            // alert(response);
            // $("#box_body").html(response);
        },
        error : function(xhr, status){
            alert('There is some error.Try after some time.');
        }
    });
        }

        function late_all(){
            var class_id=document.getElementById("class_id").value;
            var section_id=document.getElementById("section_id").value;
            var date=document.getElementById("datepicker3").value;
            // alert(class_id);
            // alert(section_id);
            // alert(date);
        $.ajax({
        url  : "{{URL::to('late-all')}}",
        type : "get",
        data : {class_id:class_id,section_id:section_id,date:date},
        success : function(response){
            // alert(response);
            // $("#box_body").html(response);
        },
        error : function(xhr, status){
            alert('There is some error.Try after some time.');
        }
    });
        }
    	function get_student(){
    		var class_id=document.getElementById("class_id").value;
    		var section_id=document.getElementById("section_id").value;
    		var date=document.getElementById("datepicker3").value;
    		alert(class_id);
    		alert(section_id);
    		alert(date);
    		$.ajax({
        url  : "{{URL::to('get-student')}}",
        type : "get",
        data : {class_id:class_id,section_id:section_id,date:date},
        success : function(response){
            // alert(response);
            $("#box_body").html(response);
        },
        error : function(xhr, status){
            alert('There is some error.Try after some time.');
        }
    });
    	};


         function present_student(id){
        var class_id=document.getElementById("class_id").value;
        var section_id=document.getElementById("section_id").value;
        var date=document.getElementById("datepicker3").value;
        // alert(class_id);
        // alert(section_id);
        // alert(date);
        $.ajax({
        url  : "{{URL::to('present-student')}}",
        type : "get",
        data : {class_id:class_id,section_id:section_id,date:date,id:id},
        success : function(response){
            // alert(response);
            // $("#box_body").html(response);
        },
        error : function(xhr, status){
            alert('There is some error.Try after some time.');
        }
    });
      };

        function late_student(id){
                 var class_id=document.getElementById("class_id").value;
        var section_id=document.getElementById("section_id").value;
        var date=document.getElementById("datepicker3").value;
        // alert(class_id);
        // alert(section_id);
        // alert(date);
        $.ajax({
        url  : "{{URL::to('late-student')}}",
        type : "get",
        data : {class_id:class_id,section_id:section_id,date:date,id:id},
        success : function(response){
            // alert(response);
            // $("#box_body").html(response);
        },
        error : function(xhr, status){
            alert('There is some error.Try after some time.');
        }
    });
         }

    </script>

@endsection
