@extends('layouts.app')

@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="{{ url('dashboard') }}">
      <em class="fa fa-home"></em>
    </a>/</li>
    <li class="active">&nbsp Language Setting</li>
  </ol>
@endsection

@section('content')
<div class="col-xl-12 col-lg-7">
  <div class="row">
    <div class="col-md-6">
      <div class="card shadow mb-4">
        <h6 style="    margin: 12px !important" class="m-0 font-weight-bold text-primary fab fa-accusoft fa-2x">&nbsp Section List</h6>
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
          <form action="{{ url('setting/language/change') }}" method="post">
            @csrf
            <div class="form-group">
              <label>Change Language</label>
              <select class="form-control" name="user_lang">
                <option value="">-- Select One --</option>
                <option value="en"  >English</option>
                <option value="bn">Bangla</option>
                <option value="cn">Chinese</option>
              </select>
{{-- {{ Auth::user()-user_lang == 'en' ? 'selected' : '' }} --}}
            </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Add Language</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
@endsection
