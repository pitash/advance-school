@extends('layouts.app')
@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="{{ url('dashboard') }}">
      <em class="fa fa-home"></em>
    </a>/</li>
    <li class="active">&nbsp Manage Guardian</li>
  </ol>
@endsection
@section('content')
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <h6 style="    margin: 12px !important" class="m-0 font-weight-bold text-primary fa fa-user-plus fa-2x">&nbsp Guardian List</h6>
    <div class="card-body">
      <div class="panel-body">
        <table class="table table-bordered" id="guardian_table">
          <thead>
            <tr>
              <th >SL</th>
              <th >Name</th>
              <th >Phone Number</th>
              <th >Email</th>
              <th >Added By</th>
            </tr>
          </thead>
          <tbody>
            @php
              $guar = 1;
            @endphp
          @forelse ($guardians as $guardian)
            <tr>
              <td>{{ $guar++}}</td>
              <td>{{ $guardian->student_father_name}}</td>
              <td>{{ $guardian->guardian_phone_no }}</td>
              <td>{{ $guardian->guardian_email }}</td>
              <td>{{ $guardian->getUserInfo->name }}</td>
            </tr>
          @empty

          @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
@section('data_table')
  <script>
    $(document).ready(function() {
      $('#guardian_table').DataTable();
    } );
  </script>
@endsection
