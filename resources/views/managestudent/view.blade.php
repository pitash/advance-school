@extends('layouts.app')
@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="{{ url('dashboard') }}">
      <em class="fa fa-home"></em>
    </a>/</li>
    <li class="active">&nbsp Manage Student </li>
  </ol>
@endsection
@section('content')
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
<!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary fa fa-users fa-2x">&nbsp Student List</h6>
      <div class="dropdown no-arrow">
        <div class="panel-heading">
        <a style="color:#fff;"class="btn btn-success pull-right"  data-toggle="modal" data-target="#addExpenseModal">Add New Student <span class="fa fa-plus-circle"></span> </a>
        <!-- Add New Expense Item Modal -->
        <div class="modal fade" id="addExpenseModal" tabindex="-1" role="dialog" aria-labelledby="addExpenseModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="addExpenseModal">Add Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('managestudent.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <legend>
                    Student Information
                  </legend>
                    <div class="form-group">
                      <label>Student Name :</label>
                        <input type="text" class="form-control" placeholder="Enter Student Name" name="student_name">
                    </div>
                    <div class="form-group">
                      <label>Student Photo :</label>
                      <input type="file" class="form-control" name="student_photo">
                    </div>
                    <div class="form-group">
                      <label>DOB :</label>
                        <input type="date" class="form-control" name="dob">
                    </div>
                    <div class="form-group">
                      <label>Gender :</label>
                        <select class="form-control" name="student_gender">
                          <option value="">-- Select One --</option>
                          <option value="1">Male</option>
                          <option value="2">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Blood Group :</label>
                      <select class="form-control" name="blood_group">
                        <option value="">-- Select One --</option>
                        <option value="1">A(+)</option>
                        <option value="1">A(-)</option>
                        <option value="1">B(+)</option>
                        <option value="1">B(+)</option>
                        <option value="1">O(+)</option>
                        <option value="1">O(-)</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Admission Date :</label>
                      <input type="date" class="form-control" name="admission_date">
                    </div>
                    <div class="form-group">
                      <label>Student Phone No :</label>
                      <input type="text" class="form-control" placeholder="Enter Phone No" name="student_phone_no">
                    </div>
                    <div class="form-group">
                      <label>Class :</label>
                      <select class="form-control" name="class_name">
                        @foreach ($classes as $key => $class)
                          <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Group :</label>
                      <input type="text" class="form-control" placeholder="Enter Phone No" name="group">
                    </div>
                    <div class="form-group">
                      <label>Section :</label>
                      <input type="text" class="form-control" placeholder="Enter Phone No" name="section">
                    </div>
                    <div class="form-group">
                      <label>Class Roll :</label>
                      <input type="text" class="form-control" placeholder="Enter Phone No" name="class_roll">
                    </div>
                    <div class="form-group">
                      <label>RFID No :</label>
                      <input type="text" class="form-control" placeholder="Enter Phone No" name="rfid_no">
                    </div>
                    <div class="form-group">
                      <label>Religion :</label>
                        <select class="form-control" name="religion">
                          <option value="">-- Select One --</option>
                          <option value="1">Muslim</option>
                          <option value="1">Hindu</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Present Address :</label>
                      <input type="text" class="form-control" placeholder="Enter Present Address" name="student_present_address">
                    </div>
                    <div class="form-group">
                      <label>Parmanent Address :</label>
                      <input type="text" class="form-control" placeholder="Enter Parmanent Address" name="student_parmanent_address">
                    </div>
                    <legend>
                      Student Guardian Information
                    </legend>
                    <div class="form-group">
                      <label>Student Father Name :</label>
                      <input type="text" class="form-control" placeholder="Enter Student Father Name" name="student_father_name">
                    </div>
                    <div class="form-group">
                      <label>Student Mother Name :</label>
                      <input type="text" class="form-control" placeholder="Enter Student Mother Name" name="student_mother_name">
                    </div>
                    <div class="form-group">
                      <label>Guardian Phone No :</label>
                      <input type="text" class="form-control" placeholder="Enter Guardian Phone No" name="guardian_phone_no">
                    </div>
                    <div class="form-group">
                      <label>Guardian Email :</label>
                      <input type="email" class="form-control" placeholder="Enter Guardian Email" name="guardian_email">
                    </div>
                    <div class="form-group">
                      <label>Guardian NID No :</label>
                      <input type="text" class="form-control" placeholder="Enter Guardian NID No" name="guardian_nid_no">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Student</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Add New Expense Item Modal End -->
          </div>
        </div>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <table class="table table-bordered" id="student_table">
          <thead>
            <tr>
              <th >SL</th>
              <th >Photo</th>
              <th >Name</th>
              <th >Phone No</th>
              <th >Class</th>
              <th >Section</th>
              <th >Roll</th>
              <th >RFID No</th>
              <th >Guardian Name</th>
              <th >Action</th>
            </tr>
          </thead>
          <tbody>
            @php
              $stu = 1;
            @endphp
            @forelse ($students as  $student)
              <tr>
                <td>{{ $stu++ }}</td>
              <td> <img class="img-profile rounded-circle" width="40" src="{{ asset('/storage') }}/{{ $student->student_image }}" alt="Photo Not Found"> </td>
              <td>{{ $student->student_name }}</td>
              <td>{{ $student->student_phone_no }}</td>
              <td>{{ $student->class_name }}</td>
              <td>{{ $student->section }}</td>
              <td>{{ $student->class_roll }}</td>
              <td>{{ $student->rfid_no }}</td>
              <td>{{ $student->student_father_name }}</td>
              <td>
                <div class="btn-group">
                  <a href="" data-toggle="tooltip" data-placement="top" title="View" class="btn btn-info">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a href="{{ route('managestudent.edit', $student->id) }}" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-success">
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
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
@section('data_table')
  <script>
    $(document).ready(function() {
      $('#student_table').DataTable();
    } );
  </script>
@endsection
