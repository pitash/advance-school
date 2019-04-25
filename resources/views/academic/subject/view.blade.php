@extends('layouts.app')

@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="{{ url('dashboard') }}">
      <em class="fa fa-home"></em>
    </a>/</li>
    <li class="active">&nbsp Subject</li>
  </ol>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
     <div class="card">
       <div class="card-header bg-info text-white">
         <h4>Subject List</h4>
       </div>
       <div class="card-body">
         @if (session('status'))
           <div class="alert alert-success alert-dismissible fade show" role="alert">
                 {{ session('status') }}
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
         @endif
         <table class="table table-bordered">
           <tr>
             <th>Class Name</th>
             <th>Added By</th>
             <th>Subject</th>
             <th>Action</th>
           </tr>
           @forelse ($subjects as $subject)
             <tr>
               <td>Class</td>
               <td>{{ $subject->getUserInfo->name }}</td>
               <td>

                   <li>{{ $subject->subject_name  }}</li>

               </td>
               <td>
                 <div class="btn-group">
                   <a href="{{ route('academicsubject.edit', $subject->id) }}" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-success">
                     <i class="fas fa-edit" aria-hidden="true"></i>
                   </a>
                   <a href="" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger">
                     <i class="fa fa-trash" aria-hidden="true"></i>
                   </a>
                 </div>
               </td>
             </tr>
           @empty

           @endforelse
         </table>
           {{ $subjects->links() }}
       </div>
     </div>
    </div>
    <div class="col-md-4">
     <div class="card">
       <div class="card-header bg-info text-white">
         <h4>Add Subject</h4>
       </div>
       <div class="card-body">
         @if ($errors->any())
          <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </div>
         @endif
         @if (session('status'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
         @endif
         <form action="" method="post">
           @csrf
             <div class="form-group">
               <label>Class Name</label>
               <select class="form-control" name="class_name">
                 @foreach ($classes as $key => $class)
                   <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                 @endforeach
               </select>
             </div>
             <div class="form-group">
               <label>Subject</label>
               <div id="designation_name_form">
                 <input id="subject_name" type="text" class="form-control" placeholder="Enter Subject Name" name="subject_name[]" required><br>
               </div>
               <div id="append_here"></div>
             </div>
             <button id="more_designations" type="button" class="btn btn-info">More Subject</button>
             <br><br><button type="submit" class="btn btn-success">Submit</button>
           </form>
       </div>
     </div>
   </div>
 </div>
</div>
@endsection
@section('data_table')
<script>
$(document).ready(function(){
  $('#more_designations').click(function(){
    var clone_part = $('#designation_name_form').clone('#subject_name')
    clone_part.find('input').val('');
    $('#append_here').append(clone_part);
  });
});
</script>
@endsection
