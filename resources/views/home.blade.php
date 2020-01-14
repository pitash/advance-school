@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-xl-12 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary fas fa-tachometer-alt fa-2x">&nbsp {{ __('Dashboard') }}</h6>
          <div class="dropdown no-arrow">

          </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="row">

            <!-- Present Today Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ __('Present Today') }}</div>
                      {{-- <i class="fa fa-users" aria-hidden="true"></i> --}}
                      <div class="h5 mb-0 font-weight-bold text-gray-800 ">&nbsp 180</div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-user-plus fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Absent Today Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{ __('Absent Today') }} </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">&nbsp 20</div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-user-secret fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">{{ __('Total Teacher') }}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa fa-graduation-cap fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ __('All Student') }}</div>
                      {{-- <i class="fa fa-users" aria-hidden="true"></i> --}}
                      <div class="h5 mb-0 font-weight-bold text-gray-800 ">&nbsp 200</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
