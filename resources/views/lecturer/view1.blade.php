@extends('layouts.app_old')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <img src="https://www.gravatar.com/avatar/0500b2ab42f89e6307060d3f45458c97?d=mm&s=250" class="rounded mx-auto d-block mb-3" alt="...">
        <div class="card bg-light mb-3">
          <div class="card-header text-center">
            <h3>{{ Auth::user()->name }}</h3>
          </div>
          <div class="card-body">
            <p>Joined: {{ \Carbon\Carbon::parse($teacher_info->joining_date)->diffForHumans() }}</p>
            </div>
          </div>
      </div>
      <div class="col-md-9">
        <div class="row">
          <div class="col-md-6">
            <div class="card bg-light mb-3">
              <div class="card-header">Personal Details</div>
              <div class="card-body">
                <table class="table table-bordered">
                  <tr>
                    <td>Name</td>
                    <td>{{ Auth::user()->name }}</td>
                  </tr>
                  {{-- <tr>
                    <td>Father Name</td>
                    <td>{{ $employee_table_info->employee_father_name }}</td>
                  </tr> --}}
                  <tr>
                    <td>Date Of Birth</td>
                    {{-- <td>{{ $employee_ table_info->employee_dob }}</td> --}}
                  </tr>
                  <tr>
                    <td>Gender</td>
                    <td>
                      {{-- {{ ($employee_table_info->employee_gender ==1) ? 'Male' : 'Female'}} --}}
                    </td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>{{ Auth::user()->email }}</td>
                  </tr>
                  <tr>
                    <td>Employee Phone Number</td>
                    {{-- <td>{{ $employee_table_info->employee_phone_number }}</td> --}}
                  </tr>
                  <tr>
                    <td>Employee Present Address</td>
                    {{-- <td>{{ $employee_table_info->employee_present_address }}</td> --}}
                  </tr>
                  <tr>
                    <td>Employee Parmanent Address</td>
                    {{-- <td>{{ $employee_table_info->employee_parmanent_address }}</td> --}}
                  </tr>
                </table>
              </div>
            </div>
          </div>

          {{-- <div class="col-md-6">
            <div class="card bg-light mb-3">
              <div class="card-header">Notice Board</div>
              @forelse ($notices as $notice)
                <div class="card bg-light m-3">
                  <div class="card-header bg-success">
                    {{ $notice->notice_title }}
                    <p class="float-right">{{ $notice->created_at->diffForHumans() }}</p>
                  </div>
                  <div class="card-body">
                    <p class="card-text">{!! $notice->notice_description !!}</p>
                  </div>
                </div>

              @empty
                <div class="card bg-light m-3">
                  <div class="card-header bg-warning">
                    No Notice Available
                  </div>
                </div>
              @endforelse
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
@endsection
