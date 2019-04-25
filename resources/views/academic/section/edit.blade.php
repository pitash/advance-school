@extends('layouts.app')
@section('content')
<div class="col-xl-12 col-lg-7 ">
  <div class="row">
    <div class="col-md-7 offset-2 card shadow mb-4">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form action="{{ route('academicsection.update', $old_information->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
        </div>
        <div class="form-group">
          <label for="section_name">Section Name</label>
          <input type="text" class="form-control" id="section_name" placeholder="Enter Class Name" name="section_name" value="{{ $old_information->section_name }}">
          <input type="hidden" class="form-control" id="section_id" aria-describedby="emailHelp" name="section_id" value="{{ $old_information->id }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</div>
@endsection
