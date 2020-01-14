@extends('layouts.app_old')

@section('content')
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-5">
        <div class="col-md-5">
          <img src="{{ asset('/storage') }}/{{ $teacher_info->teacher_image }}"
          alt="" class="img-rounded img-responsive" />
        </div>

        <blockquote>
        <p>{{ $teacher_info->teacher_designation }}</p>  <p>{{ Auth::user()->name }}</p> <small><cite title="Source Title">{{ $teacher_info->present_address }}  <i class="glyphicon glyphicon-map-marker"></i></cite></small>
        </blockquote>
        <br /> <i class="">Joined Time :  </i>{{ \Carbon\Carbon::parse($teacher_info->joining_date)->diffForHumans() }}</p>
        <p> <i class="">
        <p> <i class="glyphicon glyphicon-envelope"></i> {{ Auth::user()->email }}
  {{-- <br/> <i class="glyphicon glyphicon-globe"></i> www.bootsnipp.com --}}
        <br /> <i class="">Gender :  </i> {{ ($teacher_info->teacher_gender ==1) ? 'Male' : 'Female'}} </p>

      </div>
      <div class="col-md-7">
       <div class="card bg-light mb-3">
         <div class="card-header">Notice Board</div>
           <div class="card bg-light m-3">
             <div class="card-header bg-success">
              {{-- {{ $notice->notice_title }} --}}
              <p>Day Off</p>
              {{-- <p class="float-right">{{ $notice->created_at->diffForHumans() }}</p> --}}
             </div>
              <div class="card-body">
                {{-- <p class="card-text">{!! $notice->notice_description !!}</p> --}}
                <p class="card-text">Some Unavoidable Reason Tomorow's Class Pospond</p>
              </div>
            </div>
           <div class="card bg-light m-3">
             <div class="card-header bg-success">
              {{-- {{ $notice->notice_title }} --}}
              <p>Day Off</p>
              {{-- <p class="float-right">{{ $notice->created_at->diffForHumans() }}</p> --}}
             </div>
              <div class="card-body">
                {{-- <p class="card-text">{!! $notice->notice_description !!}</p> --}}
                <p class="card-text">Some Unavoidable Reason Tomorow's Class Pospond</p>
              </div>
            </div>
            {{-- <div class="card bg-light m-3">
            <div class="card-header bg-warning">
                  No Notice Available
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header bg-info text-white">
            <h4>Mark List</h4>
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
                <thead>
                <tr>
                  <th>Student Name</th>
                  <th>Class</th>
                  <th>Section</th>
                  <th>Fast Term</th>
                  <th>Second Term</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($lecturerrs as $key => $lecturerr)
                  <tr>
                    <td>{{ $lecturerr->student_name }}</td>
                    <td>{{ $lecturerr->class_name }}</td>
                    <td>{{ $lecturerr->section_name }}</td>
                    <td>{{ $lecturerr->fast_term }}</td>
                    <td>{{ $lecturerr->second_term }}</td>
                    <td>

                        <a href="" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-success">
                          <i class="fas fa-edit" aria-hidden="true"></i>
                        </a>
                        <a href="" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>

                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
                {{-- {{ $subjects->links() }} --}}
            </div>
          </div>
        </div>

          <div class="col-md-3">
           <div class="card">
             <div class="card-header bg-info text-white">
               <h4>Add Mark</h4>
             </div>
             <div class="card-body">
               @if ($errors->any())
                <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
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
                  <label>Student Name</label>
                  <select class="form-control" name="student_name">
                    @foreach ($students as $key => $student)
                      <option value="{{ $student->id }}">{{ $student->student_name   }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Subject Name</label>
                  <select class="form-control" name="section_name">
                    @foreach ($sections as $key => $section)
                      <option value="{{ $section->id }}">{{ $section->section_name   }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Fast Term:</label>
                  <input type="number" class="form-control" placeholder="Fast Term Mark" name="fast_term">
                </div>
                <div class="form-group">
                  <label>Second Term:</label>
                  <input type="number" class="form-control" placeholder="Second Term Mark" name="second_term">
                </div>
                {{-- <div class="modal-footer"> --}}
                  <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
