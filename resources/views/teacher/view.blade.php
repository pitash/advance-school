@extends('layouts.app')

@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="{{ url('dashboard') }}">
      <em class="fa fa-home"></em>
    </a>/</li>
    <li class="active">&nbsp Teacher</li>
  </ol>
@endsection

@section('content')
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary fas fa fa-graduation-cap fa-2x">&nbsp Teacher List</h6>
      @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      @endif
      <div class="dropdown no-arrow">
        <div class="panel-heading">
        <a style="color:#fff;" class="btn btn-success pull-right"  data-toggle="modal" data-target="#addExpenseModal">Add New Teacher &nbsp<span class="fa fa-plus-circle"></span> </a>
        <!-- Add New Guardian Item Modal -->
          <div class="modal fade" id="addExpenseModal" tabindex="-1" role="dialog" aria-labelledby="addExpenseModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addExpenseModal">Teacher Info</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
                  <form action="{{ route('teacher.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                   <div class="form-group">
                    <label>Teacher Name :</label>
                    <input type="text" class="form-control" placeholder="Enter Teacher Name" name="teacher_name">
                  </div>
                  <div class="form-group">
                    <label for="teacher_photo">Photo :</label>
                    <input type="file" class="form-control" name="teacher_photo">
                  </div>
                  <div class="form-group">
                    <label>Phone Number :</label>
                     <input type="text" class="form-control" placeholder="Enter Phone Number" name="teacher_phone_no">
                  </div>
                  <div class="form-group">
                    <label>Teacher Email Address :</label>
                    <input type="email" class="form-control" placeholder="This is for Loging" name="teacher_email_address">
                  </div>
                  <div class="form-group">
                    <label>Gender :</label>
                    <select class="form-control" name="teacher_gender">
                      <option value="">-- Select One --</option>
                      <option value="1">Male</option>
                      <option value="2">Female</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Designation :</label>
                      <select class="form-control" name="teacher_designation">
                        <option value="">-- Select One --</option>
                        <option value="Junior Teacher">Junior Teacher</option>
                        <option value="Seniour Teacher">Seniour Teacher</option>
                        <option value="Head">Head</option>
                      </select>
                  </div>
                  <div class="form-group">
                    <label>Joining Date :</label>
                    <input type="date" class="form-control" name="joining_date">
                  </div>
                  <div class="form-group">
                    <label>Attach NID :</label>
                    <input type="text" class="form-control" placeholder="NID Number"name="techer_nid">
                  </div>
                  <div class="form-group">
                    <label>Parmanent Address :</label>
                    <input type="text" class="form-control" placeholder="Enter Teacher Parmanent Address" name="parmanent_address">
                  </div>
                  <div class="form-group">
                    <label>Present Address :</label>
                    <input type="text" class="form-control" placeholder="Enter Teacher Pressent Address" name="present address">
                  </div>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Add Teacher</button>
              </div>
            </form>
          </div>
        </div>
      </div>
        <!-- Add New Teacher Item Modal End -->
    </div>
  </div>
</div>
      <!-- Card Body -->
      <div class="col-xl-12 col-lg-7">
        <div class="row">
          <div class="col-md-4">
            <div class="card shadow mb-4">
              <h6 style="    margin: 12px !important" class="m-0 font-weight-bold text-primary ">&nbsp Loging Info</h6>
              <div class="card-body">
                <div class="panel-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th >SL</th>
                        <th >Name</th>
                        <th >email</th>
                      </tr>
                    </thead>
                    @php
                      $te = 1;
                    @endphp
                    <tbody>
                        @foreach ($user_infos as $user_info)
                          <tr>
                            <td>{{ $te++ }}</td>
                            <td>{{ $user_info->name }}</td>
                            <td>{{ $user_info->email }}</td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card shadow mb-4">
              <h6 style="    margin: 12px !important" class="m-0 font-weight-bold text-primary ">&nbsp Details</h6>
              <div class="card-body">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th >Image</th>
                      <th >Phone </th>
                      <th >Designation</th>
                      <th >Added By</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($teachers as $teacher)
                      <tr>
                        <td> <img class="img-profile rounded-circle" width="40" src="{{ asset('/storage') }}/{{ $teacher->teacher_image }}" alt="Photo Not Found"> </td>
                        <td>{{ $teacher->teacher_phone_no }}</td>
                        <td>{{ $teacher->teacher_designation }}</td>
                        <td>{{ $teacher->getUserInfo->name }}</td>
                        <td>
                          <div class="btn-group">
                            {{-- <a href="" data-toggle="tooltip" data-placement="top" title="View" class="btn btn-info">
                              <i class="fas fa-eye"></i>
                            </a> --}}
                            <a href="{{ route('teacher.edit', $teacher->id) }}" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-success">
                              <i class="fas fa-edit" aria-hidden="true"></i>
                            </a>
                            <a href="{{ url('teacher-delete/'.$teacher->id) }}" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger">
                              <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                          </div>
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
</div>
@endsection
@section('data_table')
  <script>
    $(document).ready(function() {
      $('#teachertable').DataTable();
    } );
  </script>
@endsection
