@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card shadow mb-4">
      <h6 style="    margin: 12px !important" class="m-0 font-weight-bold text-primary fas fa-drafting-compass fa-2x">&nbsp Teacher Update Form</h6><hr>
      <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ol>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ol>
        </div>
      @endif
      <form action="{{ route('teacher.update', $old_information->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <label>Teacher Name :</label>
              <input type="text" class="form-control" placeholder="Enter Teacher Name" name="teacher_name" value="{{ $old_information->teacher_name }}">
              <input type="hidden" class="form-control" id="teacher_id" name="teacher_id" value="{{ $old_information->id }}">
            </div>
            <div class="form-group">
              <label for="teacher_photo">Photo :</label>
              <input type="file" class="form-control" name="teacher_photo" value="{{ $old_information->teacher_photo }}">
            </div>
            <div class="form-group">
              <label>Phone Number :</label>
               <input type="text" class="form-control" placeholder="Enter Phone Number" name="teacher_phone_no" value="{{ $old_information->teacher_phone_no }}">
            </div>
            <div class="form-group">
              <label>Teacher Email Address :</label>
              <input type="email" class="form-control" placeholder="This is for Loging" name="teacher_email_address" value="{{ $old_information->teacher_email_address }}">
            </div>
            <div class="form-group">
              <label>Gender :</label>
              <select class="form-control" name="teacher_gender" value="{{ $old_information->teacher_gender }}">
                <option value="">-- Select One --</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
              </select>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label>Designation :</label>
                <select class="form-control" name="teacher_designation" value="{{ $old_information->teacher_designation }}">
                  <option value="">-- Select One --</option>
                  <option value="1">Junior Teacher</option>
                  <option value="2">Seniour Teacher</option>
                  <option value="3">Head</option>
                </select>
            </div>
            <div class="form-group">
              <label>Joining Date :</label>
              <input type="date" class="form-control" name="joining_date" value="{{ $old_information->joining_date }}">
            </div>
            <div class="form-group">
              <label>Attach NID :</label>
              <input type="text" class="form-control" placeholder="NID Number"name="techer_nid" value="{{ $old_information->techer_nid }}">
            </div>
            <div class="form-group">
              <label>Parmanent Address :</label>
              <input type="text" class="form-control" placeholder="Enter Teacher Parmanent Address" name="parmanent_address" value="{{ $old_information->parmanent_address }}">
            </div>
            <div class="form-group">
              <label>Present Address :</label>
              <input type="text" class="form-control" placeholder="Enter Teacher Pressent Address" name="present_address" value="{{ $old_information->present_address }}">
            </div>
          </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
 </div>
</div>
@endsection
