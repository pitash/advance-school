@extends('layouts.app')
@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="{{ url('dashboard') }}">
      <em class="fa fa-home"></em>
    </a>/</li>
    <li class="active">&nbsp Class</li>
  </ol>
@endsection
@section('content')
<div class="col-xl-12 col-lg-7">
  <div class="row">
    <div class="col-md-8">
      <div class="card shadow mb-4">
        <h6 style="    margin: 12px !important" class="m-0 font-weight-bold text-primary fas fa-drafting-compass fa-2x">&nbsp Class List</h6>
        <div class="card-body">
          <div class="panel-body">
            <table class="table table-hover">
              @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
              @endif
              <thead>
                <tr>
                  <th >SL</th>
                  <th >Class Name</th>
                  <th >Added By</th>
                  <th >Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $a=1; ?>
              @forelse ($classes as  $class)
                <tr>
                  <td>{{$a++}}</td>
                  <td>{{ $class->class_name }}</td>
                  {{-- <td>{{ App\User::find($class->added_by)->name }}</td> --}}
                  {{-- <td>{{ print_r($class->getUserInfo) }}</td> --}}
                  <td>{{ $class->getUserInfo->name }}</td>
                  <td>
                    <div class="btn-group">
                      <a href="{{ route('academicclass.edit', $class->id) }}" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-success">
                        <i class="fas fa-edit" aria-hidden="true"></i>
                      </a>
                      <a href="" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="4" class="align-middle">There No Class View</td>
                </tr>
              @endforelse
              </tbody>
            </table>
            {{ $classes->links() }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow mb-4">
        <h6 style="    margin: 12px !important" class="m-0 font-weight-bold text-primary fa fa-wrench fa-2x">&nbsp Add New Class</h6>
        <div class="card-body">
          <div class="panel-body">
            @if (session('pitash'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('pitash') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
          <form action="{{ route('academicclass.store') }}" method="post">
            @csrf
             <div class="form-group">
              <label>Class Name :</label>
              <input type="text" class="form-control" placeholder="Enter Class Name" name="class_name">
            </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Add Class</button>
            </div>
          </form>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
